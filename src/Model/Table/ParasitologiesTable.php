<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;
/**
 * Parasitologies Model
 *
 * @property \App\Model\Table\LaboratoriesTable&\Cake\ORM\Association\BelongsToMany $Laboratories
 *
 * @method \App\Model\Entity\Parasitology newEmptyEntity()
 * @method \App\Model\Entity\Parasitology newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Parasitology[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Parasitology get($primaryKey, $options = [])
 * @method \App\Model\Entity\Parasitology findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Parasitology patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Parasitology[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Parasitology|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parasitology saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parasitology[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Parasitology[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Parasitology[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Parasitology[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ParasitologiesTable extends Table
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

        $this->setTable('parasitologies');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Laboratories', [
            'foreignKey' => 'parasitology_id',
            'targetForeignKey' => 'laboratory_id',
            'joinTable' => 'laboratories_parasitologies',
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
