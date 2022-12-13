<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClinicalHistoriesSurgicalAntecedentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClinicalHistoriesSurgicalAntecedentsTable Test Case
 */
class ClinicalHistoriesSurgicalAntecedentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClinicalHistoriesSurgicalAntecedentsTable
     */
    protected $ClinicalHistoriesSurgicalAntecedents;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ClinicalHistoriesSurgicalAntecedents',
        'app.ClinicalHistories',
        'app.SurgicalAntecedents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ClinicalHistoriesSurgicalAntecedents') ? [] : ['className' => ClinicalHistoriesSurgicalAntecedentsTable::class];
        $this->ClinicalHistoriesSurgicalAntecedents = $this->getTableLocator()->get('ClinicalHistoriesSurgicalAntecedents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ClinicalHistoriesSurgicalAntecedents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClinicalHistoriesSurgicalAntecedentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ClinicalHistoriesSurgicalAntecedentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
