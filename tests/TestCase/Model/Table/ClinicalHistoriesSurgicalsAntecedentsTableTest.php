<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClinicalHistoriesSurgicalsAntecedentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClinicalHistoriesSurgicalsAntecedentsTable Test Case
 */
class ClinicalHistoriesSurgicalsAntecedentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClinicalHistoriesSurgicalsAntecedentsTable
     */
    protected $ClinicalHistoriesSurgicalsAntecedents;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ClinicalHistoriesSurgicalsAntecedents',
        'app.ClinicalHistories',
        'app.SurgicalsAntecedents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ClinicalHistoriesSurgicalsAntecedents') ? [] : ['className' => ClinicalHistoriesSurgicalsAntecedentsTable::class];
        $this->ClinicalHistoriesSurgicalsAntecedents = $this->getTableLocator()->get('ClinicalHistoriesSurgicalsAntecedents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ClinicalHistoriesSurgicalsAntecedents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ClinicalHistoriesSurgicalsAntecedentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ClinicalHistoriesSurgicalsAntecedentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
