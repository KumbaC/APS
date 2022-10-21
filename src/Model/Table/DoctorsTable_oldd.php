<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Doctors Model
 *
 * @property \App\Model\Table\SpecialtiesTable&\Cake\ORM\Association\BelongsTo $Specialties
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ClinicalHistoriesTable&\Cake\ORM\Association\HasMany $ClinicalHistories
 * @property \App\Model\Table\PrescriptionsTable&\Cake\ORM\Association\HasMany $prescriptions
 * @property \App\Model\Table\QuotesTable&\Cake\ORM\Association\HasMany $Quotes
 * @property \App\Model\Table\TurnsTable&\Cake\ORM\Association\BelongsToMany $Turns
 *
 * @method \App\Model\Entity\Doctor newEmptyEntity()
 * @method \App\Model\Entity\Doctor newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Doctor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Doctor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Doctor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Doctor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Doctor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Doctor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Doctor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DoctorsTable extends Table
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

        $this->setTable('doctors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Specialties', [
            'foreignKey' => 'specialty_id',
        ]);
        $this->belongsTo('Users_Doctors', [
            'foreignKey' => 'user_doctor_id',
        ]);
        $this->hasMany('ClinicalHistories', [
            'foreignKey' => 'doctor_id',
        ]);
        $this->hasMany('Prescriptions', [
            'foreignKey' => 'doctor_id',
        ]);
        $this->hasMany('Quotes', [
            'foreignKey' => 'doctor_id',
        ]);
    /*     $this->belongsToMany('Turns', [
            'foreignKey' => 'doctor_id',
            'targetForeignKey' => 'turn_id',
            'joinTable' => 'doctors_turns',
        ]); */
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
            ->scalar('cedula')
            ->allowEmptyString('cedula');

        $validator
            ->scalar('telefono')
            ->allowEmptyString('telefono');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('firma')
            ->maxLength('firma', 9)
            ->allowEmptyString('firma');

        $validator
            ->scalar('sello')
            ->maxLength('sello', 10)
            ->allowEmptyString('sello');

        $validator
            ->scalar('telefono_secundario')
            ->allowEmptyString('telefono_secundario');

        $validator
            ->scalar('username')
            ->allowEmptyString('username');

        $validator
            ->scalar('password')
            ->allowEmptyString('password');

        $validator
            ->integer('cupos')
            ->allowEmptyString('cupos');

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
        $rules->add($rules->existsIn(['user_doctor_id'], 'UsersDoctors'), ['errorField' => 'user_doctor_id']);

        return $rules;
    }
}
