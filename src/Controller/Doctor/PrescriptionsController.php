<?php
declare(strict_types=1);

namespace App\Controller\Doctor;

use App\Controller\Doctor\AppController;

/**
 * Prescriptions Controller
 *
 * @property \App\Model\Table\PrescriptionsTable $prescriptions
 * @method \App\Model\Entity\Prescription[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

 /**
 *
 *
 * @property \App\Model\Table\QuotesTable $Quotes
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
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
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');
        if ($session->read('Auth.User.role_id') == 3) {
           
                   $query = $this->Prescriptions;

            

            $this->paginate = [
            'contain' => ['Persons', 'Beneficiary', 'Doctors', 'Quotes', 'ClinicalHistories'],
            'conditions' => [
                'Doctors.user_doctor_id' => $this->Auth->user('id'),
            ],
        ];
        $prescriptions = $this->paginate($query);

        $this->set(compact('prescriptions'));

    }

    else{
        $this->Flash->error(__('No tienes acceso para entrar.'));
        $this->redirect(['controller' => 'Pages', 'action' => 'display']);
        }
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
            'contain' => ['Persons', 'Beneficiary', 'Doctors', 'ClinicalHistories'],
        ]);

        $this->viewBuilder()->setOption(
            'pdfConfig',
            [
                'orientation' => 'landscape',
                'title' => 'Recipe Medico'. ' ',
                'pageSize' => 'A5',
                'margin' => [
                    'bottom' => 0,
                    'left' => 8,
                    'right' => 5,
                    'top' => 2
                ],
            ]
        );

        $this->set(compact('prescription'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id, $idDoctor = null)
    {
        $prescription = $this->Prescriptions->newEmptyEntity();
        if ($this->request->is('post')) {
            $prescription = $this->Prescriptions->patchEntity($prescription, $this->request->getData());

            $prescription->person_id = $id;
            //$Quotes = $this->Quotes->find('all');
            $prescription->doctor_id =  $idDoctor;

            if ($this->Prescriptions->save($prescription)) {
                $this->Flash->success(__('Recipe creado con exito, que tenga un buen dia.'));

                return $this->redirect(['action' => 'add' , $id, $idDoctor]);
            }
            $this->Flash->error(__('El recipe no pudo ser guardado. Por favor, intente mas tarde.'));
        }

        $persons = $this->Prescriptions->Persons->find('list', ['limit' => 200]);
        $beneficiary = $this->Prescriptions->Beneficiary->find('list', ['limit' => 200]);
        $doctors = $this->Prescriptions->Doctors->find('list', ['limit' => 200]);
        $quotes = $this->Prescriptions->Quotes->find('all')->contain(['Doctors']);
        $clinicalHistories = $this->Prescriptions->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('prescription', 'persons', 'beneficiary', 'doctors', 'quotes', 'clinicalHistories'));
    }

    public function addb($id, $idDoctor = null)
    {
        $prescription = $this->Prescriptions->newEmptyEntity();
        if ($this->request->is('post')) {
            $prescription = $this->Prescriptions->patchEntity($prescription, $this->request->getData());

            $prescription->beneficiary_id = $id;
            $prescription->doctor_id =  $idDoctor;

            if ($this->Prescriptions->save($prescription)) {
                $this->Flash->success(__('El recipe fue guardado con exito, que tenga un buen dia.'));

                return $this->redirect(['action' => 'addb',  $id, $idDoctor]);
            }
            $this->Flash->error(__('El recipe no pudo ser guardado. Por favor, intente mas tarde.'));
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
    public function edit($id = null, $idDoctor = null)
    {
        $prescription = $this->Prescriptions->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $prescription = $this->Prescriptions->patchEntity($prescription, $this->request->getData());
            if ($this->Prescriptions->save($prescription)) {
                $this->Flash->success(__('El recipe se actualizo con exito. Que tenga un buen dia.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El recipe no pudo ser guardado. Por favor, intente mas tarde.'));
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
            $this->Flash->success(__('El recipe fue eliminado con exito.'));
        } else {
            $this->Flash->error(__('El recipe no pudo ser guardado. Por favor, intente mas tarde.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
