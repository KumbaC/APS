<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quote Entity
 *
 * @property int $id
 * @property string|null $asunto
 * @property string|null $nota
 * @property int|null $specialty_id
 * @property int|null $disease_id
 * @property int|null $pathology_id
 * @property \Cake\I18n\FrozenDate|null $fecha
 * @property \Cake\I18n\Time|null $hora
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $person_id
 * @property int|null $status_quote_id
 *
 * @property \App\Model\Entity\Specialty $specialty
 * @property \App\Model\Entity\Disease $disease
 * @property \App\Model\Entity\Pathology $pathology
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\StatusQuote $status_quote
 * @property \App\Model\Entity\Status[] $status
 */
class Quote extends Entity
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
        'asunto' => true,
        'nota' => true,
        'specialty_id' => true,
        'disease_id' => true,
        'pathology_id' => true,
        'fecha' => true,
        'hora' => true,
        'created' => true,
        'modified' => true,
        'person_id' => true,
        'status_quote_id' => true,
        'specialty' => true,
        'disease' => true,
        'pathology' => true,
        'person' => true,
        'status_quote' => true,
        'status' => true,
    ];
}