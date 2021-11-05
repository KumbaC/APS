<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Kins Controller
 *
 * @property \App\Model\Table\KinsTable $Kins
 * @method \App\Model\Entity\Kin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KinsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $kins = $this->paginate($this->Kins);

        $this->set(compact('kins'));
    }

    /**
     * View method
     *
     * @param string|null $id Kin id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $kin = $this->Kins->get($id, [
            'contain' => ['Beneficiary'],
        ]);

        $this->set(compact('kin'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $kin = $this->Kins->newEmptyEntity();
        if ($this->request->is('post')) {
            $kin = $this->Kins->patchEntity($kin, $this->request->getData());
            if ($this->Kins->save($kin)) {
                $this->Flash->success(__('The kin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kin could not be saved. Please, try again.'));
        }
        $this->set(compact('kin'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Kin id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $kin = $this->Kins->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $kin = $this->Kins->patchEntity($kin, $this->request->getData());
            if ($this->Kins->save($kin)) {
                $this->Flash->success(__('The kin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kin could not be saved. Please, try again.'));
        }
        $this->set(compact('kin'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Kin id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $kin = $this->Kins->get($id);
        if ($this->Kins->delete($kin)) {
            $this->Flash->success(__('The kin has been deleted.'));
        } else {
            $this->Flash->error(__('The kin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
