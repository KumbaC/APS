<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LaboratoriesSpecialsFixture
 */
class LaboratoriesSpecialsFixture extends TestFixture
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
        'special_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'laboratories_specials_especial_fk' => ['type' => 'foreign', 'columns' => ['special_id'], 'references' => ['specials', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'laboratories_specials_laboratory_fk' => ['type' => 'foreign', 'columns' => ['laboratory_id'], 'references' => ['laboratories', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'special_id' => 1,
            ],
        ];
        parent::init();
    }
}
