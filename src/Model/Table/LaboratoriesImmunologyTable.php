<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;
/**
 * LaboratoriesImmunology Model
 *
 * @property \App\Model\Table\LaboratoriesTable&\Cake\ORM\Association\BelongsTo $Laboratories
 * @property \App\Model\Table\ImmunologyTable&\Cake\ORM\Association\BelongsTo $Immunology
 *
 * @method \App\Model\Entity\LaboratoriesImmunology newEmptyEntity()
 * @method \App\Model\Entity\LaboratoriesImmunology newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\LaboratoriesImmunology[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LaboratoriesImmunology get($primaryKey, $options = [])
 * @method \App\Model\Entity\LaboratoriesImmunology findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\LaboratoriesImmunology patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LaboratoriesImmunology[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LaboratoriesImmunology|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LaboratoriesImmunology saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LaboratoriesImmunology[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LaboratoriesImmunology[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\LaboratoriesImmunology[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LaboratoriesImmunology[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LaboratoriesImmunologyTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('laboratories_immunology');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Laboratories', [
            'foreignKey' => 'laboratory_id',
        ]);
        $this->belongsTo('Immunology', [
            'foreignKey' => 'immunology_id',
        ]);
        $this->addBehavior('AuditLog.Auditable', [
            //'ignore' => ['created'],
            //'habtm' => ['Tags'],
        ]);
    }

    public function currentUser(): array
{
    $session = Router::getRequest()->getSession();
    $session = Router::getRequest()->getAttribute('session');
    
    return [
        'id' => $session->read('Auth.User.role_id'),
        'ip' => Router::getRequest()->clientIp(),
        'url' => Router::url(null, true),
        'description' => $session->read('Auth.User.full_name')
        
    ];

}

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['laboratory_id'], 'Laboratories'), ['errorField' => 'laboratory_id']);
        $rules->add($rules->existsIn(['immunology_id'], 'Immunology'), ['errorField' => 'immunology_id']);

        return $rules;
    }
}
