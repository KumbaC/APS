<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HematologiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HematologiesTable Test Case
 */
class HematologiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HematologiesTable
     */
    protected $Hematologies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Hematologies',
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
        $config = $this->getTableLocator()->exists('Hematologies') ? [] : ['className' => HematologiesTable::class];
        $this->Hematologies = $this->getTableLocator()->get('Hematologies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Hematologies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HematologiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
