<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * UsersDoctors Controller
 *
 * @property \App\Model\Table\UsersDoctorsTable $UsersDoctors
 * @method \App\Model\Entity\UsersDoctor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersDoctorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles'],
        ];
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
            'contain' => ['Roles'],
        ]);

        $this->set(compact('usersDoctor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function registerDoctors()
    {
        $usersDoctor = $this->UsersDoctors->newEmptyEntity();
        if ($this->request->is('post')) {
            $usersDoctor = $this->UsersDoctors->patchEntity($usersDoctor, $this->request->getData());
            if ($this->UsersDoctors->save($usersDoctor)) {
                $this->Flash->success(__('The users doctor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users doctor could not be saved. Please, try again.'));
        }
        $roles = $this->UsersDoctors->Roles->find('list', ['limit' => 200]);
        $this->set(compact('usersDoctor', 'roles'));
    }

    public function registerSupport()
    {
        $usersDoctor = $this->UsersDoctors->newEmptyEntity();
        if ($this->request->is('post')) {
            $usersDoctor = $this->UsersDoctors->patchEntity($usersDoctor, $this->request->getData());
            if ($this->UsersDoctors->save($usersDoctor)) {
                $this->Flash->success(__('The users doctor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users doctor could not be saved. Please, try again.'));
        }
        $roles = $this->UsersDoctors->Roles->find('list', ['limit' => 200]);
        $this->set(compact('usersDoctor', 'roles'));
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
                $this->Flash->success(__('The users doctor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users doctor could not be saved. Please, try again.'));
        }
        $roles = $this->UsersDoctors->Roles->find('list', ['limit' => 200]);
        $this->set(compact('usersDoctor', 'roles'));
    }


    public function changePassword($id = null)
    {
        $usersDoctor = $this->UsersDoctors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersDoctor = $this->UsersDoctors->patchEntity($usersDoctor, $this->request->getData());
            if ($this->UsersDoctors->save($usersDoctor)) {
                $this->Flash->success(__('Cambio contraseña fue exitoso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo cambiar la contraseña, por favor intente mas tarde..'));
        }
        $roles = $this->UsersDoctors->Roles->find('list', ['limit' => 200]);
        $this->set(compact('usersDoctor', 'roles'));
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
            $this->Flash->success(__('The users doctor has been deleted.'));
        } else {
            $this->Flash->error(__('The users doctor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
