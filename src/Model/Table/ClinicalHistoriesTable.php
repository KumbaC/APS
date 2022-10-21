<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClinicalHistories Model
 *
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 * @property \App\Model\Table\BeneficiaryTable&\Cake\ORM\Association\BelongsTo $Beneficiary
 * @property \App\Model\Table\BloodTypesTable&\Cake\ORM\Association\BelongsTo $BloodTypes
 * @property \App\Model\Table\DoctorsTable&\Cake\ORM\Association\BelongsTo $Doctors
 * @property \App\Model\Table\LaboratoriesTable&\Cake\ORM\Association\HasMany $Laboratories
 * @property \App\Model\Table\DiagnosesTable&\Cake\ORM\Association\BelongsToMany $Diagnoses
 * @property \App\Model\Table\HabitsTable&\Cake\ORM\Association\BelongsToMany $Habits
 * @property \App\Model\Table\MedicalsAntecedentsTable&\Cake\ORM\Association\BelongsToMany $MedicalsAntecedents
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
            ->scalar('type_of_diagnosis')
            ->maxLength('type_of_diagnosis', 60)
            ->allowEmptyString('type_of_diagnosis');

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
            ->integer('expediente')
            ->allowEmptyString('expediente');

        $validator
            ->scalar('imc')
            ->maxLength('imc', 50)
            ->allowEmptyString('imc');

        $validator
            ->scalar('lpm')
            ->maxLength('lpm', 50)
            ->allowEmptyString('lpm');

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
