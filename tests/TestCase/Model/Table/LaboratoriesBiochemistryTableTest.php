<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LaboratoriesBiochemistryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LaboratoriesBiochemistryTable Test Case
 */
class LaboratoriesBiochemistryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LaboratoriesBiochemistryTable
     */
    protected $LaboratoriesBiochemistry;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.LaboratoriesBiochemistry',
        'app.Laboratories',
        'app.Biochemistry',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LaboratoriesBiochemistry') ? [] : ['className' => LaboratoriesBiochemistryTable::class];
        $this->LaboratoriesBiochemistry = $this->getTableLocator()->get('LaboratoriesBiochemistry', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LaboratoriesBiochemistry);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LaboratoriesBiochemistryTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LaboratoriesBiochemistryTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
