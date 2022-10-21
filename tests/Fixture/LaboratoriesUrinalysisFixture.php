<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LaboratoriesUrinalysisFixture
 */
class LaboratoriesUrinalysisFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'laboratories_urinalysis';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'laboratory_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'urinalysis_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'laboratories_urinalysis_laboratory_fk' => ['type' => 'foreign', 'columns' => ['laboratory_id'], 'references' => ['laboratories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'laboratories_urinalysis_uri_fk' => ['type' => 'foreign', 'columns' => ['urinalysis_id'], 'references' => ['urinalysis', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'urinalysis_id' => 1,
            ],
        ];
        parent::init();
    }
}
