<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;
/**
 * Habits Model
 *
 * @property \App\Model\Table\ClinicalHistoriesTable&\Cake\ORM\Association\BelongsToMany $ClinicalHistories
 *
 * @method \App\Model\Entity\Habit newEmptyEntity()
 * @method \App\Model\Entity\Habit newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Habit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Habit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Habit findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Habit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Habit[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Habit|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Habit saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Habit[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Habit[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Habit[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Habit[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class HabitsTable extends Table
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

        $this->setTable('habits');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->belongsToMany('ClinicalHistories', [
            'foreignKey' => 'habit_id',
            'targetForeignKey' => 'clinic_history_id',
            'joinTable' => 'clinical_histories_habits',
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

        $validator
            ->scalar('descripcion')
            ->allowEmptyString('descripcion');

        return $validator;
    }
}
