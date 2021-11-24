<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClinicalHistoriesHabitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClinicalHistoriesHabitsTable Test Case
 */
class ClinicalHistoriesHabitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClinicalHistoriesHabitsTable
     */
    protected $ClinicalHistoriesHabits;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ClinicalHistoriesHabits',
        'app.ClinicalHistories',
        'app.Habits',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ClinicalHistoriesHabits') ? [] : ['className' => ClinicalHistoriesHabitsTable::class];
        $this->ClinicalHistoriesHabits = $this->getTableLocator()->get('ClinicalHistoriesHabits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ClinicalHistoriesHabits);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClinicalHistoriesHabitsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ClinicalHistoriesHabitsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
