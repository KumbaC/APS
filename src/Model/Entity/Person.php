<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string $cedula
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $department_id
 * @property int $status_id
 * @property int|null $cargo_id
 * @property int|null $user_internal_id
 * @property int|null $unit_id
 * @property int|null $phone
 * @property int $edad
 * @property int|null $gender_id
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Cargo $cargo
 * @property \App\Model\Entity\UsersInternal $users_internal
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\Gender $gender
 * @property \App\Model\Entity\Beneficiary[] $beneficiary
 * @property \App\Model\Entity\ClinicalHistory[] $clinical_histories
 * @property \App\Model\Entity\PublicWorker[] $public_workers
 * @property \App\Model\Entity\Quote[] $quotes
 * @property \App\Model\Entity\User[] $users
 */
class Person extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'cedula' => true,
        'nombre' => true,
        'apellido' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'department_id' => true,
        'status_id' => true,
        'cargo_id' => true,
        'user_internal_id' => true,
        'unit_id' => true,
        'phone' => true,
        'edad' => true,
        'gender_id' => true,
        'department' => true,
        'status' => true,
        'cargo' => true,
        'users_internal' => true,
        'unit' => true,
        'gender' => true,
        'beneficiary' => true,
        'clinical_histories' => true,
        'public_workers' => true,
        'quotes' => true,
        'users' => true,
    ];
}
