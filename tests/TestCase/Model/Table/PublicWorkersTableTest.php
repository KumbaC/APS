<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PublicWorkersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PublicWorkersTable Test Case
 */
class PublicWorkersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PublicWorkersTable
     */
    protected $PublicWorkers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PublicWorkers',
        'app.People',
        'app.UsersInternals',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PublicWorkers') ? [] : ['className' => PublicWorkersTable::class];
        $this->PublicWorkers = $this->getTableLocator()->get('PublicWorkers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PublicWorkers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PublicWorkersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PublicWorkersTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
