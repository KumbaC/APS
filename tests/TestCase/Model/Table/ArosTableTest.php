<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArosTable Test Case
 */
class ArosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArosTable
     */
    protected $Aros;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Aros') ? [] : ['className' => ArosTable::class];
        $this->Aros = $this->getTableLocator()->get('Aros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Aros);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ArosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ArosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
