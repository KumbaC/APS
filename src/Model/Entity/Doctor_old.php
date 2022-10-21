<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Doctor Entity
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string|null $cedula
 * @property string|null $telefono
 * @property string|null $email
 * @property int|null $specialty_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $user_internal_id
 * @property string|null $firma
 * @property string|null $sello
 * @property string|null $telefono_secundario
 * @property int $turn_id
 *
 * @property \App\Model\Entity\Specialty $specialty
 * @property \App\Model\Entity\UsersInternal $users_internal
 * @property \App\Model\Entity\Turn $turn
 * @property \App\Model\Entity\ClinicalHistory[] $clinical_histories
 * @property \App\Model\Entity\Prescription[] $prescriptions
 * @property \App\Model\Entity\Quote[] $quotes
 */
class Doctor extends Entity
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
        'nombre' => true,
        'apellido' => true,
        'cedula' => true,
        'telefono' => true,
        'email' => true,
        'specialty_id' => true,
        'created' => true,
        'modified' => true,
        'user_internal_id' => true,
        'firma' => true,
        'sello' => true,
        'telefono_secundario' => true,
        'turn_id' => true,
        'specialty' => true,
        'users_internal' => true,
        'turn' => true,
        'clinical_histories' => true,
        'prescriptions' => true,
        'quotes' => true,
    ];
}
