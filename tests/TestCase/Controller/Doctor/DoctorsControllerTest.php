<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Doctor;

use App\Controller\Doctor\DoctorsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Doctor\DoctorsController Test Case
 *
 * @uses \App\Controller\Doctor\DoctorsController
 */
class DoctorsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Doctors',
        'app.Specialties',
        'app.Users',
        'app.ClinicalHistories',
        'app.Prescriptions',
        'app.Quotes',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\Doctor\DoctorsController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\Doctor\DoctorsController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\Doctor\DoctorsController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\Doctor\DoctorsController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\Doctor\DoctorsController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
