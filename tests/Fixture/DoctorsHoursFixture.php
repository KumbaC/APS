<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DoctorsHoursFixture
 */
class DoctorsHoursFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'doctor_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'ID de los doctores', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'hour_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Turnos de los doctores', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'doctors_hours_fk' => ['type' => 'foreign', 'columns' => ['doctor_id'], 'references' => ['doctors', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'doctors_hours_horas_fk' => ['type' => 'foreign', 'columns' => ['hour_id'], 'references' => ['hours', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'hour_id' => 1,
            ],
        ];
        parent::init();
    }
}
