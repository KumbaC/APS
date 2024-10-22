<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pathology Entity
 *
 * @property int $id
 * @property string|null $descripcion
 * @property int|null $specialty_id
 *
 * @property \App\Model\Entity\Specialty $specialty
 */
class Pathology extends Entity
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
        'descripcion' => true,
        'specialty_id' => true,
        'specialty' => true,
    ];
}
