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
 * @property int $department_id
 * @property int $status_id
 * @property int $cargo_id
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Cargo $cargo
 * @property \App\Model\Entity\User[] $users
 */
class Person extends Entity
{
    //ACL
    /* public function parentNode() {
        return null;
    } */

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
        'department' => true,
        'status' => true,
        'cargo' => true,
        'users' => true,
    ];
}
