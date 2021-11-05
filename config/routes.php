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

/*
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 */
/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {
    /*
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, templates/Pages/home.php)...
     */
    $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    $builder->connect('/login', ['controller' => 'users', 'action' => 'login']);
    $builder->connect('/logout', ['controller' => 'users', 'action' => 'logout']);

    $builder->connect('/pages/*', 'Pages::display');

    $builder->fallbacks();

});

// EXTERNO
$routes->scope('/beneficiarios', function (\Cake\Routing\RouteBuilder $routes) {
    $routes->setExtensions('pdf');
    $routes->connect('/view/*', ['controller' => 'Beneficiary', 'action' => 'view']);
    $routes->connect('/add', ['controller' => 'Beneficiary', 'action' => 'add']);
    $routes->connect('/edit/*', ['controller' => 'Beneficiary', 'action' => 'edit']);
    $routes->connect('/delete/*', ['controller' => 'Beneficiary', 'action' => 'delete']);
    //$routes->fallbacks('InflectedRoute');
});

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
        $routes->setExtensions('pdf');
        $routes->connect('/view/*', ['controller' => 'Beneficiary', 'action' => 'view']);
        $routes->connect('/add', ['controller' => 'Beneficiary', 'action' => 'add']);
        $routes->connect('/edit/*', ['controller' => 'Beneficiary', 'action' => 'edit']);
        $routes->connect('/delete/*', ['controller' => 'Beneficiary', 'action' => 'delete']);
        //$routes->fallbacks('InflectedRoute');
    });

    $routes->scope('/titulares', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/view/*', ['controller' => 'Persons', 'action' => 'view']);
        $routes->connect('/add', ['controller' => 'Persons', 'action' => 'add']);
        $routes->connect('/edit/*', ['controller' => 'Persons', 'action' => 'edit']);
        $routes->connect('/delete/*', ['controller' => 'Persons', 'action' => 'delete']);
        //$routes->fallbacks('InflectedRoute');
    });




});
