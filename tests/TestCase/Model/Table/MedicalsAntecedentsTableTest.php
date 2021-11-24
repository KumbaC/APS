<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedicalsAntecedentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedicalsAntecedentsTable Test Case
 */
class MedicalsAntecedentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MedicalsAntecedentsTable
     */
    protected $MedicalsAntecedents;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.MedicalsAntecedents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('MedicalsAntecedents') ? [] : ['className' => MedicalsAntecedentsTable::class];
        $this->MedicalsAntecedents = $this->getTableLocator()->get('MedicalsAntecedents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->MedicalsAntecedents);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MedicalsAntecedentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
