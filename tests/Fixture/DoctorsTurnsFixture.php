<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DoctorsTurnsFixture
 */
class DoctorsTurnsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => 'Identificador de tabla', 'precision' => null, 'unsigned' => null],
        'doctor_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'turn_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'doctors_turns_doctor_fk' => ['type' => 'foreign', 'columns' => ['doctor_id'], 'references' => ['doctors', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'doctors_turns_turn_fk' => ['type' => 'foreign', 'columns' => ['turn_id'], 'references' => ['turns', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'doctor_id' => 1,
                'turn_id' => 1,
            ],
        ];
        parent::init();
    }
}
