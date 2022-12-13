<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Hematologies Controller
 *
 * @property \App\Model\Table\HematologiesTable $Hematologies
 * @method \App\Model\Entity\Hematology[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HematologiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $hematologies = $this->paginate($this->Hematologies);

        $this->set(compact('hematologies'));
    }

    /**
     * View method
     *
     * @param string|null $id Hematology id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hematology = $this->Hematologies->get($id, [
            'contain' => ['Laboratories'],
        ]);

        $this->set(compact('hematology'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hematology = $this->Hematologies->newEmptyEntity();
        if ($this->request->is('post')) {
            $hematology = $this->Hematologies->patchEntity($hematology, $this->request->getData());
            if ($this->Hematologies->save($hematology)) {
                $this->Flash->success(__('The hematology has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hematology could not be saved. Please, try again.'));
        }
        $laboratories = $this->Hematologies->Laboratories->find('list', ['limit' => 200]);
        $this->set(compact('hematology', 'laboratories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hematology id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hematology = $this->Hematologies->get($id, [
            'contain' => ['Laboratories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hematology = $this->Hematologies->patchEntity($hematology, $this->request->getData());
            if ($this->Hematologies->save($hematology)) {
                $this->Flash->success(__('The hematology has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hematology could not be saved. Please, try again.'));
        }
        $laboratories = $this->Hematologies->Laboratories->find('list', ['limit' => 200]);
        $this->set(compact('hematology', 'laboratories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hematology id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hematology = $this->Hematologies->get($id);
        if ($this->Hematologies->delete($hematology)) {
            $this->Flash->success(__('The hematology has been deleted.'));
        } else {
            $this->Flash->error(__('The hematology could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function receive()
    {
        $hematologia = $this->Hematologies->newEmptyEntity();
        $data = $this->request->getData();
        $data = $this->Hematologies->patchEntity($hematologia, $data);

        $this->Hematologies->save($data);

        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($hematologia));

            return $response;

    }
}
