<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DoctorsTurns Model
 *
 * @property \App\Model\Table\DoctorsTable&\Cake\ORM\Association\BelongsTo $Doctors
 * @property \App\Model\Table\TurnsTable&\Cake\ORM\Association\BelongsTo $Turns
 *
 * @method \App\Model\Entity\DoctorsTurn newEmptyEntity()
 * @method \App\Model\Entity\DoctorsTurn newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DoctorsTurn[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DoctorsTurn get($primaryKey, $options = [])
 * @method \App\Model\Entity\DoctorsTurn findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DoctorsTurn patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DoctorsTurn[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DoctorsTurn|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoctorsTurn saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoctorsTurn[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DoctorsTurn[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DoctorsTurn[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DoctorsTurn[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DoctorsTurnsTable extends Table
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

        $this->setTable('doctors_turns');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Doctors', [
            'foreignKey' => 'doctor_id',
        ]);
        $this->belongsTo('Turns', [
            'foreignKey' => 'turn_id',
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
        $rules->add($rules->existsIn(['doctor_id'], 'Doctors'), ['errorField' => 'doctor_id']);
        $rules->add($rules->existsIn(['turn_id'], 'Turns'), ['errorField' => 'turn_id']);

        return $rules;
    }
}
