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
        $this->hasMany('Laboratories', [
            'foreignKey' => 'clinical_history_id',
        ]);
        $this->belongsToMany('Diagnoses', [
            'foreignKey' => 'clinical_history_id',
            'targetForeignKey' => 'diagnosis_id',
            'joinTable' => 'clinical_histories_diagnoses',
        ]);
        $this->belongsToMany('Habits', [
            'foreignKey' => 'clinical_history_id',
            'targetForeignKey' => 'habit_id',
            'joinTable' => 'clinical_histories_habits',
        ]);
        $this->belongsToMany('MedicalsAntecedents', [
            'foreignKey' => 'clinical_history_id',
            'targetForeignKey' => 'medicals_antecedent_id',
            'joinTable' => 'clinical_histories_medicals_antecedents',
        ]);
        $this->belongsToMany('SurgicalsAntecedents', [
            'foreignKey' => 'clinical_history_id',
            'targetForeignKey' => 'surgicals_antecedent_id',
            'joinTable' => 'clinical_histories_surgicals_antecedents',
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
            ->scalar('workplan')
            ->allowEmptyString('workplan');

        $validator
            ->numeric('peso')
            ->allowEmptyString('peso');

        $validator
            ->scalar('altura')
            ->allowEmptyString('altura');

        $validator
            ->integer('fr')
            ->allowEmptyString('fr');

        $validator
            ->integer('fc')
            ->allowEmptyString('fc');

        $validator
            ->integer('ta')
            ->allowEmptyString('ta');

        $validator
            ->integer('expediente')
            ->allowEmptyString('expediente');

        $validator
            ->scalar('imc')
            ->allowEmptyString('imc');

        $validator
            ->scalar('tp')
            ->allowEmptyString('tp');

        $validator
            ->scalar('cms')
            ->allowEmptyString('cms');

        $validator
            ->scalar('saturacion')
            ->allowEmptyString('saturacion');

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
