<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonsTable Test Case
 */
class PersonsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonsTable
     */
    protected $Persons;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Persons',
        'app.Departments',
        'app.Status',
        'app.Cargos',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Persons') ? [] : ['className' => PersonsTable::class];
        $this->Persons = $this->getTableLocator()->get('Persons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Persons);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PersonsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PersonsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
