<?php
declare(strict_types=1);

namespace App\Controller\Doctor;

use App\Controller\Doctor\AppController;

/**
 * Immunology Controller
 *
 * @property \App\Model\Table\ImmunologyTable $Immunology
 * @method \App\Model\Entity\Immunology[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImmunologyController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $immunology = $this->paginate($this->Immunology);

        $this->set(compact('immunology'));
    }

    /**
     * View method
     *
     * @param string|null $id Immunology id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $immunology = $this->Immunology->get($id, [
            'contain' => ['Laboratories'],
        ]);

        $this->set(compact('immunology'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $immunology = $this->Immunology->newEmptyEntity();
        if ($this->request->is('post')) {
            $immunology = $this->Immunology->patchEntity($immunology, $this->request->getData());
            if ($this->Immunology->save($immunology)) {
                $this->Flash->success(__('The immunology has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The immunology could not be saved. Please, try again.'));
        }
        $laboratories = $this->Immunology->Laboratories->find('list', ['limit' => 200]);
        $this->set(compact('immunology', 'laboratories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Immunology id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $immunology = $this->Immunology->get($id, [
            'contain' => ['Laboratories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $immunology = $this->Immunology->patchEntity($immunology, $this->request->getData());
            if ($this->Immunology->save($immunology)) {
                $this->Flash->success(__('The immunology has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The immunology could not be saved. Please, try again.'));
        }
        $laboratories = $this->Immunology->Laboratories->find('list', ['limit' => 200]);
        $this->set(compact('immunology', 'laboratories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Immunology id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $immunology = $this->Immunology->get($id);
        if ($this->Immunology->delete($immunology)) {
            $this->Flash->success(__('The immunology has been deleted.'));
        } else {
            $this->Flash->error(__('The immunology could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function receive()
    {
        $inmunologia = $this->Immunology->newEmptyEntity();
        $data = $this->request->getData();
        $data = $this->Immunology->patchEntity($inmunologia, $data);

        $this->Immunology->save($data);

        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($inmunologia));

            return $response;

    }
}
