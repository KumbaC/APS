<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Diagnoses Model
 *
 * @property \App\Model\Table\ClinicalHistoriesTable&\Cake\ORM\Association\BelongsToMany $ClinicalHistories
 *
 * @method \App\Model\Entity\Diagnosis newEmptyEntity()
 * @method \App\Model\Entity\Diagnosis newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosis[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosis get($primaryKey, $options = [])
 * @method \App\Model\Entity\Diagnosis findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Diagnosis patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosis[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Diagnosis|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diagnosis saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diagnosis[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diagnosis[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diagnosis[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diagnosis[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DiagnosesTable extends Table
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

        $this->setTable('diagnoses');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->belongsToMany('ClinicalHistories', [
            'foreignKey' => 'diagnosis_id',
            'targetForeignKey' => 'clinic_history_id',
            'joinTable' => 'clinical_histories_diagnoses',
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
            ->scalar('descripcion')
            ->allowEmptyString('descripcion');

        return $validator;
    }
}
