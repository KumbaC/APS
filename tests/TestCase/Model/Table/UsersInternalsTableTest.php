<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersInternalsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersInternalsTable Test Case
 */
class UsersInternalsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersInternalsTable
     */
    protected $UsersInternals;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.UsersInternals',
        'app.PublicWorkers',
        'app.Roles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('UsersInternals') ? [] : ['className' => UsersInternalsTable::class];
        $this->UsersInternals = $this->getTableLocator()->get('UsersInternals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UsersInternals);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsersInternalsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsersInternalsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
