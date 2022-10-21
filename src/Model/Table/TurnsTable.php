<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Turns Model
 *
 * @property \App\Model\Table\DoctorsTable&\Cake\ORM\Association\BelongsToMany $Doctors
 *
 * @method \App\Model\Entity\Turn newEmptyEntity()
 * @method \App\Model\Entity\Turn newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Turn[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Turn get($primaryKey, $options = [])
 * @method \App\Model\Entity\Turn findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Turn patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Turn[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Turn|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Turn saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Turn[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Turn[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Turn[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Turn[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TurnsTable extends Table
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

        $this->setTable('turns');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Doctors', [
            'foreignKey' => 'turn_id',
            'targetForeignKey' => 'doctor_id',
            'joinTable' => 'doctors_turns',
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

        $validator
            ->scalar('meridiano')
            ->allowEmptyString('meridiano');

        return $validator;
    }
}
