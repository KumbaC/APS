<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Immunology Model
 *
 * @property \App\Model\Table\LaboratoriesTable&\Cake\ORM\Association\BelongsToMany $Laboratories
 *
 * @method \App\Model\Entity\Immunology newEmptyEntity()
 * @method \App\Model\Entity\Immunology newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Immunology[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Immunology get($primaryKey, $options = [])
 * @method \App\Model\Entity\Immunology findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Immunology patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Immunology[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Immunology|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Immunology saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Immunology[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Immunology[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Immunology[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Immunology[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ImmunologyTable extends Table
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

        $this->setTable('immunology');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Laboratories', [
            'foreignKey' => 'immunology_id',
            'targetForeignKey' => 'laboratory_id',
            'joinTable' => 'laboratories_immunology',
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
