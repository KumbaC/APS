<?php
declare(strict_types=1);

namespace AuditLog\Model\Behavior;

use ArrayObject;
use Cake\Core\Configure;
use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use Cake\ORM\Association\BelongsToMany;
use Cake\ORM\Behavior;
use Cake\ORM\Locator\TableLocator;
use Cake\Utility\Inflector;

/**
 * Auditable behavior
 *
 * @package AuditLog\Behavior
 */
class AuditableBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'on' => ['delete', 'create', 'update', 'select'],
        'ignore' => ['created', 'updated', 'modified'],
        'habtm' => [],
        'json_object' => true,
    ];

    /**
     * A copy of the object as it existed prior to the save. We're going
     * to store this off so we can calculate the deltas after save.
     *
     * @var array
     */
    protected $_original = [];

    /**
     * Constructor hook method.
     *
     * Implement this method to avoid having to overwrite
     * the constructor and call parent.
     *
     * @param array $config The configuration settings provided to this behavior.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $habtm = $this->getConfig('habtm');

        /*
         * Ensure that no HABTM models which are already auditable
         * snuck into the settings array. That would be bad. Same for
         * any model which isn't a HABTM association.
         */

        foreach ($habtm as $index => $modelName) {
            $association = $this->_table->getAssociation($modelName);

            if (!$association instanceof BelongsToMany) {
                continue;
            }

            if ($this->_table->{$modelName}->hasBehavior('Auditable')) {
                unset($habtm[$index]);
            }
        }
        $this->setConfig('habtm', $habtm, false);
    }

    /**
     * Executed before a save() operation.
     *
     * @param \Cake\Event\EventInterface $event The beforeSave event that was fired
     * @param \Cake\Datasource\EntityInterface $entity The entity that is going to be saved
     * @param \ArrayObject $options the options passed to the save method
     * @return void
     */
    public function beforeSave(EventInterface $event, EntityInterface $entity, ArrayObject $options): void
    {
        if (!$this->_shouldProcess('create') && !$this->_shouldProcess('update')) {
            return;
        }

        if (!$entity->isNew()) {
            $original = $this->_getModelData($entity);
            $this->_original = $original;
        }
    }

    /**
     * Executed before a delete() operation.
     *
     * @param \Cake\Event\EventInterface $event The beforeDelete event that was fired
     * @param \Cake\Datasource\EntityInterface $entity The entity that is going to be saved
     * @return void
     */
    public function beforeDelete(EventInterface $event, EntityInterface $entity): void
    {
        if (!$this->_shouldProcess('delete')) {
            return;
        }

        $original = $this->_getModelData($entity);

        $this->_original = $original;
    }

    /**
     * Executed after a save operation completes.
     *
     * @param \Cake\Event\EventInterface $event The afterSave event that was fired.
     * @param \Cake\Datasource\EntityInterface $entity The entity that was saved.
     * @param \ArrayObject $options The options for the query
     * @return void
     */
    public function afterSave(EventInterface $event, EntityInterface $entity, ArrayObject $options): void
    {
        if ($entity->isNew() && !$this->_shouldProcess('create')) {
            return;
        }

        if (!$entity->isNew() && !$this->_shouldProcess('update')) {
            return;
        }
        $alias = $this->_table->getAlias();
        $config = $this->getConfig();

        $audit = $this->_getModelData($entity);

        $source = $this->_getSource();

        $data = [
            'event' => $entity->isNew() ? 'CREATE' : 'EDIT',
            'model' => $alias,
            'entity_id' => $entity->id,
            'source_id' => $source['id'],
            'source_ip' => $source['ip'],
            'source_url' => $source['url'],
            'description' => $source['description'],
        ];

        if (!empty($config['json_object'])) {
            $data['json_object'] = json_encode($audit);
        }

        $updates = [];

        foreach ($audit as $property => $value) {
            // Don't create delta for new records
            if ($entity->isNew()) {
                continue;
            }

            // Don't create fields for those that are ignored
            if (in_array($property, $config['ignore'])) {
                continue;
            }

            // Don't create delta for new values
            if (!array_key_exists($property, $this->_original)) {
                continue;
            }

            // Don't create delta for unchanged values
            if ($this->_original[$property] === $value) {
                continue;
            }

            if (is_object($value) && $this->_original[$property] == $value) {
                continue;
            }

            $updates[] = [
                'property_name' => $property,
                'old_value' => $this->_original[$property],
                'new_value' => $value,
            ];
        }

        $tableLocator = new TableLocator();
        $Audits = $tableLocator->get('AuditLog.Audits');
        if ($entity->isNew() || count($updates)) {
            $audit = $Audits->newEntity($data);
            $audit = $Audits->save($audit);
            if (!$audit || !empty($audit->getErrors()) || empty($audit->id)) {
                throw new \UnexpectedValueException(
                    'Error saving audit ',
                    print_r($audit, true)
                );
            }

            if ($entity->isNew() && method_exists($this->_table, 'afterAuditCreate')) {
                $this->_table->afterAuditCreate($audit);
            }

            if (!$entity->isNew() && method_exists($this->_table, 'afterAuditUpdate')) {
                $this->_table->afterAuditUpdate(
                    $this->_original,
                    $updates,
                    $audit->id
                );
            }
        }

        foreach ($updates as $delta) {
            $delta['audit_id'] = $audit->id;

            $delta = $Audits->AuditDeltas->newEntity($delta);
            $delta = $Audits->AuditDeltas->save($delta);
            if (!$delta || !empty($delta->getErrors()) || empty($delta->id)) {
                throw new \UnexpectedValueException(
                    'Error saving audit delta for ' . print_r($delta, true)
                );
            }

            if (!$entity->isNew() && method_exists($this->_table, 'afterAuditProperty')) {
                $this->_table->afterAuditProperty(
                    $delta['property_name'],
                    $this->_original[$delta['property_name']],
                    $delta['new_value']
                );
            }
        }

        if (!empty($this->_original)) {
            unset($this->_original);
        }
    }

    /**
     * Executed after a model is deleted.
     *
     * @param \Cake\Event\EventInterface $event The afterDelete event that was fired.
     * @param \Cake\Datasource\EntityInterface $entity The entity that was deleted.
     * @param \ArrayObject $options The options for the query
     * @return void
     */
    public function afterDelete(EventInterface $event, EntityInterface $entity, ArrayObject $options): void
    {
        if (!$this->_shouldProcess('delete')) {
            return;
        }
        $config = $this->getConfig();

        $source = $this->_getSource();
        $audit = $this->_original;
        $alias = $this->_table->getAlias();
        $data = [
            'event' => 'DELETE',
            'model' => $alias,
            'entity_id' => $entity->id,
            'source_id' => $source['id'],
            'source_ip' => $source['ip'],
            'source_url' => $source['url'],
            'description' => $source['description'],
        ];

        if ($config['json_object']) {
            $data['json_object'] = json_encode($audit);
        }
        $tableLocator = new TableLocator();
        $Audits = $tableLocator->get('AuditLog.Audits');
        $audit = $Audits->newEntity($data);
        $Audits->save($audit);

        if (method_exists($this->_table, 'afterAuditDelete')) {
            $this->_table->afterAuditDelete($audit);
        }
    }

    /**
     * Should a model event be processed by AuditLog ?
     *
     * @param string $event Event
     *
     * @return bool
     */
    protected function _shouldProcess($event)
    {
        $on = $this->getConfig('on');

        return in_array($event, $on);
    }

    /**
     * Get the source for the actor CRUD'ing the resource
     *
     * @return array
     */
    protected function _getSource()
    {
        $defaults = [
            'id' => null,
            'ip' => null,
            'url' => null,
            'description' => null,
        ];

        $source = Configure::read('AuditSource');
        if ($source) {
            return $source + $defaults;
        }

        if (method_exists($this->_table, 'currentUser')) {
            return $this->_table->currentUser() + $defaults;
        }

        if (method_exists($this->_table, 'current_user')) {
            return $this->_table->current_user() + $defaults;
        }

        return $defaults;
    }

    /**
     * Retrieves the entire set model data contained to the primary
     * object and any/all HABTM associated data that has been configured
     * with the behavior.
     *
     * Additionally, for the HABTM data, all we care about is the IDs,
     * so the data will be reduced to an indexed array of those IDs.
     *
     * @param \Cake\Datasource\EntityInterface $entity The entity object
     * @return  array
     */
    protected function _getModelData(EntityInterface $entity)
    {
        $habtm = $this->getConfig('habtm');
        $alias = $this->_table->getAlias();
        $primaryKey = (array)$this->_table->getPrimaryKey();

        if (empty($primaryKey)) {
            throw new \UnexpectedValueException(
                'Invalid primary key for ' . $this->_table->getAlias()
            );
        }

        foreach ($primaryKey as $key) {
            $conditions[$alias . '.' . $key] = $entity->$key;
        }

        $query = $this->_table->find('all', [
            'conditions' => $conditions,
        ]);
        if (!empty($habtm)) {
            $query->contain(array_values($habtm));
        }

        $data = $query->enableHydration(false)->first();

        $audit_data = !empty($data) ? $data : [];

        foreach ($habtm as $habtmModel) {
            $association = $this->_table->getAssociation($habtmModel);
            if (!($association instanceof BelongsToMany)) {
                continue;
            }
            $name = Inflector::underscore($habtmModel);

            if (!isset($data[$name]) || empty($data[$name])) {
                continue;
            }

            $joinData = [];
            foreach ($data[$name] as $info) {
                $joinData[$info['id']] = $info['_joinData'];
            }
            $audit_data[$name] = $joinData;
        }

        return $audit_data;
    }

   /*  protected function currentUser() {
        $user = $this->Auth->user();
     
        return $user[$this->Auth->userModel]; # Return the complete user array
    } */


}
