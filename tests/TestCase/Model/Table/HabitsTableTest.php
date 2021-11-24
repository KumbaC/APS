<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HabitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HabitsTable Test Case
 */
class HabitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HabitsTable
     */
    protected $Habits;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Habits',
        'app.ClinicalHistories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Habits') ? [] : ['className' => HabitsTable::class];
        $this->Habits = $this->getTableLocator()->get('Habits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Habits);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HabitsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
