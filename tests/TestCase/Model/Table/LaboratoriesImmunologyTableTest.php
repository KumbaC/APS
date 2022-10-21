<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LaboratoriesImmunologyTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LaboratoriesImmunologyTable Test Case
 */
class LaboratoriesImmunologyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LaboratoriesImmunologyTable
     */
    protected $LaboratoriesImmunology;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.LaboratoriesImmunology',
        'app.Laboratories',
        'app.Immunology',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LaboratoriesImmunology') ? [] : ['className' => LaboratoriesImmunologyTable::class];
        $this->LaboratoriesImmunology = $this->getTableLocator()->get('LaboratoriesImmunology', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LaboratoriesImmunology);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LaboratoriesImmunologyTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LaboratoriesImmunologyTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
