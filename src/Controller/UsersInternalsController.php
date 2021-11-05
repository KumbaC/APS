<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * UsersInternals Controller
 *
 * @property \App\Model\Table\UsersInternalsTable $UsersInternals
 * @method \App\Model\Entity\UsersInternal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersInternalsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PublicWorkers', 'Roles'],
        ];
        $usersInternals = $this->paginate($this->UsersInternals);

        $this->set(compact('usersInternals'));
    }

    /**
     * View method
     *
     * @param string|null $id Users Internal id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersInternal = $this->UsersInternals->get($id, [
            'contain' => ['PublicWorkers', 'Roles'],
        ]);

        $this->set(compact('usersInternal'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersInternal = $this->UsersInternals->newEmptyEntity();
        if ($this->request->is('post')) {
            $usersInternal = $this->UsersInternals->patchEntity($usersInternal, $this->request->getData());
            if ($this->UsersInternals->save($usersInternal)) {
                $this->Flash->success(__('The users internal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users internal could not be saved. Please, try again.'));
        }
        $publicWorkers = $this->UsersInternals->PublicWorkers->find('list', ['limit' => 200]);
        $roles = $this->UsersInternals->Roles->find('list', ['limit' => 200]);
        $this->set(compact('usersInternal', 'publicWorkers', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Internal id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersInternal = $this->UsersInternals->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersInternal = $this->UsersInternals->patchEntity($usersInternal, $this->request->getData());
            if ($this->UsersInternals->save($usersInternal)) {
                $this->Flash->success(__('The users internal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users internal could not be saved. Please, try again.'));
        }
        $publicWorkers = $this->UsersInternals->PublicWorkers->find('list', ['limit' => 200]);
        $roles = $this->UsersInternals->Roles->find('list', ['limit' => 200]);
        $this->set(compact('usersInternal', 'publicWorkers', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Internal id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersInternal = $this->UsersInternals->get($id);
        if ($this->UsersInternals->delete($usersInternal)) {
            $this->Flash->success(__('The users internal has been deleted.'));
        } else {
            $this->Flash->error(__('The users internal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
