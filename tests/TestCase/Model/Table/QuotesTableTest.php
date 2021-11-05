<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuotesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuotesTable Test Case
 */
class QuotesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuotesTable
     */
    protected $Quotes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Quotes',
        'app.Persons',
        'app.Beneficiary',
        'app.Specialties',
        'app.Status',
        'app.Diseases',
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
        $config = $this->getTableLocator()->exists('Quotes') ? [] : ['className' => QuotesTable::class];
        $this->Quotes = $this->getTableLocator()->get('Quotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Quotes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\QuotesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\QuotesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
