<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClinicalHistoriesDiagnosesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClinicalHistoriesDiagnosesTable Test Case
 */
class ClinicalHistoriesDiagnosesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClinicalHistoriesDiagnosesTable
     */
    protected $ClinicalHistoriesDiagnoses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ClinicalHistoriesDiagnoses',
        'app.ClinicalHistories',
        'app.Diagnoses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ClinicalHistoriesDiagnoses') ? [] : ['className' => ClinicalHistoriesDiagnosesTable::class];
        $this->ClinicalHistoriesDiagnoses = $this->getTableLocator()->get('ClinicalHistoriesDiagnoses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ClinicalHistoriesDiagnoses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClinicalHistoriesDiagnosesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ClinicalHistoriesDiagnosesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
