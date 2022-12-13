<?php
declare(strict_types=1);

namespace App\Controller\Doctor;

use App\Controller\Doctor\AppController;

/**
 * Parasitologies Controller
 *
 * @property \App\Model\Table\ParasitologiesTable $Parasitologies
 * @method \App\Model\Entity\Parasitology[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParasitologiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $parasitologies = $this->paginate($this->Parasitologies);

        $this->set(compact('parasitologies'));
    }

    /**
     * View method
     *
     * @param string|null $id Parasitology id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parasitology = $this->Parasitologies->get($id, [
            'contain' => ['Laboratories'],
        ]);

        $this->set(compact('parasitology'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parasitology = $this->Parasitologies->newEmptyEntity();
        if ($this->request->is('post')) {
            $parasitology = $this->Parasitologies->patchEntity($parasitology, $this->request->getData());
            if ($this->Parasitologies->save($parasitology)) {
                $this->Flash->success(__('The parasitology has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parasitology could not be saved. Please, try again.'));
        }
        $laboratories = $this->Parasitologies->Laboratories->find('list', ['limit' => 200]);
        $this->set(compact('parasitology', 'laboratories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Parasitology id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parasitology = $this->Parasitologies->get($id, [
            'contain' => ['Laboratories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parasitology = $this->Parasitologies->patchEntity($parasitology, $this->request->getData());
            if ($this->Parasitologies->save($parasitology)) {
                $this->Flash->success(__('The parasitology has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parasitology could not be saved. Please, try again.'));
        }
        $laboratories = $this->Parasitologies->Laboratories->find('list', ['limit' => 200]);
        $this->set(compact('parasitology', 'laboratories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Parasitology id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parasitology = $this->Parasitologies->get($id);
        if ($this->Parasitologies->delete($parasitology)) {
            $this->Flash->success(__('The parasitology has been deleted.'));
        } else {
            $this->Flash->error(__('The parasitology could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function receive()
    {
        $parasitology = $this->Parasitologies->newEmptyEntity();
        $data = $this->request->getData();
        $data = $this->Parasitologies->patchEntity($parasitology, $data);

        $this->Parasitologies->save($data);

        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($parasitology));

            return $response;

    }
}
