<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;
/**
 * Laboratories Model
 *
 * @property \App\Model\Table\ClinicalHistoriesTable&\Cake\ORM\Association\BelongsTo $ClinicalHistories
 * @property \App\Model\Table\BiochemistryTable&\Cake\ORM\Association\BelongsToMany $Biochemistry
 * @property \App\Model\Table\HematologiesTable&\Cake\ORM\Association\BelongsToMany $Hematologies
 * @property \App\Model\Table\ImmunologyTable&\Cake\ORM\Association\BelongsToMany $Immunology
 * @property \App\Model\Table\ParasitologiesTable&\Cake\ORM\Association\BelongsToMany $Parasitologies
 * @property \App\Model\Table\SpecialsTable&\Cake\ORM\Association\BelongsToMany $Specials
 * @property \App\Model\Table\UrinalysisTable&\Cake\ORM\Association\BelongsToMany $Urinalysis
 *
 * @method \App\Model\Entity\Laboratory newEmptyEntity()
 * @method \App\Model\Entity\Laboratory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Laboratory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Laboratory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Laboratory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Laboratory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Laboratory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Laboratory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Laboratory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Laboratory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Laboratory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Laboratory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Laboratory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LaboratoriesTable extends Table
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

        $this->setTable('laboratories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ClinicalHistories', [
            'foreignKey' => 'clinical_history_id',
        ]);
        $this->belongsToMany('Biochemistry', [
            'foreignKey' => 'laboratory_id',
            'targetForeignKey' => 'biochemistry_id',
            'joinTable' => 'laboratories_biochemistry',
        ]);
        $this->belongsToMany('Hematologies', [
            'foreignKey' => 'laboratory_id',
            'targetForeignKey' => 'hematology_id',
            'joinTable' => 'laboratories_hematologies',
        ]);
        $this->belongsToMany('Immunology', [
            'foreignKey' => 'laboratory_id',
            'targetForeignKey' => 'immunology_id',
            'joinTable' => 'laboratories_immunology',
        ]);
        $this->belongsToMany('Parasitologies', [
            'foreignKey' => 'laboratory_id',
            'targetForeignKey' => 'parasitology_id',
            'joinTable' => 'laboratories_parasitologies',
        ]);
        $this->belongsToMany('Specials', [
            'foreignKey' => 'laboratory_id',
            'targetForeignKey' => 'special_id',
            'joinTable' => 'laboratories_specials',
        ]);
        $this->belongsToMany('Urinalysis', [
            'foreignKey' => 'laboratory_id',
            'targetForeignKey' => 'urinalysis_id',
            'joinTable' => 'laboratories_urinalysis',
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
            ->notEmptyString('descripcion', 'Por favor llenar la información de los examenes paraclinicos')
            ->maxLength('descripcion', 424, 'La información no puede ser mayor a 400 caracteres')
            ->minLength('descripcion', 10, 'La información debe tener como minimo 10 caracteres');

        $validator
            ->scalar('sonographic_exams')
            ->allowEmpty('sonographic_exams')
            ->maxLength('sonographic_exams', 424, 'La información no puede ser mayor a 400 caracteres');
            

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
        $rules->add($rules->existsIn(['clinical_history_id'], 'ClinicalHistories'), ['errorField' => 'clinical_history_id']);

        return $rules;
    }
}
