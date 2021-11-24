<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Prescription Entity
 *
 * @property int $id
 * @property int|null $person_id
 * @property int|null $beneficiary_id
 * @property int|null $doctor_id
 * @property string|null $descripcion
 * @property int|null $quote_id
 * @property int|null $clinic_history_id
 * @property \Cake\I18n\FrozenDate $fecha
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Beneficiary $beneficiary
 * @property \App\Model\Entity\Doctor $doctor
 * @property \App\Model\Entity\Quote $quote
 * @property \App\Model\Entity\ClinicalHistory $clinical_history
 */
class Prescription extends Entity
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
        'doctor_id' => true,
        'descripcion' => true,
        'indicaciones' => true,
        'quote_id' => true,
        'clinic_history_id' => true,
        'fecha' => true,
        'person' => true,
        'beneficiary' => true,
        'doctor' => true,
        'quote' => true,
        'clinical_history' => true,
    ];
}
