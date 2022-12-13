<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClinicalHistoriesSurgicalAntecedentsFixture
 */
class ClinicalHistoriesSurgicalAntecedentsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => 'IDENTIFICADOR DE LA TABLA', 'precision' => null, 'unsigned' => null],
        'clinic_history_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => 'Identificador de la historia clínica', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'surgical_antecedent_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => 'Identificador de surgical antecedents', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestampfractional', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 6],
        'modified' => ['type' => 'timestampfractional', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 6],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'clinical_histories-surgical_antecedents_fk' => ['type' => 'foreign', 'columns' => ['surgical_antecedent_id'], 'references' => ['surgical_antecedents', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'clinical_histories_surgical_antecedents_fk' => ['type' => 'foreign', 'columns' => ['clinic_history_id'], 'references' => ['clinical_histories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'clinic_history_id' => 1,
                'surgical_antecedent_id' => 1,
                'created' => 1667921069,
                'modified' => 1667921069,
            ],
        ];
        parent::init();
    }
}
