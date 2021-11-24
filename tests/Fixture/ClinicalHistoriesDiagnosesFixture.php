<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClinicalHistoriesDiagnosesFixture
 */
class ClinicalHistoriesDiagnosesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'clinic_history_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'diagnosis_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'clinical_histories_diagnoses__diagnosis_fk' => ['type' => 'foreign', 'columns' => ['diagnosis_id'], 'references' => ['diagnoses', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'clinical_histories_diagnoses_fk' => ['type' => 'foreign', 'columns' => ['clinic_history_id'], 'references' => ['clinical_histories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'diagnosis_id' => 1,
            ],
        ];
        parent::init();
    }
}
