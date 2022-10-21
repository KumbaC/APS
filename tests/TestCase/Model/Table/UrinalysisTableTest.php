<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UrinalysisTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UrinalysisTable Test Case
 */
class UrinalysisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UrinalysisTable
     */
    protected $Urinalysis;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Urinalysis',
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
        $config = $this->getTableLocator()->exists('Urinalysis') ? [] : ['className' => UrinalysisTable::class];
        $this->Urinalysis = $this->getTableLocator()->get('Urinalysis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Urinalysis);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UrinalysisTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
