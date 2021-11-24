<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BloodType Entity
 *
 * @property int $id
 * @property string|null $descripcion
 *
 * @property \App\Model\Entity\ClinicalHistory[] $clinical_histories
 */
class BloodType extends Entity
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
        'clinical_histories' => true,
    ];
}
