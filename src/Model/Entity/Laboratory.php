<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Laboratory Entity
 *
 * @property int $id
 * @property int|null $clinical_history_id
 * @property string|null $descripcion
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ClinicalHistory $clinical_history
 * @property \App\Model\Entity\Biochemistry[] $biochemistry
 * @property \App\Model\Entity\Hematology[] $hematologies
 * @property \App\Model\Entity\Immunology[] $immunology
 * @property \App\Model\Entity\Parasitology[] $parasitologies
 * @property \App\Model\Entity\Special[] $specials
 * @property \App\Model\Entity\Urinalysi[] $urinalysis
 */
class Laboratory extends Entity
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
        'clinical_history_id' => true,
        'descripcion' => true,
        'sonographic_exams' => true,
        'created' => true,
        'modified' => true,
        'clinical_history' => true,
        'biochemistry' => true,
        'hematologies' => true,
        'immunology' => true,
        'parasitologies' => true,
        'specials' => true,
        'urinalysis' => true,
    ];
}
