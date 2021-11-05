<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GendersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GendersTable Test Case
 */
class GendersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GendersTable
     */
    protected $Genders;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Genders',
        'app.Beneficiary',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Genders') ? [] : ['className' => GendersTable::class];
        $this->Genders = $this->getTableLocator()->get('Genders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Genders);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\GendersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
