<?php
declare(strict_types=1);

namespace App\Controller;

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
        $this->paginate = [
            'conditions' => [
                'Persons.user_internal_id' => $this->Auth->user('id'),
            ],

            'contain' => ['Departments', 'Status', 'Cargos']



        ];
        $persons = $this->Persons->find('all');/* ->where(['Users_internals.id' => $this->Auth->User('id')])->first(); */

        $this->set(compact('persons'),  $this->paginate($persons, ['limit' => '10']));
        //$this->Authorization->authorize($persons);
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
            'contain' => ['Departments', 'Status', 'Cargos', 'Users', 'Beneficiary'=>['Kins'] ],
        ]);

        $this->viewBuilder()->setOptions([
            'pdfConfig',
             [
                'orientation' => 'portrait',
                'filename' => 'CarnetAPS_' . $id
             ]
        ]);

        $this->set(compact('person'));
        //$this->Authorization->authorize($persons);
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
            //$person->user_id = $this->Auth->user('id');
            if ($this->Persons->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $departments = $this->Persons->Departments->find('list', ['limit' => 200]);
        $status = $this->Persons->Status->find('list', ['limit' => 200]);
        $cargos = $this->Persons->Cargos->find('list', ['limit' => 200]);
        $this->set(compact('person', 'departments', 'status', 'cargos'));
        //$this->Authorization->authorize($person);
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
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $departments = $this->Persons->Departments->find('list', ['limit' => 200]);
        $status = $this->Persons->Status->find('list', ['limit' => 200]);
        $cargos = $this->Persons->Cargos->find('list', ['limit' => 200]);
        $this->set(compact('person', 'departments', 'status', 'cargos'));
        //$this->Authorization->authorize($person);
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
        $this->Authorization->authorize($person);
        if ($this->Persons->delete($person)) {
            $this->Flash->success(__('The person has been deleted.'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
