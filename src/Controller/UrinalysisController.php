<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Urinalysis Controller
 *
 * @property \App\Model\Table\UrinalysisTable $Urinalysis
 * @method \App\Model\Entity\Urinalysi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UrinalysisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $urinalysis = $this->paginate($this->Urinalysis);

        $this->set(compact('urinalysis'));
    }

    /**
     * View method
     *
     * @param string|null $id Urinalysi id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $urinalysi = $this->Urinalysis->get($id, [
            'contain' => ['Laboratories'],
        ]);

        $this->set(compact('urinalysi'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $urinalysi = $this->Urinalysis->newEmptyEntity();
        if ($this->request->is('post')) {
            $urinalysi = $this->Urinalysis->patchEntity($urinalysi, $this->request->getData());
            if ($this->Urinalysis->save($urinalysi)) {
                $this->Flash->success(__('The urinalysi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The urinalysi could not be saved. Please, try again.'));
        }
        $laboratories = $this->Urinalysis->Laboratories->find('list', ['limit' => 200]);
        $this->set(compact('urinalysi', 'laboratories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Urinalysi id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $urinalysi = $this->Urinalysis->get($id, [
            'contain' => ['Laboratories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $urinalysi = $this->Urinalysis->patchEntity($urinalysi, $this->request->getData());
            if ($this->Urinalysis->save($urinalysi)) {
                $this->Flash->success(__('The urinalysi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The urinalysi could not be saved. Please, try again.'));
        }
        $laboratories = $this->Urinalysis->Laboratories->find('list', ['limit' => 200]);
        $this->set(compact('urinalysi', 'laboratories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Urinalysi id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $urinalysi = $this->Urinalysis->get($id);
        if ($this->Urinalysis->delete($urinalysi)) {
            $this->Flash->success(__('The urinalysi has been deleted.'));
        } else {
            $this->Flash->error(__('The urinalysi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
