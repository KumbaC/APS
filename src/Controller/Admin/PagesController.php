<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;


class PagesController extends AppController
{





    public function display()
    {
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');

         if ($session->read('Auth.User.role_id') == 1 or $session->read('Auth.User.role_id') == 3 ){


        }else{

            $this->Flash->error(__('No tienes acceso para entrar.'));
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

    }

}
