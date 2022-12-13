<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;
/**
 * ClinicalHistoriesDiagnoses Model
 *
 * @property \App\Model\Table\ClinicalHistoriesTable&\Cake\ORM\Association\BelongsTo $ClinicalHistories
 * @property \App\Model\Table\DiagnosesTable&\Cake\ORM\Association\BelongsTo $Diagnoses
 *
 * @method \App\Model\Entity\ClinicalHistoriesDiagnosis newEmptyEntity()
 * @method \App\Model\Entity\ClinicalHistoriesDiagnosis newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesDiagnosis[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesDiagnosis get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesDiagnosis findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesDiagnosis patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesDiagnosis[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesDiagnosis|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesDiagnosis saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesDiagnosis[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesDiagnosis[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesDiagnosis[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesDiagnosis[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ClinicalHistoriesDiagnosesTable extends Table
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

        $this->setTable('clinical_histories_diagnoses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ClinicalHistories', [
            'foreignKey' => 'clinic_history_id',
        ]);
        $this->belongsTo('Diagnoses', [
            'foreignKey' => 'diagnosis_id',
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
        $rules->add($rules->existsIn(['diagnosis_id'], 'Diagnoses'), ['errorField' => 'diagnosis_id']);

        return $rules;
    }
}
