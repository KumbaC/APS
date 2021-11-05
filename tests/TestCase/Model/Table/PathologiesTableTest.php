<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PathologiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PathologiesTable Test Case
 */
class PathologiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PathologiesTable
     */
    protected $Pathologies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Pathologies',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pathologies') ? [] : ['className' => PathologiesTable::class];
        $this->Pathologies = $this->getTableLocator()->get('Pathologies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Pathologies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PathologiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
