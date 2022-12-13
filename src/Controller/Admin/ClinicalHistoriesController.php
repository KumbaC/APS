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
        $clinicalHistories = $this->paginate($this->ClinicalHistories->find('all'), ['limit' => '5']);

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
            'contain' => ['Persons'=>['Genders'], 'Beneficiary'=>['Genders'], 'BloodTypes', 'Doctors' =>['Specialties'], 'Diagnoses', 'Habits', 'MedicalsAntecedents', 'SurgicalsAntecedents'],
        ]);


        $idDoctor = $clinicalHistory->doctor_id;

        $clinical = $this->ClinicalHistories->Doctors->get($idDoctor, [
            'contain' => ['Specialties'],
        ]);

        $this->viewBuilder()->setOption(
            'pdfConfig',
            [

                'orientation' => 'portrait',
                'pageSize' => 'A5',
                'filename' => 'Informe Medico_'. $id .'.pdf',
                'title' => 'Informe Medico',
                'margin' => [
                    'bottom' => 0,
                    'left' => 7,
                    'right' => 7,
                    'top' => 8
                ],
                'pagesCount' => true
            ]

        );

        $this->set(compact('clinicalHistory', 'clinical'));


    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id, $idDoctor = null, $idConsulta = null)

    {
     
        $clinicalHistory = $this->ClinicalHistories->newEmptyEntity();
        
        if ($this->request->is('post', 'ajax')) {
            $clinicalHistory = $this->ClinicalHistories->patchEntity($clinicalHistory, $this->request->getData());

            $clinicalHistory->person_id = $id;

            $clinicalHistory->doctor_id = $idDoctor;

            $clinicalHistory->quote_id = $idConsulta;
            

            if ($this->ClinicalHistories->save($clinicalHistory)) {
                $this->Flash->success(__('El informe medico fue guardado, con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el informe medico. Inténtalo de nuevo.'));
        }
        
      

        $clinical = $this->ClinicalHistories->Doctors->get($idDoctor, [
            'contain' => ['Specialties'],
        ]);

        $persons = $this->ClinicalHistories->Persons->find('list', ['limit' => 200]);
        $beneficiary = $this->ClinicalHistories->Beneficiary->find('list', ['limit' => 200]);
        $bloodTypes = $this->ClinicalHistories->BloodTypes->find('list', ['limit' => 200]);
        $doctors = $this->ClinicalHistories->Doctors->find('list', ['limit' => 200]);
        $diagnoses = $this->ClinicalHistories->Diagnoses->find('list');
        $habits = $this->ClinicalHistories->Habits->find('list', ['limit' => 200]);
        $medicalsAntecedents = $this->ClinicalHistories->MedicalsAntecedents->find('list');
        $surgicalsAntecedents = $this->ClinicalHistories->SurgicalsAntecedents->find('list');
        $this->set(compact('clinicalHistory', 'surgicalsAntecedents', 'clinical', 'persons', 'beneficiary', 'bloodTypes', 'doctors', 'diagnoses', 'habits', 'medicalsAntecedents'));
    }

    public function addb($id, $idDoctor = null)

    {
        $clinicalHistory = $this->ClinicalHistories->newEmptyEntity();
        if ($this->request->is('post')) {
            $clinicalHistory = $this->ClinicalHistories->patchEntity($clinicalHistory, $this->request->getData());

            $clinicalHistory->beneficiary_id = $id;

            $clinicalHistory->doctor_id = $idDoctor;

            if ($this->ClinicalHistories->save($clinicalHistory)) {
                $this->Flash->success(__('La historia clinica fue actualizada, con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La historia clinica no pudo ser guardada. Inténtalo de nuevo.'));
        }

        $clinical = $this->ClinicalHistories->Doctors->get($idDoctor, [
            'contain' => ['Specialties'],
        ]);

        $persons = $this->ClinicalHistories->Persons->find('list', ['limit' => 200]);
        $beneficiary = $this->ClinicalHistories->Beneficiary->find('list', ['limit' => 200]);
        $bloodTypes = $this->ClinicalHistories->BloodTypes->find('list', ['limit' => 200]);
        $doctors = $this->ClinicalHistories->Doctors->find('list', ['limit' => 200]);
        $diagnoses = $this->ClinicalHistories->Diagnoses->find('list');
        $habits = $this->ClinicalHistories->Habits->find('list', ['limit' => 200]);
        $medicalsAntecedents = $this->ClinicalHistories->MedicalsAntecedents->find('list');
        $surgicalsAntecedents = $this->ClinicalHistories->SurgicalsAntecedents->find('list');
        $this->set(compact('clinicalHistory', 'surgicalsAntecedents', 'clinical', 'persons', 'beneficiary', 'bloodTypes', 'doctors', 'diagnoses', 'habits', 'medicalsAntecedents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Clinical History id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id, $idDoctor = null)
    {
        $clinicalHistory = $this->ClinicalHistories->get($id, [
            'contain' => ['Diagnoses', 'Habits', 'MedicalsAntecedents','SurgicalsAntecedents'],
        ]);

        //$clinicalHistory->beneficiary_id = $id;
        $idDoctor = $clinicalHistory->doctor_id; 

        if ($this->request->is(['patch', 'post', 'put'])) {
            $clinicalHistory = $this->ClinicalHistories->patchEntity($clinicalHistory, $this->request->getData());
            if ($this->ClinicalHistories->save($clinicalHistory)) {
                $this->Flash->success(__('El informe medico fue actualizado con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el informe medico. Inténtalo de nuevo.'));
        }

        $clinical = $this->ClinicalHistories->Doctors->get($idDoctor, [
            'contain' => ['Specialties'],
        ]);

        $persons = $this->ClinicalHistories->Persons->find('list', ['limit' => 200]);
        $beneficiary = $this->ClinicalHistories->Beneficiary->find('list', ['limit' => 200]);
        $bloodTypes = $this->ClinicalHistories->BloodTypes->find('list', ['limit' => 200]);
        $doctors = $this->ClinicalHistories->Doctors->find('list', ['limit' => 200]);
        $diagnoses = $this->ClinicalHistories->Diagnoses->find('list');
        $habits = $this->ClinicalHistories->Habits->find('list', ['limit' => 200]);
        $medicalsAntecedents = $this->ClinicalHistories->MedicalsAntecedents->find('list');
        $surgicalsAntecedents = $this->ClinicalHistories->SurgicalsAntecedents->find('list');
        $this->set(compact('clinicalHistory', 'clinical', 'surgicalsAntecedents', 'persons', 'beneficiary', 'bloodTypes', 'doctors', 'diagnoses', 'habits', 'medicalsAntecedents'));
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
            $this->Flash->success(__('El informe medico fue eliminado con exito.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el informe medico. Inténtalo de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }


   /* */



}
