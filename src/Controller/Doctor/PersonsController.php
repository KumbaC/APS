<?php
declare(strict_types=1);

namespace App\Controller\Doctor;

use App\Controller\Doctor\AppController;

/**
 * Persons Controller
 *
 * @property \App\Model\Table\PersonsTable $Persons
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $persons = $this->Persons->find()->contain(['Departments', 'Status', 'Cargos', 'Units', 'Genders']);

        $this->set(compact('persons'));
    }

    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $person = $this->Persons->get($id, [
            'contain' => ['Departments', 'Status', 'Cargos', 'Units', 'Genders', 'Users', 'Beneficiary', 'ClinicalHistories', 'PublicWorkers', 'Quotes'],
        ]);

        $this->set(compact('person'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $person = $this->Persons->newEmptyEntity();
        if ($this->request->is('post')) {
            $person = $this->Persons->patchEntity($person, $this->request->getData());
            if ($this->Persons->save($person)) {
                $this->Flash->success(__('Fue guardada la información del titular.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar la información del titular.'));
        }
        $departments = $this->Persons->Departments->find('all')->contain(['Units']);
        $status = $this->Persons->Status->find('list', ['limit' => 200]);
        $cargos = $this->Persons->Cargos->find('list', ['limit' => 200]);
        $users = $this->Persons->Users->find('list', ['limit' => 200]);
        $units = $this->Persons->Units->find('list', ['limit' => 200]);
        $genders = $this->Persons->Genders->find('list', ['limit' => 200]);
        $this->set(compact('person', 'departments', 'status', 'cargos', 'users', 'units', 'genders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $person = $this->Persons->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $person = $this->Persons->patchEntity($person, $this->request->getData());
            if ($this->Persons->save($person)) {
                $this->Flash->success(__('Fua actualizada la información del titular.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar la información del titular, intenta mas tarde.'));
        }
        $departments = $this->Persons->Departments->find('all')->contain(['Units']);
        $status = $this->Persons->Status->find('list', ['limit' => 200]);
        $cargos = $this->Persons->Cargos->find('list', ['limit' => 200]);
        $users = $this->Persons->Users->find('list', ['limit' => 200]);
        $units = $this->Persons->Units->find('list', ['limit' => 200]);
        $genders = $this->Persons->Genders->find('list', ['limit' => 200]);
        $this->set(compact('person', 'departments', 'status', 'cargos', 'users', 'units', 'genders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $person = $this->Persons->get($id);
        if ($this->Persons->delete($person)) {
            $this->Flash->success(__('The person has been deleted.'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
