<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClinicalHistory Entity
 *
 * @property int $id
 * @property int|null $person_id
 * @property int|null $beneficiary_id
 * @property int|null $blood_type_id
 * @property int|null $doctor_id
 * @property string|null $workplan
 * @property float|null $peso
 * @property string|null $altura
 * @property int|null $fr
 * @property int|null $fc
 * @property int|null $ta
 * @property int|null $expediente
 * @property string|null $imc
 * @property string|null $tp
 * @property string|null $cms
 * @property string|null $saturacion
 * @property string|null $laboratory_conclusions
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Beneficiary $beneficiary
 * @property \App\Model\Entity\BloodType $blood_type
 * @property \App\Model\Entity\Doctor $doctor
 * @property \App\Model\Entity\Quote $quote
 * @property \App\Model\Entity\Laboratory[] $laboratories
 * @property \App\Model\Entity\Diagnosis[] $diagnoses
 * @property \App\Model\Entity\Habit[] $habits
 * @property \App\Model\Entity\MedicalsAntecedent[] $medicals_antecedents
 * @property \App\Model\Entity\SurgicalsAntecedent[] $surgicals_antecedents
 */
class ClinicalHistory extends Entity
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
        'person_id' => true,
        'beneficiary_id' => true,
        'blood_type_id' => true,
        'doctor_id' => true,
        'quote_id' => true,
        'workplan' => true,
        'peso' => true,
        'altura' => true,
        'fr' => true,
        'fc' => true,
        'ta' => true,
        'reason_consultation' => true,
        'imc' => true,
        'tp' => true,
        'cms' => true,
        'saturacion' => true,
        'person' => true,
        'beneficiary' => true,
        'blood_type' => true,
        'doctor' => true,
        'quote' => true,
        'laboratories' => true,
        'diagnoses' => true,
        'habits' => true,
        'medicals_antecedents' => true,
        'surgicals_antecedents' => true,
        'observations' => true,
        'diagnostic_impression' => true,
        'suggestions' => true,
        'laboratory_conclusions' => true,
        'disease_current' => true,
        'dental_diagnosis' => true,
        'treatment_sequence' => true,
    ];
}