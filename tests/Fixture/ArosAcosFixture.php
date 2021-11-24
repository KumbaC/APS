<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArosAcosFixture
 */
class ArosAcosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'aro_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'aco_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_create' => ['type' => 'string', 'length' => 2, 'default' => '0', 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null],
        '_read' => ['type' => 'string', 'length' => 2, 'default' => '0', 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null],
        '_update' => ['type' => 'string', 'length' => 2, 'default' => '0', 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null],
        '_delete' => ['type' => 'string', 'length' => 2, 'default' => '0', 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null],
        '_indexes' => [
            'aros_acos_aco_id' => ['type' => 'index', 'columns' => ['aco_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'aros_acos_aro_id_aco_id' => ['type' => 'unique', 'columns' => ['aro_id', 'aco_id'], 'length' => []],
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
                'aro_id' => 1,
                'aco_id' => 1,
                '_create' => 'Lo',
                '_read' => 'Lo',
                '_update' => 'Lo',
                '_delete' => 'Lo',
            ],
        ];
        parent::init();
    }
}
