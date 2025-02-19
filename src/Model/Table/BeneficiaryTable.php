<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;
/**
 * Beneficiary Model
 *
 * @property \App\Model\Table\PersonsTable&\Cake\ORM\Association\BelongsTo $Persons
 * @property \App\Model\Table\GendersTable&\Cake\ORM\Association\BelongsTo $Genders
 * @property \App\Model\Table\KinsTable&\Cake\ORM\Association\BelongsTo $Kins
 * @property \App\Model\Table\ClinicalHistoriesTable&\Cake\ORM\Association\HasMany $ClinicalHistories
 * @property \App\Model\Table\QuotesTable&\Cake\ORM\Association\HasMany $Quotes
 *
 * @method \App\Model\Entity\Beneficiary newEmptyEntity()
 * @method \App\Model\Entity\Beneficiary newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Beneficiary[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Beneficiary get($primaryKey, $options = [])
 * @method \App\Model\Entity\Beneficiary findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Beneficiary patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Beneficiary[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Beneficiary|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Beneficiary saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Beneficiary[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Beneficiary[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Beneficiary[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Beneficiary[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BeneficiaryTable extends Table
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

        $this->setTable('beneficiary');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Genders', [
            'foreignKey' => 'gender_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Kins', [
            'foreignKey' => 'kin_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ClinicalHistories', [
            'foreignKey' => 'beneficiary_id',
        ]);
        $this->hasMany('Quotes', [
            'foreignKey' => 'beneficiary_id',
        ]);
      
        $this->addBehavior('AuditLog.Auditable', [
            //'ignore' => ['created'],
            //'habtm' => ['Tags'],
        ]);
    }

    public function currentUser(): array
{
    $session = Router::getRequest()->getSession();
    $session = Router::getRequest()->getAttribute('session');
    
    return [
        'id' => $session->read('Auth.User.id'),
        'ip' => Router::getRequest()->clientIp(),
        'url' => Router::url(null, true),
        'description' => $session->read('Auth.User.full_name')
        
    ];

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
            ->scalar('nombre')
            ->allowEmptyString('nombre');

        $validator
            ->scalar('apellido')
            ->allowEmptyString('apellido');

        $validator
            ->integer('edad')
            ->requirePresence('edad', 'create')
            ->notEmptyString('edad');

        $validator
            ->scalar('cedula')
            ->allowEmptyString('cedula');

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
        $rules->add($rules->existsIn(['person_id'], 'Persons'), ['errorField' => 'person_id']);
        $rules->add($rules->existsIn(['gender_id'], 'Genders'), ['errorField' => 'gender_id']);
        $rules->add($rules->existsIn(['kin_id'], 'Kins'), ['errorField' => 'kin_id']);

        return $rules;
    }
}
