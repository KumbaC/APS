<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HoursTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HoursTable Test Case
 */
class HoursTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HoursTable
     */
    protected $Hours;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Hours',
        'app.Doctors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Hours') ? [] : ['className' => HoursTable::class];
        $this->Hours = $this->getTableLocator()->get('Hours', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Hours);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HoursTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
