<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LaboratoriesParasitologiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LaboratoriesParasitologiesTable Test Case
 */
class LaboratoriesParasitologiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LaboratoriesParasitologiesTable
     */
    protected $LaboratoriesParasitologies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.LaboratoriesParasitologies',
        'app.Laboratories',
        'app.Parasitologies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LaboratoriesParasitologies') ? [] : ['className' => LaboratoriesParasitologiesTable::class];
        $this->LaboratoriesParasitologies = $this->getTableLocator()->get('LaboratoriesParasitologies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LaboratoriesParasitologies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LaboratoriesParasitologiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LaboratoriesParasitologiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
