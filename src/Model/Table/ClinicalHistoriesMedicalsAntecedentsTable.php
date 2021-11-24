<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClinicalHistoriesMedicalsAntecedents Model
 *
 * @property \App\Model\Table\ClinicalHistoriesTable&\Cake\ORM\Association\BelongsTo $ClinicalHistories
 * @property \App\Model\Table\MedicalsAntecedentsTable&\Cake\ORM\Association\BelongsTo $MedicalsAntecedents
 *
 * @method \App\Model\Entity\ClinicalHistoriesMedicalsAntecedent newEmptyEntity()
 * @method \App\Model\Entity\ClinicalHistoriesMedicalsAntecedent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesMedicalsAntecedent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesMedicalsAntecedent get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesMedicalsAntecedent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesMedicalsAntecedent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesMedicalsAntecedent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesMedicalsAntecedent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesMedicalsAntecedent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesMedicalsAntecedent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesMedicalsAntecedent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesMedicalsAntecedent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClinicalHistoriesMedicalsAntecedent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ClinicalHistoriesMedicalsAntecedentsTable extends Table
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

        $this->setTable('clinical_histories_medicals_antecedents');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ClinicalHistories', [
            'foreignKey' => 'clinic_history_id',
        ]);
        $this->belongsTo('MedicalsAntecedents', [
            'foreignKey' => 'medical_antecedent_id',
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
        $rules->add($rules->existsIn(['medical_antecedent_id'], 'MedicalsAntecedents'), ['errorField' => 'medical_antecedent_id']);

        return $rules;
    }
}
