<?php
declare(strict_types=1);

namespace App\Controller;
//use Cake\Http\Session;
/* use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Auth; */
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');

    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
   // public function beforeFilter(\Cake\Event\EventInterface $event)
//{
    //parent::beforeFilter($event);
    // Configure the login action to not require authentication, preventing
    // the infinite redirect loop issue
   // $this->Authentication->addUnauthenticatedActions(['login']);
//}

 public function login()
{
    //$this->request->allowMethod(['get', 'post']);
    if ($this->request->is('post')){
        $user = $this->Auth->identify();
        if ($user) {
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        }

        // Flash Usuario no definido..
        $this->Flash->error('Tu usuario o contraseña no son correctos');
        //$this->Authorization->skipAuthorization();
    }


}

public function logout()
{
    return $this->redirect($this->Auth->logout());
    //$this->Authorization->skipAuthorization();
}

public function register()
{
    $user = $this->Users->newEntity($this->request->getData());
    $user->role_id = 2;
    if ($this->Users->save($user)) {
        $this->Auth->setUser($user->toArray());
        return $this->redirect([
            'controller' => 'Persons',
            'action' => 'index'
        ]);
    }
    $persons = $this->Users->Persons->find('list', ['limit' => 200]);
    $roles = $this->Users->Roles->find('list', ['limit' => 200]);

    $this->set(compact('persons', 'roles'));
}


    public function index()
    {
        $this->paginate = [
            'contain' => ['Persons', 'Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'), $this->paginate($this->Users));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Persons', 'Roles'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $persons = $this->Users->Persons->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'persons', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario ha sido actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El usuario no ha sido actualizado, intente mas tarde.'));
        }
        $persons = $this->Users->Persons->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'persons', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El usuario ha sido eliminado.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
