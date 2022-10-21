<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LaboratoriesParasitologies Model
 *
 * @property \App\Model\Table\LaboratoriesTable&\Cake\ORM\Association\BelongsTo $Laboratories
 * @property \App\Model\Table\ParasitologiesTable&\Cake\ORM\Association\BelongsTo $Parasitologies
 *
 * @method \App\Model\Entity\LaboratoriesParasitology newEmptyEntity()
 * @method \App\Model\Entity\LaboratoriesParasitology newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\LaboratoriesParasitology[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LaboratoriesParasitology get($primaryKey, $options = [])
 * @method \App\Model\Entity\LaboratoriesParasitology findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\LaboratoriesParasitology patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LaboratoriesParasitology[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LaboratoriesParasitology|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LaboratoriesParasitology saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LaboratoriesParasitology[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LaboratoriesParasitology[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\LaboratoriesParasitology[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LaboratoriesParasitology[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LaboratoriesParasitologiesTable extends Table
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

        $this->setTable('laboratories_parasitologies');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Laboratories', [
            'foreignKey' => 'laboratory_id',
        ]);
        $this->belongsTo('Parasitologies', [
            'foreignKey' => 'parasitology_id',
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
        $rules->add($rules->existsIn(['laboratory_id'], 'Laboratories'), ['errorField' => 'laboratory_id']);
        $rules->add($rules->existsIn(['parasitology_id'], 'Parasitologies'), ['errorField' => 'parasitology_id']);

        return $rules;
    }
}
