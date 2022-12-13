<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;
/**
 * ClinicalHistories Model
 *
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 * @property \App\Model\Table\BeneficiaryTable&\Cake\ORM\Association\BelongsTo $Beneficiary
 * @property \App\Model\Table\BloodTypesTable&\Cake\ORM\Association\BelongsTo $BloodTypes
 * @property \App\Model\Table\DoctorsTable&\Cake\ORM\Association\BelongsTo $Doctors
 * @property \App\Model\Table\QuotesTable&\Cake\ORM\Association\BelongsTo $Quotes
 * @property \App\Model\Table\LaboratoriesTable&\Cake\ORM\Association\HasMany $Laboratories
 * @property \App\Model\Table\DiagnosesTable&\Cake\ORM\Association\BelongsToMany $Diagnoses
 * @property \App\Model\Table\HabitsTable&\Cake\ORM\Association\BelongsToMany $Habits
 * @property \App\Model\Table\MedicalsAntecedentsTable&\Cake\ORM\Association\BelongsToMany $MedicalsAntecedents
 * @property \App\Model\Table\SurgicalsAntecedentsTable&\Cake\ORM\Association\BelongsToMany $SurgicalsAntecedents
 * 
 * @method \App\Model\Entity\ClinicalHistory newEmptyEntity()
 * @method \App\Model\Entity\ClinicalHistory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClinicalHistory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ClinicalHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClinicalHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClinicalHistory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClinicalHistory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClinicalHistory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClinicalHistory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ClinicalHistoriesTable extends Table
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

        $this->setTable('clinical_histories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        

        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
        ]);
        $this->belongsTo('Beneficiary', [
            'foreignKey' => 'beneficiary_id',
        ]);
        $this->belongsTo('BloodTypes', [
            'foreignKey' => 'blood_type_id',
        ]);
        $this->belongsTo('Doctors', [
            'foreignKey' => 'doctor_id',
        ]);
        $this->belongsTo('Quotes', [
            'foreignKey' => 'quote_id',
        ]);
        $this->hasMany('Laboratories', [
        'foreignKey' => 'clinical_history_id',
        ]);

        $this->belongsToMany('Diagnoses', [
            'foreignKey' => 'clinic_history_id',
            'targetForeignKey' => 'diagnosis_id',
            'joinTable' => 'clinical_histories_diagnoses',
        ]);
        $this->belongsToMany('Habits', [
            'foreignKey' => 'clinic_history_id',
            'targetForeignKey' => 'habit_id',
            'joinTable' => 'clinical_histories_habits',
        ]);
        $this->belongsToMany('MedicalsAntecedents', [
            'foreignKey' => 'clinic_history_id',
            'targetForeignKey' => 'medical_antecedent_id',
            'joinTable' => 'clinical_histories_medicals_antecedents',
        ]);
        $this->belongsToMany('SurgicalsAntecedents', [
            'foreignKey' => 'clinic_history_id',
            'targetForeignKey' => 'surgical_antecedent_id',
            'joinTable' => 'clinical_histories_surgicals_antecedents',
            'dependent' => true,
            'cascadeCallbacks' => true,
            
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
            ->scalar('workplan')
            ->maxLength('workplan', 400, 'Por favor no coloque mas de 400 caracteres')
            ->allowEmptyString('workplan');

        $validator
            ->integer('peso')
            ->allowEmptyString('peso');

        $validator
            ->scalar('altura')
            ->maxLength('altura', 4)
            ->allowEmptyString('altura');

        $validator
            ->integer('fr')
            ->allowEmptyString('fr');

        $validator
            ->integer('fc')
            ->allowEmptyString('fc');

        $validator
            ->scalar('ta', null, true)
            ->maxLength('ta', 50)
            ->allowEmptyString('ta');
            

        $validator
            ->scalar('reason_consultation')
            ->notEmptyString('reason_consultation', 'Por favor coloque el motivo de la consulta')
            ->maxLength('reason_consultation', 600, 'Por favor no coloque mas de 600 caracteres');

        $validator
            ->scalar('suggestions')
            ->allowEmptyString('suggestions')
            ->maxLength('suggestions', 600, 'Por favor no coloque mas de 600 caracteres');

        $validator
            ->scalar('diagnostic_impression')
            ->allowEmptyString('diagnostic_impression')
            ->maxLength('diagnostic_impression', 400, 'Por favor no coloque mas de 400 caracteres');

        $validator
            ->scalar('observations')
            ->notEmptyString('observations', 'Por favor coloque las observaciones')
            ->maxLength('observations', 2000, 'Por favor no coloque mas de 2000 caracteres');

        $validator
            ->scalar('disease_current')
            ->allowEmptyString('disease_current')
            ->maxLength('disease_current', 400, 'Por favor no coloque mas de 400 caracteres');

        $validator
            ->scalar('imc')
            ->maxLength('imc', 50)
            ->allowEmptyString('imc');

        $validator
            ->scalar('tp')
            ->maxLength('tp', 50)
            ->allowEmptyString('tp');

        $validator
            ->scalar('saturacion')
            ->maxLength('saturacion', 50)
            ->allowEmptyString('saturacion');

        $validator
            ->scalar('dental_diagnosis')
            ->notEmptyString('dental_diagnosis', 'Por favor coloque el diagnostico dental')
            ->maxLength('dental_diagnosis', 600, 'Por favor no coloque mas de 600 caracteres');

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
        $rules->add($rules->existsIn(['blood_type_id'], 'BloodTypes'), ['errorField' => 'blood_type_id']);
        $rules->add($rules->existsIn(['doctor_id'], 'Doctors'), ['errorField' => 'doctor_id']);

        return $rules;
    }
}
