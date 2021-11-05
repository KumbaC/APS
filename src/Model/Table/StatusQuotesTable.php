<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StatusQuotes Model
 *
 * @property \App\Model\Table\QuotesTable&\Cake\ORM\Association\HasMany $Quotes
 *
 * @method \App\Model\Entity\StatusQuote newEmptyEntity()
 * @method \App\Model\Entity\StatusQuote newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\StatusQuote[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StatusQuote get($primaryKey, $options = [])
 * @method \App\Model\Entity\StatusQuote findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\StatusQuote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StatusQuote[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\StatusQuote|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StatusQuote saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StatusQuote[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StatusQuote[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\StatusQuote[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StatusQuote[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StatusQuotesTable extends Table
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

        $this->setTable('status_quotes');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Quotes', [
            'foreignKey' => 'status_quote_id',
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
