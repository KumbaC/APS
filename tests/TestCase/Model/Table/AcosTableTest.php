<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AcosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AcosTable Test Case
 */
class AcosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AcosTable
     */
    protected $Acos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Acos',
        'app.Aros',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Acos') ? [] : ['className' => AcosTable::class];
        $this->Acos = $this->getTableLocator()->get('Acos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Acos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AcosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AcosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
