<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quotes Model
 *
 * @property \App\Model\Table\SpecialtiesTable&\Cake\ORM\Association\BelongsTo $Specialties
 * @property \App\Model\Table\DiseasesTable&\Cake\ORM\Association\BelongsTo $Diseases
 * @property \App\Model\Table\PathologiesTable&\Cake\ORM\Association\BelongsTo $Pathologies
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 * @property \App\Model\Table\StatusQuotesTable&\Cake\ORM\Association\BelongsTo $StatusQuotes
 * @property \App\Model\Table\StatusTable&\Cake\ORM\Association\BelongsToMany $Status
 *
 * @method \App\Model\Entity\Quote newEmptyEntity()
 * @method \App\Model\Entity\Quote newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Quote[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quote get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quote findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Quote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quote[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quote|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quote saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuotesTable extends Table
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

        $this->setTable('quotes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Specialties', [
            'foreignKey' => 'specialty_id',
        ]);
        $this->belongsTo('Diseases', [
            'foreignKey' => 'disease_id',
        ]);
        $this->belongsTo('Pathologies', [
            'foreignKey' => 'pathology_id',
        ]);
        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
        ]);
        $this->belongsTo('StatusQuotes', [
            'foreignKey' => 'status_quote_id',
        ]);
        $this->belongsToMany('Status', [
            'foreignKey' => 'quote_id',
            'targetForeignKey' => 'status_id',
            'joinTable' => 'status_quotes',
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
            ->scalar('asunto')
            ->allowEmptyString('asunto');

        $validator
            ->scalar('nota')
            ->allowEmptyString('nota');

        $validator
            ->date('fecha')
            ->allowEmptyDate('fecha');

        $validator
            ->time('hora')
            ->allowEmptyTime('hora');

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
        $rules->add($rules->existsIn(['specialty_id'], 'Specialties'), ['errorField' => 'specialty_id']);
        $rules->add($rules->existsIn(['disease_id'], 'Diseases'), ['errorField' => 'disease_id']);
        $rules->add($rules->existsIn(['pathology_id'], 'Pathologies'), ['errorField' => 'pathology_id']);
        $rules->add($rules->existsIn(['person_id'], 'Persons'), ['errorField' => 'person_id']);
        $rules->add($rules->existsIn(['status_quote_id'], 'StatusQuotes'), ['errorField' => 'status_quote_id']);

        return $rules;
    }
}
