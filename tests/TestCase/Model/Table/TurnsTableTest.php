<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TurnsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TurnsTable Test Case
 */
class TurnsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TurnsTable
     */
    protected $Turns;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Turns',
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
        $config = $this->getTableLocator()->exists('Turns') ? [] : ['className' => TurnsTable::class];
        $this->Turns = $this->getTableLocator()->get('Turns', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Turns);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TurnsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
