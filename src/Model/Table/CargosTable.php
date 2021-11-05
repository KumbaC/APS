<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cargos Model
 *
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\HasMany $Persons
 *
 * @method \App\Model\Entity\Cargo newEmptyEntity()
 * @method \App\Model\Entity\Cargo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Cargo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cargo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cargo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Cargo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cargo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cargo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cargo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cargo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cargo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cargo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cargo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CargosTable extends Table
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

        $this->setTable('cargos');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->hasMany('Persons', [
            'foreignKey' => 'cargo_id',
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
