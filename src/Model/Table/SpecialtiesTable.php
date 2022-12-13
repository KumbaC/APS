<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;
/**
 * Specialties Model
 *
 * @property \App\Model\Table\DoctorsTable&\Cake\ORM\Association\HasMany $Doctors
 * @property \App\Model\Table\PathologiesTable&\Cake\ORM\Association\HasMany $Pathologies
 * @property \App\Model\Table\QuotesTable&\Cake\ORM\Association\HasMany $Quotes
 *
 * @method \App\Model\Entity\Specialty newEmptyEntity()
 * @method \App\Model\Entity\Specialty newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Specialty[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Specialty get($primaryKey, $options = [])
 * @method \App\Model\Entity\Specialty findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Specialty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Specialty[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Specialty|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Specialty saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Specialty[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Specialty[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Specialty[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Specialty[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SpecialtiesTable extends Table
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

        $this->setTable('specialties');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Doctors', [
            'foreignKey' => 'specialty_id',
        ]);
        $this->hasMany('Pathologies', [
            'foreignKey' => 'specialty_id',
        ]);
        $this->hasMany('Quotes', [
            'foreignKey' => 'specialty_id',
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
        'id' => $session->read('Auth.User.role_id'),
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
            ->scalar('descripcion')
            ->allowEmptyString('descripcion');

        return $validator;
    }
}
