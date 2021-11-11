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

namespace App\Controller\Admin;

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
        //$this->loadComponent('Cookie');
        //$this->loadComponent('DataTables');
        //$this->loadComponent('SessionHandle');
        //$this->loadComponent('Acl', ['className' => 'Acl.Acl']);

        if ($this->request->getParam('prefix')) {
            if ($this->request->getParam('prefix') == 'admin') {
                $this->viewBuilder()->setLayout('admin');
                $this->loadComponent('Csrf');
                $this->loadComponent('Auth', [
                    'authorize' => 'Controller',
                    'loginAction' => [
                        'prefix' => 'admin',
                        'controller' => 'Users',
                        'action' => 'login'
                    ],
                    'loginRedirect' => [
                        'prefix' => 'admin',
                        'controller' => 'users',
                        'action' => 'index'
                    ],
                    'logoutRedirect' => [
                        'prefix' => 'admin',
                        'controller' => 'users',
                        'action' => 'login'
                    ],
                    'unauthorizedRedirect' => [
                        'prefix' => 'admin',
                        'controller' => 'users',
                        'action' => 'login'
                    ],
                    /* 'flash' => [
                        'element' => 'Flash/error',
                    ], */
                    'authError' => '',
                    'authenticate' => [
                        'Ldap' => [
                            'fields' => [
                                'username' => 'username',
                                'password' => 'password'
                            ],
                            'finder' => 'auth'

                        ]
                    ]
                ]);
            }
        }

    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
            parent::beforeFilter($event);


            $this->Auth->allow('login', 'logout');

    }

    public function isAuthorized($user)
    {
        if ($this->request->getParam('prefix') === 'Admin') {
            return $user->role_id == 1;
        }
        return !empty($user);
    }



}
