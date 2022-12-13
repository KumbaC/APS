<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SurgicalAntecedentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SurgicalAntecedentsTable Test Case
 */
class SurgicalAntecedentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SurgicalAntecedentsTable
     */
    protected $SurgicalAntecedents;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SurgicalAntecedents',
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
        $config = $this->getTableLocator()->exists('SurgicalAntecedents') ? [] : ['className' => SurgicalAntecedentsTable::class];
        $this->SurgicalAntecedents = $this->getTableLocator()->get('SurgicalAntecedents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SurgicalAntecedents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SurgicalAntecedentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
