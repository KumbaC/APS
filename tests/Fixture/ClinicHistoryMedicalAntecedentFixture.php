<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClinicHistoryMedicalAntecedentFixture
 */
class ClinicHistoryMedicalAntecedentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'clinic_history_medical_antecedent';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'clinic_history_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'medical_antecedent_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'clinic_history_medical_antecedent_2_fk' => ['type' => 'foreign', 'columns' => ['medical_antecedent_id'], 'references' => ['medicals_antecedents', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'clinic_history_medical_antecedent_fk' => ['type' => 'foreign', 'columns' => ['clinic_history_id'], 'references' => ['clinical_histories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'medical_antecedent_id' => 1,
            ],
        ];
        parent::init();
    }
}
