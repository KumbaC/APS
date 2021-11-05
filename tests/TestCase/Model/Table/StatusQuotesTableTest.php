<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatusQuotesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatusQuotesTable Test Case
 */
class StatusQuotesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StatusQuotesTable
     */
    protected $StatusQuotes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.StatusQuotes',
        'app.Quotes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StatusQuotes') ? [] : ['className' => StatusQuotesTable::class];
        $this->StatusQuotes = $this->getTableLocator()->get('StatusQuotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->StatusQuotes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StatusQuotesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
