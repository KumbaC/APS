<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuotesFixture
 */
class QuotesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'asunto' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'nota' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null],
        'person_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'beneficiary_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'specialty_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'status_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'disease_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pathology_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'hora' => ['type' => 'time', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'created' => ['type' => 'timestampfractional', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 6],
        'modified' => ['type' => 'timestampfractional', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => 6],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'quotes_beneficiary_fk' => ['type' => 'foreign', 'columns' => ['beneficiary_id'], 'references' => ['beneficiary', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'quotes_disease_fk' => ['type' => 'foreign', 'columns' => ['disease_id'], 'references' => ['diseases', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'quotes_pathology_fk' => ['type' => 'foreign', 'columns' => ['pathology_id'], 'references' => ['pathologies', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'quotes_person_fk' => ['type' => 'foreign', 'columns' => ['person_id'], 'references' => ['persons', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'quotes_specialties_fk' => ['type' => 'foreign', 'columns' => ['specialty_id'], 'references' => ['specialties', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'quotes_status_fk' => ['type' => 'foreign', 'columns' => ['status_id'], 'references' => ['status', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'asunto' => 'Lorem ipsum dolor sit amet',
                'nota' => 'Lorem ipsum dolor sit amet',
                'person_id' => 1,
                'beneficiary_id' => 1,
                'specialty_id' => 1,
                'status_id' => 1,
                'disease_id' => 1,
                'pathology_id' => 1,
                'fecha' => '2021-10-28',
                'hora' => '14:29:11',
                'created' => 1635431351,
                'modified' => 1635431351,
            ],
        ];
        parent::init();
    }
}
