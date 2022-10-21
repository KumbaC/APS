<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BiochemistryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BiochemistryTable Test Case
 */
class BiochemistryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BiochemistryTable
     */
    protected $Biochemistry;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Biochemistry',
        'app.Laboratories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Biochemistry') ? [] : ['className' => BiochemistryTable::class];
        $this->Biochemistry = $this->getTableLocator()->get('Biochemistry', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Biochemistry);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BiochemistryTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
