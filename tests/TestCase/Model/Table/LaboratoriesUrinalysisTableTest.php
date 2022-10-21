<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LaboratoriesUrinalysisTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LaboratoriesUrinalysisTable Test Case
 */
class LaboratoriesUrinalysisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LaboratoriesUrinalysisTable
     */
    protected $LaboratoriesUrinalysis;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.LaboratoriesUrinalysis',
        'app.Laboratories',
        'app.Urinalysis',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LaboratoriesUrinalysis') ? [] : ['className' => LaboratoriesUrinalysisTable::class];
        $this->LaboratoriesUrinalysis = $this->getTableLocator()->get('LaboratoriesUrinalysis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LaboratoriesUrinalysis);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LaboratoriesUrinalysisTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LaboratoriesUrinalysisTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
