<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClinicalHistoriesMedicalsAntecedentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClinicalHistoriesMedicalsAntecedentsTable Test Case
 */
class ClinicalHistoriesMedicalsAntecedentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClinicalHistoriesMedicalsAntecedentsTable
     */
    protected $ClinicalHistoriesMedicalsAntecedents;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ClinicalHistoriesMedicalsAntecedents',
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
        $config = $this->getTableLocator()->exists('ClinicalHistoriesMedicalsAntecedents') ? [] : ['className' => ClinicalHistoriesMedicalsAntecedentsTable::class];
        $this->ClinicalHistoriesMedicalsAntecedents = $this->getTableLocator()->get('ClinicalHistoriesMedicalsAntecedents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ClinicalHistoriesMedicalsAntecedents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClinicalHistoriesMedicalsAntecedentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ClinicalHistoriesMedicalsAntecedentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
