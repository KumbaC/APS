<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;
/**
 * ClinicalHistoriesSurgicalsAntecedents Model
 *
 * @property \App\Model\Table\ClinicalHistoriesTable&\Cake\ORM\Association\BelongsTo $ClinicalHistories
 * @property \App\Model\Table\SurgicalsAntecedentsTable&\Cake\ORM\Association\BelongsTo $SurgicalsAntecedents
 *
 * @method \App\Model\Entity\ClinicalHistoriesSurgicalsAntecedent newEmptyEntity()
 * @method \App\Model\Entity\ClinicalHistoriesSurgicalsAntecedent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesSurgicalsAntecedent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesSurgicalsAntecedent get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesSurgicalsAntecedent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesSurgicalsAntecedent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesSurgicalsAntecedent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesSurgicalsAntecedent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesSurgicalsAntecedent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesSurgicalsAntecedent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesSurgicalsAntecedent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesSurgicalsAntecedent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesSurgicalsAntecedent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClinicalHistoriesSurgicalsAntecedentsTable extends Table
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

        $this->setTable('clinical_histories_surgicals_antecedents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ClinicalHistories', [
            'foreignKey' => 'clinic_history_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('SurgicalsAntecedents', [
            'foreignKey' => 'surgical_antecedent_id',
            'joinType' => 'INNER',
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
        $rules->add($rules->existsIn(['clinic_history_id'], 'ClinicalHistories'), ['errorField' => 'clinic_history_id']);
        $rules->add($rules->existsIn(['surgical_antecedent_id'], 'SurgicalsAntecedents'), ['errorField' => 'surgical_antecedent_id']);

        return $rules;
    }
}
