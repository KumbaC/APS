<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BeneficiaryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BeneficiaryTable Test Case
 */
class BeneficiaryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BeneficiaryTable
     */
    protected $Beneficiary;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Beneficiary',
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
        $config = $this->getTableLocator()->exists('Beneficiary') ? [] : ['className' => BeneficiaryTable::class];
        $this->Beneficiary = $this->getTableLocator()->get('Beneficiary', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Beneficiary);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\BeneficiaryTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\BeneficiaryTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
