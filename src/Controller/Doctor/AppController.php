<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller\Doctor;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');
        //$this->loadComponent('Authentication.Authentication');
    
    
//        if ($this->request->getParam('prefix')) {
  //          if ($this->request->getParam('prefix') == 'doctor') {
                $this->viewBuilder()->setLayout('doctor');
                //$this->loadComponent('Csrf');
                $this->loadComponent('Auth', [

		        'authenticate' => [
	                'Form' => [
	                    'fields' => ['username' => 'username', 'password' => 'password'],
	                    'userModel' => 'UsersDoctors',
	                ]
	            ],

                'loginAction' => [
                    'prefix' => 'doctor',
                    'controller' => 'UsersDoctors',
                    'action' => 'login'
                ],
                'loginRedirect' => [
                    'prefix' => 'doctor',
                    'controller' => 'pages',
                    'action' => 'display'
                ],
                'logoutRedirect' => [
                    'prefix' => 'doctor',
                    'controller' => 'UsersDoctors',
                    'action' => 'login'
                ],
                'unauthorizedRedirect' => [
                    'prefix' => 'doctor',
                    'controller' => 'UsersDoctors',
                    'action' => 'login'
                ],
                'authError' => '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Sesion expirada,</strong>  por favor inicie sesion nuevamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div> ',

                'flash' => [
                    'element' => 'Flash/error',
                    
                ],
                
                
                
              /*   'noAuthError' => [
                    'No tienes permiso para entrar a esta seccion',
                    'element' => 'Flash/error'
                ], */
                

                ]);
     
    }
     public function beforeFilter(\Cake\Event\EventInterface $event)
    {
            parent::beforeFilter($event);

            $this->Auth->allow('login', 'logout');

    }

    public function isAuthorized($user)
    {
        if ($this->request->getParam('prefix') === 'Doctor') {
            return $user->role_id == 3 && $user->role_id == 4 ;
        }
        else{
            return 'No tienes permiso para entrar a esta seccion';
        }

        return !empty($user);
    }



}
