<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Prescriptions Controller
 *
 * @property \App\Model\Table\PrescriptionsTable $Prescriptions
 * @method \App\Model\Entity\Prescription[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrescriptionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Persons', 'Beneficiary', 'Doctors', 'Quotes', 'ClinicalHistories'],
        ];
        $prescriptions = $this->paginate($this->Prescriptions);

        $this->set(compact('prescriptions'));
    }

    /**
     * View method
     *
     * @param string|null $id Prescription id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prescription = $this->Prescriptions->get($id, [
            'contain' => ['Persons', 'Beneficiary', 'Doctors', 'Quotes', 'ClinicalHistories'],
        ]);

        $this->set(compact('prescription'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $prescription = $this->Prescriptions->newEmptyEntity();
        if ($this->request->is('post')) {
            $prescription = $this->Prescriptions->patchEntity($prescription, $this->request->getData());

            $prescription->person_id = $id;

            if ($this->Prescriptions->save($prescription)) {
                $this->Flash->success(__('The prescription has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prescription could not be saved. Please, try again.'));
        }


        $persons = $this->Prescriptions->Persons->find('list', ['limit' => 200]);
        $beneficiary = $this->Prescriptions->Beneficiary->find('list', ['limit' => 200]);
        $doctors = $this->Prescriptions->Doctors->find('list', ['limit' => 200]);
        $quotes = $this->Prescriptions->Quotes->find('list', ['limit' => 200]);
        $clinicalHistories = $this->Prescriptions->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('prescription', 'persons', 'beneficiary', 'doctors', 'quotes', 'clinicalHistories'));
    }

    public function addb($id = null)
    {
        $prescription = $this->Prescriptions->newEmptyEntity();
        if ($this->request->is('post')) {
            $prescription = $this->Prescriptions->patchEntity($prescription, $this->request->getData());

            $prescription->beneficiary_id = $id;

            if ($this->Prescriptions->save($prescription)) {
                $this->Flash->success(__('The prescription has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prescription could not be saved. Please, try again.'));
        }


        $persons = $this->Prescriptions->Persons->find('list', ['limit' => 200]);
        $beneficiary = $this->Prescriptions->Beneficiary->find('list', ['limit' => 200]);
        $doctors = $this->Prescriptions->Doctors->find('list', ['limit' => 200]);
        $quotes = $this->Prescriptions->Quotes->find('list', ['limit' => 200]);
        $clinicalHistories = $this->Prescriptions->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('prescription', 'persons', 'beneficiary', 'doctors', 'quotes', 'clinicalHistories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Prescription id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prescription = $this->Prescriptions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prescription = $this->Prescriptions->patchEntity($prescription, $this->request->getData());
            if ($this->Prescriptions->save($prescription)) {
                $this->Flash->success(__('The prescription has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The prescription could not be saved. Please, try again.'));
        }
        $persons = $this->Prescriptions->Persons->find('list', ['limit' => 200]);
        $beneficiary = $this->Prescriptions->Beneficiary->find('list', ['limit' => 200]);
        $doctors = $this->Prescriptions->Doctors->find('list', ['limit' => 200]);
        $quotes = $this->Prescriptions->Quotes->find('list', ['limit' => 200]);
        $clinicalHistories = $this->Prescriptions->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('prescription', 'persons', 'beneficiary', 'doctors', 'quotes', 'clinicalHistories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Prescription id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prescription = $this->Prescriptions->get($id);
        if ($this->Prescriptions->delete($prescription)) {
            $this->Flash->success(__('The prescription has been deleted.'));
        } else {
            $this->Flash->error(__('The prescription could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
