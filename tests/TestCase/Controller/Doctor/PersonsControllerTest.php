<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Doctor;

use App\Controller\Doctor\PersonsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Doctor\PersonsController Test Case
 *
 * @uses \App\Controller\Doctor\PersonsController
 */
class PersonsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Persons',
        'app.Departments',
        'app.Status',
        'app.Cargos',
        'app.Users',
        'app.Units',
        'app.Genders',
        'app.Beneficiary',
        'app.ClinicalHistories',
        'app.PublicWorkers',
        'app.Quotes',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\Doctor\PersonsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\Doctor\PersonsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\Doctor\PersonsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\Doctor\PersonsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\Doctor\PersonsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
