<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrescriptionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrescriptionsTable Test Case
 */
class PrescriptionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrescriptionsTable
     */
    protected $prescriptions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Prescriptions',
        'app.Persons',
        'app.Beneficiary',
        'app.Doctors',
        'app.Quotes',
        'app.ClinicalHistories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Prescriptions') ? [] : ['className' => PrescriptionsTable::class];
        $this->Prescriptions = $this->getTableLocator()->get('Prescriptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Prescriptions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PrescriptionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PrescriptionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
