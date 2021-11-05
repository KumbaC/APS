<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PublicWorker Entity
 *
 * @property int $id
 * @property string $identification_card
 * @property string|null $email
 * @property string $network_user
 * @property string|null $name
 * @property string|null $identity_card
 * @property int|null $person_id
 * @property string|null $code
 * @property string|null $email_alternative
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\UsersInternal[] $users_internals
 */
class PublicWorker extends Entity
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
        'name' => true,
        'identity_card' => true,
        'person_id' => true,
        'code' => true,
        'email_alternative' => true,
        'person' => true,
        'users_internals' => true,
    ];
}
