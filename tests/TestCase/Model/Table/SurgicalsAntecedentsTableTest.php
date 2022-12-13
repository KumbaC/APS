<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SurgicalsAntecedentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SurgicalsAntecedentsTable Test Case
 */
class SurgicalsAntecedentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SurgicalsAntecedentsTable
     */
    protected $SurgicalsAntecedents;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SurgicalsAntecedents',
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
        $config = $this->getTableLocator()->exists('SurgicalsAntecedents') ? [] : ['className' => SurgicalsAntecedentsTable::class];
        $this->SurgicalsAntecedents = $this->getTableLocator()->get('SurgicalsAntecedents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SurgicalsAntecedents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SurgicalsAntecedentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
