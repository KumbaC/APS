<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatusTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatusTable Test Case
 */
class StatusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StatusTable
     */
    protected $Status;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Status',
        'app.Persons',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Status') ? [] : ['className' => StatusTable::class];
        $this->Status = $this->getTableLocator()->get('Status', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Status);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StatusTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
