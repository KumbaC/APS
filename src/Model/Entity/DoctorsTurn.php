<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DoctorsTurn Entity
 *
 * @property int $id
 * @property int|null $doctor_id
 * @property int|null $turn_id
 *
 * @property \App\Model\Entity\Doctor $doctor
 * @property \App\Model\Entity\Turn $turn
 */
class DoctorsTurn extends Entity
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
        'doctor_id' => true,
        'turn_id' => true,
        'doctor' => true,
        'turn' => true,
    ];
}
