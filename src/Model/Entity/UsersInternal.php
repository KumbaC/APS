<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersInternal Entity
 *
 * @property int $id
 * @property string $identification_card
 * @property string $email
 * @property string $network_user
 * @property string $full_name
 * @property int $public_worker_id
 * @property int $role_id
 * @property bool $active
 *
 * @property \App\Model\Entity\PublicWorker $public_worker
 * @property \App\Model\Entity\Role $role
 */
class UsersInternal extends Entity
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
        'identification_card' => true,
        'email' => true,
        'network_user' => true,
        'full_name' => true,
        'public_worker_id' => true,
        'role_id' => true,
        'active' => true,
        'public_worker' => true,
        'role' => true,
    ];
}
