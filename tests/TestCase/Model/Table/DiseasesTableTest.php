<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiseasesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiseasesTable Test Case
 */
class DiseasesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiseasesTable
     */
    protected $Diseases;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Diseases',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Diseases') ? [] : ['className' => DiseasesTable::class];
        $this->Diseases = $this->getTableLocator()->get('Diseases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Diseases);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DiseasesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
