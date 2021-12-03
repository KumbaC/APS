<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * ClinicalHistories Controller
 *
 * @property \App\Model\Table\ClinicalHistoriesTable $ClinicalHistories
 * @method \App\Model\Entity\ClinicalHistory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClinicalHistoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Persons', 'Beneficiary', 'BloodTypes', 'Doctors'],
        ];
        $clinicalHistories = $this->paginate($this->ClinicalHistories);

        $this->set(compact('clinicalHistories'));
    }

    /**
     * View method
     *
     * @param string|null $id Clinical History id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clinicalHistory = $this->ClinicalHistories->get($id, [
            'contain' => ['Persons'=>['Genders'], 'Beneficiary'=>['Genders'], 'BloodTypes', 'Doctors', 'Diagnoses', 'Habits', 'MedicalsAntecedents'],
        ]);

        $this->set(compact('clinicalHistory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id, $idDoctor = null)

    {
        $clinicalHistory = $this->ClinicalHistories->newEmptyEntity();
        if ($this->request->is('post')) {
            $clinicalHistory = $this->ClinicalHistories->patchEntity($clinicalHistory, $this->request->getData());

            $clinicalHistory->person_id = $id;

            $clinicalHistory->doctor_id = $idDoctor;

            if ($this->ClinicalHistories->save($clinicalHistory)) {
                $this->Flash->success(__('La historia clinica fue guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clinical history could not be saved. Please, try again.'));
        }
        $persons = $this->ClinicalHistories->Persons->find('list', ['limit' => 200]);
        $beneficiary = $this->ClinicalHistories->Beneficiary->find('list', ['limit' => 200]);
        $bloodTypes = $this->ClinicalHistories->BloodTypes->find('list', ['limit' => 200]);
        $doctors = $this->ClinicalHistories->Doctors->find('list', ['limit' => 200]);
        $diagnoses = $this->ClinicalHistories->Diagnoses->find('list');
        $habits = $this->ClinicalHistories->Habits->find('list', ['limit' => 200]);
        $medicalsAntecedents = $this->ClinicalHistories->MedicalsAntecedents->find('list');
        $this->set(compact('clinicalHistory', 'persons', 'beneficiary', 'bloodTypes', 'doctors', 'diagnoses', 'habits', 'medicalsAntecedents'));
    }

    public function addb($id, $idDoctor = null)

    {
        $clinicalHistory = $this->ClinicalHistories->newEmptyEntity();
        if ($this->request->is('post')) {
            $clinicalHistory = $this->ClinicalHistories->patchEntity($clinicalHistory, $this->request->getData());

            $clinicalHistory->beneficiary_id = $id;

            $clinicalHistory->doctor_id = $idDoctor;

            if ($this->ClinicalHistories->save($clinicalHistory)) {
                $this->Flash->success(__('The clinical history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clinical history could not be saved. Please, try again.'));
        }
        $persons = $this->ClinicalHistories->Persons->find('list', ['limit' => 200]);
        $beneficiary = $this->ClinicalHistories->Beneficiary->find('list', ['limit' => 200]);
        $bloodTypes = $this->ClinicalHistories->BloodTypes->find('list', ['limit' => 200]);
        $doctors = $this->ClinicalHistories->Doctors->find('list', ['limit' => 200]);
        $diagnoses = $this->ClinicalHistories->Diagnoses->find('list');
        $habits = $this->ClinicalHistories->Habits->find('list', ['limit' => 200]);
        $medicalsAntecedents = $this->ClinicalHistories->MedicalsAntecedents->find('list');
        $this->set(compact('clinicalHistory', 'persons', 'beneficiary', 'bloodTypes', 'doctors', 'diagnoses', 'habits', 'medicalsAntecedents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Clinical History id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $clinicalHistory = $this->ClinicalHistories->get($id, [
            'contain' => ['Diagnoses', 'Habits', 'MedicalsAntecedents'],
        ]);

        //$clinicalHistory->beneficiary_id = $id;
        //$clinicalHistory->doctor_id = $idDoctor;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $clinicalHistory = $this->ClinicalHistories->patchEntity($clinicalHistory, $this->request->getData());
            if ($this->ClinicalHistories->save($clinicalHistory)) {
                $this->Flash->success(__('La historia clinica fue actualizada con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clinical history could not be saved. Please, try again.'));
        }
        $persons = $this->ClinicalHistories->Persons->find('list', ['limit' => 200]);
        $beneficiary = $this->ClinicalHistories->Beneficiary->find('list', ['limit' => 200]);
        $bloodTypes = $this->ClinicalHistories->BloodTypes->find('list', ['limit' => 200]);
        $doctors = $this->ClinicalHistories->Doctors->find('list', ['limit' => 200]);
        $diagnoses = $this->ClinicalHistories->Diagnoses->find('list', ['limit' => 200]);
        $habits = $this->ClinicalHistories->Habits->find('list', ['limit' => 200]);
        $medicalsAntecedents = $this->ClinicalHistories->MedicalsAntecedents->find('list', ['limit' => 200]);
        $this->set(compact('clinicalHistory', 'persons', 'beneficiary', 'bloodTypes', 'doctors', 'diagnoses', 'habits', 'medicalsAntecedents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Clinical History id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clinicalHistory = $this->ClinicalHistories->get($id);
        if ($this->ClinicalHistories->delete($clinicalHistory)) {
            $this->Flash->success(__('The clinical history has been deleted.'));
        } else {
            $this->Flash->error(__('The clinical history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
