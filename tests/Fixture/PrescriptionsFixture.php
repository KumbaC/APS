<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PrescriptionsFixture
 */
class PrescriptionsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => 'Identificador de la tabla', 'precision' => null, 'unsigned' => null],
        'person_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relación con la tabla personas', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'beneficiary_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relación con la tabla beneficiarios', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'doctor_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relación con la tabla Doctores', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'descripcion' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => 'Aquí el doctor redacta la preescripcion para el paciente.', 'precision' => null],
        'quote_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relación con la tabla consultas', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'clinic_history_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relación con la tabla historia clinicas', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'prescriptions_beneficiary_fk' => ['type' => 'foreign', 'columns' => ['beneficiary_id'], 'references' => ['beneficiary', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'prescriptions_clinic_history_fk' => ['type' => 'foreign', 'columns' => ['clinic_history_id'], 'references' => ['clinical_histories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'prescriptions_doctores_fk' => ['type' => 'foreign', 'columns' => ['doctor_id'], 'references' => ['doctors', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'prescriptions_persons_fk' => ['type' => 'foreign', 'columns' => ['person_id'], 'references' => ['persons', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'prescriptions_quote_fk' => ['type' => 'foreign', 'columns' => ['quote_id'], 'references' => ['quotes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'person_id' => 1,
                'beneficiary_id' => 1,
                'doctor_id' => 1,
                'descripcion' => 'Lorem ipsum dolor sit amet',
                'quote_id' => 1,
                'clinic_history_id' => 1,
                'fecha' => '2021-11-23',
            ],
        ];
        parent::init();
    }
}
