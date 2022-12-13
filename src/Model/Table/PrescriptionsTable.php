<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;
/**
 * Prescriptions Model
 *
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 * @property \App\Model\Table\BeneficiaryTable&\Cake\ORM\Association\BelongsTo $Beneficiary
 * @property \App\Model\Table\DoctorsTable&\Cake\ORM\Association\BelongsTo $Doctors
 * @property \App\Model\Table\QuotesTable&\Cake\ORM\Association\BelongsTo $Quotes
 * @property \App\Model\Table\ClinicalHistoriesTable&\Cake\ORM\Association\BelongsTo $ClinicalHistories
 *
 * @method \App\Model\Entity\Prescription newEmptyEntity()
 * @method \App\Model\Entity\Prescription newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Prescription[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Prescription get($primaryKey, $options = [])
 * @method \App\Model\Entity\Prescription findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Prescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Prescription[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Prescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Prescription[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Prescription[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Prescription[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Prescription[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PrescriptionsTable extends Table
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

        $this->setTable('prescriptions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
        ]);
        $this->belongsTo('Beneficiary', [
            'foreignKey' => 'beneficiary_id',
        ]);
        $this->belongsTo('Doctors', [
            'foreignKey' => 'doctor_id',
        ]);
        $this->belongsTo('Quotes', [
            'foreignKey' => 'quote_id',
        ]);
        $this->belongsTo('ClinicalHistories', [
            'foreignKey' => 'clinic_history_id',
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
            ->notEmptyString('descripcion', 'Por favor, llenar el campo descripción');

        $validator
            ->scalar('indicaciones')
            ->notEmptyString('indicaciones', 'Por favor, llenar el campo indicaciones');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmptyDate('fecha');

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
        $rules->add($rules->existsIn(['person_id'], 'Persons'), ['errorField' => 'person_id']);
        $rules->add($rules->existsIn(['beneficiary_id'], 'Beneficiary'), ['errorField' => 'beneficiary_id']);
        $rules->add($rules->existsIn(['doctor_id'], 'Doctors'), ['errorField' => 'doctor_id']);
        $rules->add($rules->existsIn(['quote_id'], 'Quotes'), ['errorField' => 'quote_id']);
        $rules->add($rules->existsIn(['clinic_history_id'], 'ClinicalHistories'), ['errorField' => 'clinic_history_id']);

        return $rules;
    }
}
