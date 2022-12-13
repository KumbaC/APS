<?php
declare(strict_types=1);

namespace App\Controller\Doctor;
use App\Controller\Doctor\AppController;

/**
 * UsersDoctors Controller
 *
 * @method \App\Model\Entity\UsersDoctor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersDoctorsController extends AppController
{

  /*   public function beforeFilter(\Cake\Event\EventInterface $event)
    {
            parent::beforeFilter($event);

            $this->Auth->allow('login', 'logout');

    } */


    public function login()
    {
        
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl('/doctor'));
            }

            // Flash Usuario no definido..
            $this->Flash->error('Tu usuario o contraseña no son correctos');
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    
    public function index()
    {
        $usersDoctors = $this->paginate($this->UsersDoctors);

        $this->set(compact('usersDoctors'));
    }

    /**
     * View method
     *
     * @param string|null $id Users Doctor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersDoctor = $this->UsersDoctors->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('usersDoctor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersDoctor = $this->UsersDoctors->newEmptyEntity();
        if ($this->request->is('post')) {
            $usersDoctor = $this->UsersDoctors->patchEntity($usersDoctor, $this->request->getData());
            if ($this->UsersDoctors->save($usersDoctor)) {
                $this->Flash->success(__('Usuario creado correctamente'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El usuario no se ha podido crear. Inténtelo de nuevo'));
        }
        $this->set(compact('usersDoctor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Doctor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersDoctor = $this->UsersDoctors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersDoctor = $this->UsersDoctors->patchEntity($usersDoctor, $this->request->getData());
            if ($this->UsersDoctors->save($usersDoctor)) {
                $this->Flash->success(__('El usuario se ha actualizado correctamente'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El usuario no se ha podido actualizar. Inténtelo de nuevo'));
        }
        $this->set(compact('usersDoctor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Doctor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersDoctor = $this->UsersDoctors->get($id);
        if ($this->UsersDoctors->delete($usersDoctor)) {
            $this->Flash->success(__('El usuario se ha eliminado correctamente'));
        } else {
            $this->Flash->error(__('El usuario no se ha podido eliminar. Inténtelo de nuevo'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
