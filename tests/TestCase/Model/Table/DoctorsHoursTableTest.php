<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoctorsHoursTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoctorsHoursTable Test Case
 */
class DoctorsHoursTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DoctorsHoursTable
     */
    protected $DoctorsHours;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.DoctorsHours',
        'app.Doctors',
        'app.Hours',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DoctorsHours') ? [] : ['className' => DoctorsHoursTable::class];
        $this->DoctorsHours = $this->getTableLocator()->get('DoctorsHours', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->DoctorsHours);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DoctorsHoursTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DoctorsHoursTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
