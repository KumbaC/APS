<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

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
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');
    if ($session->read('Auth.User.role_id') == 1){


        $key = $this->request->getQuery('key');
        if($key){
                $query = $this->Persons->find('all')->where(['persons.cedula like' => '%'. $key. '%']);
        }else{
               $query = $this->Persons;

        }


        $this->paginate = [
            'contain' => ['Departments', 'Status', 'Cargos', 'UsersInternals', 'Units', 'Genders'],
        ];

        $persons = $this->paginate($query, ['limit' => '5']);


        $this->set(compact('persons'));
    }else{
        $this->Flash->error(__('No tienes acceso para entrar.'));
        $this->redirect(['controller' => 'Pages', 'action' => 'display']);
      }

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
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');
    if ($session->read('Auth.User.role_id') == 1){

        $person = $this->Persons->get($id, [
            'contain' => ['Departments', 'Status', 'Cargos', 'UsersInternals', 'Units', 'Genders', 'Beneficiary'=>['Kins'], 'ClinicalHistories', 'PublicWorkers', 'Quotes', 'Users'],
        ]);

        $this->viewBuilder()->setOptions([
            'pdfConfig',
             [

                'orientation' => 'landscape',
                'filename' => 'CarnetAPS_'.$person->nombre,

             ]
        ]);


        $this->set(compact('person'));

    }else{
        $this->Flash->error(__('No tienes acceso para entrar.'));
        $this->redirect(['controller' => 'Pages', 'action' => 'display']);
      }
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
        $usersInternals = $this->Persons->UsersInternals->find('list', ['limit' => 200]);
        $units = $this->Persons->Units->find('list', ['limit' => 200]);
        $genders = $this->Persons->Genders->find('list', ['limit' => 200]);
        $this->set(compact('person', 'departments', 'status', 'cargos', 'usersInternals', 'units', 'genders'));
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
        $usersInternals = $this->Persons->UsersInternals->find('list', ['limit' => 200]);
        $units = $this->Persons->Units->find('list', ['limit' => 200]);
        $genders = $this->Persons->Genders->find('list', ['limit' => 200]);
        $this->set(compact('person', 'departments', 'status', 'cargos', 'usersInternals', 'units', 'genders'));
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
            $this->Flash->success(__('El titular fue eliminado con exito.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el titular, intenta mas tarde.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
