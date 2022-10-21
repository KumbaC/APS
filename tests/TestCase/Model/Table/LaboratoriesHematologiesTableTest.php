<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LaboratoriesHematologiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LaboratoriesHematologiesTable Test Case
 */
class LaboratoriesHematologiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LaboratoriesHematologiesTable
     */
    protected $LaboratoriesHematologies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.LaboratoriesHematologies',
        'app.Laboratories',
        'app.Hematologies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LaboratoriesHematologies') ? [] : ['className' => LaboratoriesHematologiesTable::class];
        $this->LaboratoriesHematologies = $this->getTableLocator()->get('LaboratoriesHematologies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LaboratoriesHematologies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LaboratoriesHematologiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LaboratoriesHematologiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
