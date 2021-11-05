<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KinsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KinsTable Test Case
 */
class KinsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KinsTable
     */
    protected $Kins;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Kins',
        'app.Beneficiary',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Kins') ? [] : ['className' => KinsTable::class];
        $this->Kins = $this->getTableLocator()->get('Kins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Kins);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\KinsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
