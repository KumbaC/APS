<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PublicWorkers Controller
 *
 * @property \App\Model\Table\PublicWorkersTable $PublicWorkers
 * @method \App\Model\Entity\PublicWorker[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PublicWorkersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['People'],
        ];
        $publicWorkers = $this->paginate($this->PublicWorkers);

        $this->set(compact('publicWorkers'));
    }

    /**
     * View method
     *
     * @param string|null $id Public Worker id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $publicWorker = $this->PublicWorkers->get($id, [
            'contain' => ['People', 'UsersInternals'],
        ]);

        $this->set(compact('publicWorker'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $publicWorker = $this->PublicWorkers->newEmptyEntity();
        if ($this->request->is('post')) {
            $publicWorker = $this->PublicWorkers->patchEntity($publicWorker, $this->request->getData());
            if ($this->PublicWorkers->save($publicWorker)) {
                $this->Flash->success(__('The public worker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The public worker could not be saved. Please, try again.'));
        }
        $people = $this->PublicWorkers->People->find('list', ['limit' => 200]);
        $this->set(compact('publicWorker', 'people'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Public Worker id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $publicWorker = $this->PublicWorkers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $publicWorker = $this->PublicWorkers->patchEntity($publicWorker, $this->request->getData());
            if ($this->PublicWorkers->save($publicWorker)) {
                $this->Flash->success(__('The public worker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The public worker could not be saved. Please, try again.'));
        }
        $people = $this->PublicWorkers->People->find('list', ['limit' => 200]);
        $this->set(compact('publicWorker', 'people'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Public Worker id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $publicWorker = $this->PublicWorkers->get($id);
        if ($this->PublicWorkers->delete($publicWorker)) {
            $this->Flash->success(__('The public worker has been deleted.'));
        } else {
            $this->Flash->error(__('The public worker could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
