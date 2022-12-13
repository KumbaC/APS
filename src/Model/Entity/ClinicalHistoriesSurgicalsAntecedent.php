<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClinicalHistoriesSurgicalsAntecedent Entity
 *
 * @property int $id
 * @property int $clinic_history_id
 * @property int $surgical_antecedent_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ClinicalHistory $clinical_history
 * @property \App\Model\Entity\SurgicalsAntecedent $surgical_antecedent
 */
class ClinicalHistoriesSurgicalsAntecedent extends Entity
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
        'surgical_antecedent_id' => true,
        'created' => true,
        'modified' => true,
        'clinical_history' => true,
        'surgicals_antecedent' => true,
    ];
}
