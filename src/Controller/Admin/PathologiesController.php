<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Pathologies Controller
 *
 * @property \App\Model\Table\PathologiesTable $Pathologies
 * @method \App\Model\Entity\Pathology[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PathologiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $pathologies = $this->paginate($this->Pathologies);

        $this->set(compact('pathologies'));
    }

    /**
     * View method
     *
     * @param string|null $id Pathology id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pathology = $this->Pathologies->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('pathology'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pathology = $this->Pathologies->newEmptyEntity();
        if ($this->request->is('post')) {
            $pathology = $this->Pathologies->patchEntity($pathology, $this->request->getData());
            if ($this->Pathologies->save($pathology)) {
                $this->Flash->success(__('The pathology has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pathology could not be saved. Please, try again.'));
        }
        $this->set(compact('pathology'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pathology id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pathology = $this->Pathologies->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pathology = $this->Pathologies->patchEntity($pathology, $this->request->getData());
            if ($this->Pathologies->save($pathology)) {
                $this->Flash->success(__('The pathology has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pathology could not be saved. Please, try again.'));
        }
        $this->set(compact('pathology'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pathology id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pathology = $this->Pathologies->get($id);
        if ($this->Pathologies->delete($pathology)) {
            $this->Flash->success(__('The pathology has been deleted.'));
        } else {
            $this->Flash->error(__('The pathology could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
