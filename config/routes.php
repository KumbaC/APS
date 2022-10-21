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

    $builder->connect('/ingresar', ['controller' => 'users', 'action' => 'login']);
    $builder->connect('/salir', ['controller' => 'users', 'action' => 'logout']);

    $builder->connect('/', ['controller' => 'pages', 'action' => 'display']);

    $builder->fallbacks();

});

// BENEFICIARIOS
$routes->scope('/beneficiarios', function (\Cake\Routing\RouteBuilder $routes) {
    // $routes->setExtensions('pdf');
     $routes->connect('/ver/*', ['controller' => 'Beneficiary', 'action' => 'view']);
     $routes->connect('/', ['controller' => 'Beneficiary', 'action' => 'index']);
    //$routes->connect('/add', ['controller' => 'Beneficiary', 'action' => 'add']);
    //$routes->connect('/edit/*', ['controller' => 'Beneficiary', 'action' => 'edit']);
    //$routes->connect('/delete/*', ['controller' => 'Beneficiary', 'action' => 'delete']);
    //$routes->fallbacks('InflectedRoute');
});
// PERSONAS
$routes->scope('/titulares', function (\Cake\Routing\RouteBuilder $routes) {
    $routes->setExtensions('pdf');
    $routes->connect('/imprimir/*', ['controller' => 'Persons', 'action' => 'view']);
    $routes->connect('/', ['controller' => 'Persons', 'action' => 'index']);
    //$routes->connect('/add', ['controller' => 'Persons', 'action' => 'add']);
    //$routes->connect('/edit/*', ['controller' => 'Persons', 'action' => 'edit']);
    //$routes->connect('/delete/*', ['controller' => 'Persons', 'action' => 'delete']);
   // $routes->fallbacks('InflectedRoute');
});

// CONSULTAS
$routes->scope('/consultas', function (\Cake\Routing\RouteBuilder $routes) {
    //$routes->setExtensions('pdf');
    $routes->connect('/', ['controller' => 'Quotes', 'action' => 'indexmi']);
    $routes->connect('/beneficiarios', ['controller' => 'Quotes', 'action' => 'index']);
    $routes->connect('/crear_beneficiarios', ['controller' => 'Quotes', 'action' => 'addb']);
    $routes->connect('/crear', ['controller' => 'Quotes', 'action' => 'add']);
    //$routes->connect('/add', ['controller' => 'Persons', 'action' => 'add']);
    //$routes->connect('/edit/*', ['controller' => 'Persons', 'action' => 'edit']);
    //$routes->connect('/delete/*', ['controller' => 'Persons', 'action' => 'delete']);
   // $routes->fallbacks('InflectedRoute');
});




//ADMINISTRADOR


$routes->prefix('admin', function (RouteBuilder $routes) {

        $routes->connect('/', ['controller' => 'pages', 'action' => 'display']);
        $routes->connect('/ingresar', ['controller' => 'users', 'action' => 'login']);
        $routes->connect('/salir', ['controller' => 'users', 'action' => 'logout']);
        $routes->fallbacks('InflectedRoute');






    $routes->scope('/doctores', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/', ['controller' => 'doctors', 'action' => 'index']);
        //$routes->connect('/view/*', ['controller' => 'doctors', 'action' => 'view']);
        $routes->connect('/crear', ['controller' => 'doctors', 'action' => 'add']);
        $routes->connect('/delete/*', ['controller' => 'doctors', 'action' => 'delete']);
        $routes->connect('/editar/*', ['controller' => 'doctors', 'action' => 'edit']);
        //$routes->connect('/register', ['controller' => 'Users', 'action' => 'register']);
        //$routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
        //$routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
        //$routes->fallbacks('InflectedRoute');
    });

    $routes->scope('/registro_doctor', function (\Cake\Routing\RouteBuilder $routes) {
        //$routes->setExtensions('pdf');
        $routes->connect('/', ['controller' => 'UsersDoctors', 'action' => 'index']);
        $routes->connect('/crear', ['controller' => 'UsersDoctors', 'action' => 'add']);
        $routes->connect('/delete/*', ['controller' => 'UsersDoctors', 'action' => 'delete']);
        $routes->connect('/editar/*', ['controller' => 'UsersDoctors', 'action' => 'edit']);

    });


    $routes->scope('/beneficiarios', function (\Cake\Routing\RouteBuilder $routes) {
        //$routes->setExtensions('pdf');
        $routes->connect('/view/*', ['controller' => 'Beneficiary', 'action' => 'view']);
        $routes->connect('/crear/*', ['controller' => 'Beneficiary', 'action' => 'add']);
        $routes->connect('/', ['controller' => 'Beneficiary', 'action' => 'index']);
        $routes->connect('/editar/*', ['controller' => 'Beneficiary', 'action' => 'edit']);
        $routes->connect('/delete/*', ['controller' => 'Beneficiary', 'action' => 'delete']);
        //$routes->fallbacks('InflectedRoute');
    });

    $routes->scope('/titulares', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/imprimir/*', ['controller' => 'Persons', 'action' => 'view']);
        $routes->connect('/crear', ['controller' => 'Persons', 'action' => 'add']);
        $routes->connect('/editar/*', ['controller' => 'Persons', 'action' => 'edit']);
        $routes->connect('/', ['controller' => 'Persons', 'action' => 'index']);
        $routes->connect('/delete/*', ['controller' => 'Persons', 'action' => 'delete']);
        //$routes->fallbacks('InflectedRoute');
    });



    $routes->scope('/consultas', function (\Cake\Routing\RouteBuilder $routes) {
        //$routes->setExtensions('pdf');
        $routes->connect('/ver/*', ['controller' => 'Quotes', 'action' => 'view']);
        $routes->connect('/crear/*', ['controller' => 'Quotes', 'action' => 'add']);
        $routes->connect('/', ['controller' => 'Quotes', 'action' => 'index']);
        $routes->connect('/editar/*', ['controller' => 'Quotes', 'action' => 'edit']);
        $routes->connect('/estatus/*', ['controller' => 'Quotes', 'action' => 'status']);
        $routes->connect('/eliminar/*', ['controller' => 'Quotes', 'action' => 'delete']);

        //$routes->fallbacks('InflectedRoute');
    });

    $routes->scope('/informe', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/imprimir/*', ['controller' => 'ClinicalHistories', 'action' => 'view']);
        $routes->connect('/crear/*', ['controller' => 'ClinicalHistories', 'action' => 'add']);
        $routes->connect('/crear_beneficiario/*', ['controller' => 'ClinicalHistories', 'action' => 'addb']);
        $routes->connect('/', ['controller' => 'ClinicalHistories', 'action' => 'index']);
        $routes->connect('/editar/*', ['controller' => 'ClinicalHistories', 'action' => 'edit']);
        $routes->connect('/eliminar/*', ['controller' => 'ClinicalHistories', 'action' => 'delete']);
        //$routes->fallbacks('InflectedRoute');
    });

    $routes->scope('/recipes', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/view/*', ['controller' => 'Prescriptions', 'action' => 'view']);
        $routes->connect('/add/*', ['controller' => 'Prescriptions', 'action' => 'add']);
        $routes->connect('/addb/*', ['controller' => 'Prescriptions', 'action' => 'addb']);
        $routes->connect('/', ['controller' => 'Prescriptions', 'action' => 'index']);
        $routes->connect('/editar/*', ['controller' => 'Prescriptions', 'action' => 'edit']);
        $routes->connect('/delete/*', ['controller' => 'Prescriptions', 'action' => 'delete']);
        //$routes->fallbacks('InflectedRoute');
    });


    $routes->scope('/diagnostico', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/', ['controller' => 'diagnoses', 'action' => 'index']);
        //$routes->connect('/view/*', ['controller' => 'doctors', 'action' => 'view']);
        $routes->connect('/crear', ['controller' => 'diagnoses', 'action' => 'add']);
        $routes->connect('/eliminar/*', ['controller' => 'diagnoses', 'action' => 'delete']);
        $routes->connect('/editar/*', ['controller' => 'diagnoses', 'action' => 'edit']);
        //$routes->connect('/register', ['controller' => 'Users', 'action' => 'register']);
        //$routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
        //$routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
        //$routes->fallbacks('InflectedRoute');
    });

    $routes->scope('/habitos', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/', ['controller' => 'habits', 'action' => 'index']);
        //$routes->connect('/view/*', ['controller' => 'doctors', 'action' => 'view']);
        $routes->connect('/crear', ['controller' => 'habits', 'action' => 'add']);
        $routes->connect('/delete/*', ['controller' => 'habits', 'action' => 'delete']);
        $routes->connect('/editar/*', ['controller' => 'habits', 'action' => 'edit']);

    });

    $routes->scope('/recipe', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/', ['controller' => 'Preescriptions', 'action' => 'index']);
        $routes->connect('/imprimir/*', ['controller' => 'Preescriptions', 'action' => 'view']);
        $routes->connect('/crear', ['controller' => 'Preescriptions', 'action' => 'add']);
        $routes->connect('/delete/*', ['controller' => 'Preescriptions', 'action' => 'delete']);
        $routes->connect('/editar/*', ['controller' => 'Preescriptions', 'action' => 'edit']);

    });

    $routes->scope('/antecedentes_medicos', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/', ['controller' => 'MedicalsAntecedents', 'action' => 'index']);
        //$routes->connect('/view/*', ['controller' => 'doctors', 'action' => 'view']);
        $routes->connect('/crear', ['controller' => 'MedicalsAntecedents', 'action' => 'add']);
        $routes->connect('/delete/*', ['controller' => 'MedicalsAntecedents', 'action' => 'delete']);
        $routes->connect('/editar/*', ['controller' => 'MedicalsAntecedents', 'action' => 'edit']);
        //$routes->connect('/register', ['controller' => 'Users', 'action' => 'register']);
        //$routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
        //$routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
        //$routes->fallbacks('InflectedRoute');
    });
    $routes->scope('/laboratorio', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/', ['controller' => 'Laboratories', 'action' => 'index']);
        $routes->connect('/crear', ['controller' => 'Laboratories', 'action' => 'add']);
        $routes->connect('/eliminar/*', ['controller' => 'Laboratories', 'action' => 'delete']);
        $routes->connect('/editar/*', ['controller' => 'Laboratories', 'action' => 'edit']);
        $routes->connect('/imprimir/*', ['controller' => 'Laboratories', 'action' => 'view']);
        //$routes->connect('/register', ['controller' => 'Users', 'action' => 'register']);
        //$routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
        //$routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
        //$routes->fallbacks('InflectedRoute');
    });


});

//DOCTOR


$routes->prefix('doctor', function (RouteBuilder $routes) {

    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'prefix' => 'doctor']);
    $routes->connect('/ingresar', ['controller' => 'UsersDoctors', 'action' => 'login', 'prefix' => 'doctor']);
    $routes->connect('/salir', ['controller' => 'UsersDoctors', 'action' => 'logout', 'prefix' => 'doctor']);
    $routes->fallbacks('InflectedRoute');


    $routes->scope('/doctores', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/', ['controller' => 'doctors', 'action' => 'index', 'prefix' => 'doctor']);
        $routes->connect('/crear', ['controller' => 'doctors', 'action' => 'add', 'prefix' => 'doctor']);
        $routes->connect('/delete/*', ['controller' => 'doctors', 'action' => 'delete', 'prefix' => 'doctor']);
        $routes->connect('/editar/*', ['controller' => 'doctors', 'action' => 'edit', 'prefix' => 'doctor']);
        
    });

    $routes->scope('/consultas', function (\Cake\Routing\RouteBuilder $routes) {
        //$routes->setExtensions('pdf');
        $routes->connect('/ver/*', ['controller' => 'Quotes', 'action' => 'view']);
        $routes->connect('/crear/*', ['controller' => 'Quotes', 'action' => 'add']);
        $routes->connect('/', ['controller' => 'Quotes', 'action' => 'index']);
        $routes->connect('/editar/*', ['controller' => 'Quotes', 'action' => 'edit']);
        $routes->connect('/estatus/*', ['controller' => 'Quotes', 'action' => 'status']);
        $routes->connect('/eliminar/*', ['controller' => 'Quotes', 'action' => 'delete']);

        //$routes->fallbacks('InflectedRoute');
    });

    $routes->scope('/informe', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/imprimir/*', ['controller' => 'ClinicalHistories', 'action' => 'view']);
        $routes->connect('/crear/*', ['controller' => 'ClinicalHistories', 'action' => 'add']);
        $routes->connect('/crear_beneficiario/*', ['controller' => 'ClinicalHistories', 'action' => 'addb']);
        $routes->connect('/', ['controller' => 'ClinicalHistories', 'action' => 'index']);
        $routes->connect('/editar/*', ['controller' => 'ClinicalHistories', 'action' => 'edit']);
        $routes->connect('/eliminar/*', ['controller' => 'ClinicalHistories', 'action' => 'delete']);
        //$routes->fallbacks('InflectedRoute');
    });

    $routes->scope('/laboratorio', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/', ['controller' => 'Laboratories', 'action' => 'index']);
        $routes->connect('/crear', ['controller' => 'Laboratories', 'action' => 'add']);
        $routes->connect('/eliminar/*', ['controller' => 'Laboratories', 'action' => 'delete']);
        $routes->connect('/editar/*', ['controller' => 'Laboratories', 'action' => 'edit']);
        $routes->connect('/imprimir/*', ['controller' => 'Laboratories', 'action' => 'view']);
        
    });

    $routes->scope('/recipe', function (\Cake\Routing\RouteBuilder $routes) {
        $routes->setExtensions('pdf');
        $routes->connect('/', ['controller' => 'Preescriptions', 'action' => 'index', 'prefix' => 'doctor']);
        $routes->connect('/imprimir/*', ['controller' => 'Preescriptions', 'action' => 'view', 'prefix' => 'doctor']);
        $routes->connect('/crear', ['controller' => 'Preescriptions', 'action' => 'add', 'prefix' => 'doctor']);
        $routes->connect('/delete/*', ['controller' => 'Preescriptions', 'action' => 'delete', 'prefix' => 'doctor']);
        $routes->connect('/editar/*', ['controller' => 'Preescriptions', 'action' => 'edit', 'prefix' => 'doctor']);

    });




});