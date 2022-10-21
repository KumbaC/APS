<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LaboratoriesHematology Entity
 *
 * @property int $id
 * @property int|null $laboratory_id
 * @property int|null $hematology_id
 *
 * @property \App\Model\Entity\Laboratory $laboratory
 * @property \App\Model\Entity\Hematology $hematology
 */
class LaboratoriesHematology extends Entity
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
        'hematology_id' => true,
        'laboratory' => true,
        'hematology' => true,
    ];
}
