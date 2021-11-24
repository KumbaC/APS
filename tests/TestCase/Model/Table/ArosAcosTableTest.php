<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArosAcosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArosAcosTable Test Case
 */
class ArosAcosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArosAcosTable
     */
    protected $ArosAcos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ArosAcos',
        'app.Aros',
        'app.Acos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ArosAcos') ? [] : ['className' => ArosAcosTable::class];
        $this->ArosAcos = $this->getTableLocator()->get('ArosAcos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ArosAcos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ArosAcosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ArosAcosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
