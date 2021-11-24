<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClinicalHistoriesHabitsFixture
 */
class ClinicalHistoriesHabitsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'clinic_history_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relacion con historia clinica', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'habit_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relación con tabla habit', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'clinical_histories_habits-clinical_historiesfk' => ['type' => 'foreign', 'columns' => ['clinic_history_id'], 'references' => ['clinical_histories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'clinical_histories_habits-fk' => ['type' => 'foreign', 'columns' => ['habit_id'], 'references' => ['habits', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'habit_id' => 1,
            ],
        ];
        parent::init();
    }
}
