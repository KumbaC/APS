<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LaboratoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LaboratoriesTable Test Case
 */
class LaboratoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LaboratoriesTable
     */
    protected $Laboratories;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Laboratories',
        'app.ClinicalHistories',
        'app.Biochemistry',
        'app.Hematologies',
        'app.Immunology',
        'app.Parasitologies',
        'app.Specials',
        'app.Urinalysis',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Laboratories') ? [] : ['className' => LaboratoriesTable::class];
        $this->Laboratories = $this->getTableLocator()->get('Laboratories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Laboratories);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LaboratoriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LaboratoriesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
