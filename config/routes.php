<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;



/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {



    $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    $builder->connect('/login', ['controller' => 'users', 'action' => 'login']);
    $builder->connect('/logout', ['controller' => 'users', 'action' => 'logout']);

    $builder->connect('/', ['controller' => 'pages', 'action' => 'display']);

    $builder->fallbacks();

});

// BENEFICIARIOS
$routes->scope('/beneficiarios', function (\Cake\Routing\RouteBuilder $routes) {
    $routes->setExtensions('pdf');
    $routes->connect('/view/*', ['controller' => 'Beneficiary', 'action' => 'view']);
    $routes->connect('/add', ['controller' => 'Beneficiary', 'action' => 'add']);
    $routes->connect('/edit/*', ['controller' => 'Beneficiary', 'action' => 'edit']);
    $routes->connect('/delete/*', ['controller' => 'Beneficiary', 'action' => 'delete']);
    //$routes->fallbacks('InflectedRoute');
});
// PERSONAS
$routes->scope('/titulares', function (\Cake\Routing\RouteBuilder $routes) {
    $routes->setExtensions('pdf');
    $routes->connect('/view/*', ['controller' => 'Persons', 'action' => 'view']);
    $routes->connect('/add', ['controller' => 'Persons', 'action' => 'add']);
    $routes->connect('/edit/*', ['controller' => 'Persons', 'action' => 'edit']);
    $routes->connect('/delete/*', ['controller' => 'Persons', 'action' => 'delete']);
   // $routes->fallbacks('InflectedRoute');
});





//ADMINISTRACIÓN


$routes->prefix('admin', function (RouteBuilder $routes) {

        $routes->connect('/', ['controller' => 'pages', 'action' => 'display']);
        $routes->connect('/login', ['controller' => 'users', 'action' => 'login']);
        $routes->connect('/logout', ['controller' => 'users', 'action' => 'logout']);
        $routes->fallbacks('InflectedRoute');






    $routes->scope('/doctores', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/', ['controller' => 'doctors', 'action' => 'index']);
        $routes->connect('/view/*', ['controller' => 'doctors', 'action' => 'view']);
        $routes->connect('/add', ['controller' => 'doctors', 'action' => 'add']);
        $routes->connect('/delete/*', ['controller' => 'doctors', 'action' => 'delete']);
        $routes->connect('/edit/*', ['controller' => 'doctors', 'action' => 'edit']);
        //$routes->connect('/register', ['controller' => 'Users', 'action' => 'register']);
        //$routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
        //$routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
        //$routes->fallbacks('InflectedRoute');
    });



    $routes->scope('/beneficiarios', function (\Cake\Routing\RouteBuilder $routes) {
        //$routes->setExtensions('pdf');
        $routes->connect('/view/*', ['controller' => 'Beneficiary', 'action' => 'view']);
        $routes->connect('/add', ['controller' => 'Beneficiary', 'action' => 'add']);
        $routes->connect('/', ['controller' => 'Beneficiary', 'action' => 'index']);
        $routes->connect('/edit/*', ['controller' => 'Beneficiary', 'action' => 'edit']);
        $routes->connect('/delete/*', ['controller' => 'Beneficiary', 'action' => 'delete']);
        //$routes->fallbacks('InflectedRoute');
    });

    $routes->scope('/titulares', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/view/*', ['controller' => 'Persons', 'action' => 'view']);
        $routes->connect('/add', ['controller' => 'Persons', 'action' => 'add']);
        $routes->connect('/edit/*', ['controller' => 'Persons', 'action' => 'edit']);
        $routes->connect('/', ['controller' => 'Persons', 'action' => 'index']);
        $routes->connect('/delete/*', ['controller' => 'Persons', 'action' => 'delete']);
        //$routes->fallbacks('InflectedRoute');
    });



    $routes->scope('/consultas', function (\Cake\Routing\RouteBuilder $routes) {
        //$routes->setExtensions('pdf');
        $routes->connect('/view/*', ['controller' => 'Quotes', 'action' => 'view']);
        $routes->connect('/add/*', ['controller' => 'Quotes', 'action' => 'add']);
        $routes->connect('/', ['controller' => 'Quotes', 'action' => 'index']);
        $routes->connect('/edit/*', ['controller' => 'Quotes', 'action' => 'edit']);
        $routes->connect('/delete/*', ['controller' => 'Quotes', 'action' => 'delete']);
        //$routes->fallbacks('InflectedRoute');
    });

    $routes->scope('/historia', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/view/*', ['controller' => 'ClinicalHistories', 'action' => 'view']);
        $routes->connect('/add/*', ['controller' => 'ClinicalHistories', 'action' => 'add']);
        $routes->connect('/addb/*', ['controller' => 'ClinicalHistories', 'action' => 'addb']);
        $routes->connect('/', ['controller' => 'ClinicalHistories', 'action' => 'index']);
        $routes->connect('/edit/*', ['controller' => 'ClinicalHistories', 'action' => 'edit']);
        $routes->connect('/delete/*', ['controller' => 'ClinicalHistories', 'action' => 'delete']);
        //$routes->fallbacks('InflectedRoute');
    });

    $routes->scope('/recipes', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/view/*', ['controller' => 'Prescriptions', 'action' => 'view']);
        $routes->connect('/add/*', ['controller' => 'Prescriptions', 'action' => 'add']);
        $routes->connect('/addb/*', ['controller' => 'Prescriptions', 'action' => 'addb']);
        $routes->connect('/', ['controller' => 'Prescriptions', 'action' => 'index']);
        $routes->connect('/edit/*', ['controller' => 'Prescriptions', 'action' => 'edit']);
        $routes->connect('/delete/*', ['controller' => 'Prescriptions', 'action' => 'delete']);
        //$routes->fallbacks('InflectedRoute');
    });




});
