<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LaboratoriesParasitologiesFixture
 */
class LaboratoriesParasitologiesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'laboratory_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'parasitology_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'laboratories_parasitologies_laboratories_fk' => ['type' => 'foreign', 'columns' => ['laboratory_id'], 'references' => ['laboratories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'laboratories_parasitologies_parasitologia_fk' => ['type' => 'foreign', 'columns' => ['parasitology_id'], 'references' => ['parasitologies', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'laboratory_id' => 1,
                'parasitology_id' => 1,
            ],
        ];
        parent::init();
    }
}
