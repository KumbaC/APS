<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Diseases Controller
 *
 * @property \App\Model\Table\DiseasesTable $Diseases
 * @method \App\Model\Entity\Disease[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiseasesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $diseases = $this->paginate($this->Diseases);

        $this->set(compact('diseases'));
    }

    /**
     * View method
     *
     * @param string|null $id Disease id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $disease = $this->Diseases->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('disease'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $disease = $this->Diseases->newEmptyEntity();
        if ($this->request->is('post')) {
            $disease = $this->Diseases->patchEntity($disease, $this->request->getData());
            if ($this->Diseases->save($disease)) {
                $this->Flash->success(__('The disease has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disease could not be saved. Please, try again.'));
        }
        $this->set(compact('disease'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Disease id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disease = $this->Diseases->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disease = $this->Diseases->patchEntity($disease, $this->request->getData());
            if ($this->Diseases->save($disease)) {
                $this->Flash->success(__('The disease has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disease could not be saved. Please, try again.'));
        }
        $this->set(compact('disease'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Disease id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disease = $this->Diseases->get($id);
        if ($this->Diseases->delete($disease)) {
            $this->Flash->success(__('The disease has been deleted.'));
        } else {
            $this->Flash->error(__('The disease could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
