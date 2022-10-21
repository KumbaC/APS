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
 * @property string|null $type_of_diagnosis
 * @property int|null $peso
 * @property string|null $altura
 * @property int|null $fr
 * @property int|null $fc
 * @property string|null $ta
 * @property int|null $expediente
 * @property string|null $imc
 * @property string|null $lpm
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Beneficiary $beneficiary
 * @property \App\Model\Entity\BloodType $blood_type
 * @property \App\Model\Entity\Doctor $doctor
 * @property \App\Model\Entity\Laboratory[] $laboratories
 * @property \App\Model\Entity\Diagnosis[] $diagnoses
 * @property \App\Model\Entity\Habit[] $habits
 * @property \App\Model\Entity\MedicalsAntecedent[] $medicals_antecedents
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
        'person' => true,
        'beneficiary' => true,
        'laboratories' => true,
        'blood_type' => true,
        'doctor' => true,
        'diagnoses' => true,
        'habits' => true,
        'medicals_antecedents' => true,
        'type_of_diagnosis' => true,
        'peso' => true,
        'altura' => true,
        'fr' => true,
        'fc' => true,
        'ta' => true,
        'expediente' => true,
        'imc' => true,
        'lpm' => true
    ];


}
