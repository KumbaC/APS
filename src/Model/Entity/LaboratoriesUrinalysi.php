<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LaboratoriesUrinalysi Entity
 *
 * @property int $id
 * @property int|null $laboratory_id
 * @property int|null $urinalysis_id
 *
 * @property \App\Model\Entity\Laboratory $laboratory
 * @property \App\Model\Entity\Urinalysi $urinalysi
 */
class LaboratoriesUrinalysi extends Entity
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
        'laboratory_id' => true,
        'urinalysis_id' => true,
        'laboratory' => true,
        'urinalysi' => true,
    ];
}
