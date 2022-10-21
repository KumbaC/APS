<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LaboratoriesFixture
 */
class LaboratoriesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'clinical_history_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => 'Relacion con Historia de Clinica', 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'descripcion' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => 'Observacion del laboratorio', 'precision' => null],
        'created' => ['type' => 'timestampfractional', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 6],
        'modified' => ['type' => 'timestampfractional', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 6],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'laboratories_clinical_history_fk' => ['type' => 'foreign', 'columns' => ['clinical_history_id'], 'references' => ['clinical_histories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'clinical_history_id' => 1,
                'descripcion' => 'Lorem ipsum dolor sit amet',
                'created' => 1652120124,
                'modified' => 1652120124,
            ],
        ];
        parent::init();
    }
}
