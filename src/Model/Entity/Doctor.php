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
 * @property float|null $telefono
 * @property string|null $email
 * @property int $specialty_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Specialty $specialty
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
        'specialty' => true,
    ];
}
