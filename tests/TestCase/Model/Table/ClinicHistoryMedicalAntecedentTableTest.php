<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClinicHistoryMedicalAntecedentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClinicHistoryMedicalAntecedentTable Test Case
 */
class ClinicHistoryMedicalAntecedentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClinicHistoryMedicalAntecedentTable
     */
    protected $ClinicHistoryMedicalAntecedent;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ClinicHistoryMedicalAntecedent',
        'app.ClinicalHistories',
        'app.MedicalsAntecedents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ClinicHistoryMedicalAntecedent') ? [] : ['className' => ClinicHistoryMedicalAntecedentTable::class];
        $this->ClinicHistoryMedicalAntecedent = $this->getTableLocator()->get('ClinicHistoryMedicalAntecedent', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ClinicHistoryMedicalAntecedent);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClinicHistoryMedicalAntecedentTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ClinicHistoryMedicalAntecedentTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
