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
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $this->paginate = [
            'contain' => ['Departments', 'Status', 'Cargos', 'Units', 'Genders'],
            'conditions' => [
                'persons.user_id' => $this->Auth->user('id'),
            ],

        ];

        $persons = $this->paginate($this->Persons);

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
            'contain' => ['Departments', 'Status', 'Cargos', 'Units', 'Genders', 'Beneficiary'=>['Kins'], 'ClinicalHistories', 'PublicWorkers', 'Quotes',],
        ]);

        $this->viewBuilder()->setOption(
            'pdfConfig',
            [
                'orientation' => 'portrait',
                'filename' => $person->nombre. $person->apellido,
                'margin' => [
                    'bottom' => 2,
                    'left' => 15,
                    'right' => 15,
                    'top' => 30
                ],
            ]
        );

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
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $departments = $this->Persons->Departments->find('list', ['limit' => 200]);
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
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $departments = $this->Persons->Departments->find('list', ['limit' => 200]);
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
            $this->Flash->success(__('The person has been deleted.'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
