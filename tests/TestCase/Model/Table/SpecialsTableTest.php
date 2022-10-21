<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpecialsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpecialsTable Test Case
 */
class SpecialsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SpecialsTable
     */
    protected $Specials;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Specials',
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
        $config = $this->getTableLocator()->exists('Specials') ? [] : ['className' => SpecialsTable::class];
        $this->Specials = $this->getTableLocator()->get('Specials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Specials);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SpecialsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
