<?php
declare(strict_types=1);

namespace App\Controller\Doctor;

use App\Controller\Doctor\AppController;


class PagesController extends AppController
{

    public function display()
    {
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');

         if ($session->read('Auth.User.role_id') == 3){


        }elseif ($session->read('Auth.User.role_id') == 4){


        }
        
        else{

            $this->Flash->error(__('No tienes acceso para entrar.'));
            $this->redirect(['controller' => 'UsersDoctors', 'action' => 'login']);
        }

    }

}
