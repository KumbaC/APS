<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParasitologiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParasitologiesTable Test Case
 */
class ParasitologiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ParasitologiesTable
     */
    protected $Parasitologies;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Parasitologies',
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
        $config = $this->getTableLocator()->exists('Parasitologies') ? [] : ['className' => ParasitologiesTable::class];
        $this->Parasitologies = $this->getTableLocator()->get('Parasitologies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Parasitologies);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ParasitologiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
