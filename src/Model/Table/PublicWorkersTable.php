<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PublicWorkers Model
 *
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 * @property \App\Model\Table\UsersInternalsTable&\Cake\ORM\Association\HasMany $UsersInternals
 *
 * @method \App\Model\Entity\PublicWorker newEmptyEntity()
 * @method \App\Model\Entity\PublicWorker newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PublicWorker[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PublicWorker get($primaryKey, $options = [])
 * @method \App\Model\Entity\PublicWorker findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PublicWorker patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PublicWorker[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PublicWorker|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PublicWorker saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PublicWorker[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PublicWorker[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PublicWorker[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PublicWorker[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PublicWorkersTable extends Table
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

        $this->setTable('public_workers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
        ]);
        $this->hasMany('UsersInternals', [
            'foreignKey' => 'public_worker_id',
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
            ->scalar('identification_card')
            ->requirePresence('identification_card', 'create')
            ->notEmptyString('identification_card')
            ->add('identification_card', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('network_user')
            ->requirePresence('network_user', 'create')
            ->notEmptyString('network_user');

        $validator
            ->scalar('name')
            ->allowEmptyString('name');

        $validator
            ->scalar('identity_card')
            ->allowEmptyString('identity_card');

        $validator
            ->scalar('code')
            ->allowEmptyString('code');

        $validator
            ->scalar('email_alternative')
            ->allowEmptyString('email_alternative');

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
        $rules->add($rules->isUnique(['identification_card']), ['errorField' => 'identification_card']);
        $rules->add($rules->existsIn(['person_id'], 'Persons'), ['errorField' => 'person_id']);

        return $rules;
    }
}
