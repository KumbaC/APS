<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImmunologyTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImmunologyTable Test Case
 */
class ImmunologyTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImmunologyTable
     */
    protected $Immunology;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Immunology',
        'app.Laboratories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Immunology') ? [] : ['className' => ImmunologyTable::class];
        $this->Immunology = $this->getTableLocator()->get('Immunology', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Immunology);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ImmunologyTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
