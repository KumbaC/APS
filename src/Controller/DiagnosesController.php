<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Diagnoses Controller
 *
 * @property \App\Model\Table\DiagnosesTable $Diagnoses
 * @method \App\Model\Entity\Diagnosis[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiagnosesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $diagnoses = $this->paginate($this->Diagnoses);

        $this->set(compact('diagnoses'));
    }

    /**
     * View method
     *
     * @param string|null $id Diagnosis id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diagnosis = $this->Diagnoses->get($id, [
            'contain' => ['ClinicalHistories'],
        ]);

        $this->set(compact('diagnosis'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diagnosis = $this->Diagnoses->newEmptyEntity();
        if ($this->request->is('post')) {
            $diagnosis = $this->Diagnoses->patchEntity($diagnosis, $this->request->getData());
            if ($this->Diagnoses->save($diagnosis)) {
                $this->Flash->success(__('The diagnosis has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnosis could not be saved. Please, try again.'));
        }
        $clinicalHistories = $this->Diagnoses->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('diagnosis', 'clinicalHistories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Diagnosis id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diagnosis = $this->Diagnoses->get($id, [
            'contain' => ['ClinicalHistories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diagnosis = $this->Diagnoses->patchEntity($diagnosis, $this->request->getData());
            if ($this->Diagnoses->save($diagnosis)) {
                $this->Flash->success(__('The diagnosis has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnosis could not be saved. Please, try again.'));
        }
        $clinicalHistories = $this->Diagnoses->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('diagnosis', 'clinicalHistories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Diagnosis id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diagnosis = $this->Diagnoses->get($id);
        if ($this->Diagnoses->delete($diagnosis)) {
            $this->Flash->success(__('The diagnosis has been deleted.'));
        } else {
            $this->Flash->error(__('The diagnosis could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
