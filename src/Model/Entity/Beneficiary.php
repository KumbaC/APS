<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Beneficiary Entity
 *
 * @property int $id
 * @property int $person_id
 * @property string|null $nombre
 * @property string|null $apellido
 * @property int $edad
 * @property int $gender_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $kin_id
 * @property string|null $cedula
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Gender $gender
 * @property \App\Model\Entity\Kin $kin
 * @property \App\Model\Entity\ClinicalHistory[] $clinical_histories
 * @property \App\Model\Entity\Quote[] $quotes
 */
class Beneficiary extends Entity
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
        'nombre' => true,
        'apellido' => true,
        'edad' => true,
        'gender_id' => true,
        'created' => true,
        'modified' => true,
        'kin_id' => true,
        'cedula' => true,
        'person' => true,
        'gender' => true,
        'kin' => true,
        'clinical_histories' => true,
        'quotes' => true,
    ];
}
