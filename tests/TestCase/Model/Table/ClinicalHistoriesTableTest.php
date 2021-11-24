<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClinicalHistoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClinicalHistoriesTable Test Case
 */
class ClinicalHistoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClinicalHistoriesTable
     */
    protected $ClinicalHistories;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ClinicalHistories',
        'app.Persons',
        'app.Beneficiary',
        'app.BloodTypes',
        'app.Diagnoses',
        'app.Habits',
        'app.MedicalsAntecedents',
        'app.Doctors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ClinicalHistories') ? [] : ['className' => ClinicalHistoriesTable::class];
        $this->ClinicalHistories = $this->getTableLocator()->get('ClinicalHistories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ClinicalHistories);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClinicalHistoriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ClinicalHistoriesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
