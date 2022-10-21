<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoctorsTurnsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoctorsTurnsTable Test Case
 */
class DoctorsTurnsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DoctorsTurnsTable
     */
    protected $DoctorsTurns;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DoctorsTurns',
        'app.Doctors',
        'app.Turns',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DoctorsTurns') ? [] : ['className' => DoctorsTurnsTable::class];
        $this->DoctorsTurns = $this->getTableLocator()->get('DoctorsTurns', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DoctorsTurns);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DoctorsTurnsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DoctorsTurnsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
