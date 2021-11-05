<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KinTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KinTable Test Case
 */
class KinTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KinTable
     */
    protected $Kin;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Kin',
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
        $config = $this->getTableLocator()->exists('Kin') ? [] : ['className' => KinTable::class];
        $this->Kin = $this->getTableLocator()->get('Kin', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Kin);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\KinTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
