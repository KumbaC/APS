<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClinicalHistoriesMedicalsAntecedent Entity
 *
 * @property int $id
 * @property int|null $clinic_history_id
 * @property int|null $medical_antecedent_id
 *
 * @property \App\Model\Entity\ClinicalHistory $clinical_history
 * @property \App\Model\Entity\MedicalsAntecedent $medicals_antecedent
 */
class ClinicalHistoriesMedicalsAntecedent extends Entity
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
        'clinic_history_id' => true,
        'medical_antecedent_id' => true,
        'clinical_history' => true,
        'medicals_antecedent' => true,
    ];
}
