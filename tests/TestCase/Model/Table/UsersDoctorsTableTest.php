<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersDoctorsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersDoctorsTable Test Case
 */
class UsersDoctorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersDoctorsTable
     */
    protected $UsersDoctors;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.UsersDoctors',
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
        $config = $this->getTableLocator()->exists('UsersDoctors') ? [] : ['className' => UsersDoctorsTable::class];
        $this->UsersDoctors = $this->getTableLocator()->get('UsersDoctors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->UsersDoctors);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsersDoctorsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsersDoctorsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
