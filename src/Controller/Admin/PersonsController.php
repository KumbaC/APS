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

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }


  public function index()
    {
            $key = $this->request->getQuery('key');
            if($key){
                    $query = $this->Persons->find('all')->where(['cedula like' => '%'. $key. '%']);
            }else{
                   $query = $this->Persons;

            }

        $this->paginate = [
            'contain' => ['Departments', 'Status', 'Cargos'],
        ];
        $persons = $this->paginate($query, ['limit' => '5']);

        $this->set(compact('persons'), $persons);
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
                $this->Flash->success(__('Afiliado guardo con exito...'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $departments = $this->Persons->Departments->find('list', ['limit' => 200]);
        $status = $this->Persons->Status->find('list', ['limit' => 200]);
        $cargos = $this->Persons->Cargos->find('list', ['limit' => 200]);
        $this->set(compact('person', 'departments', 'status', 'cargos'));
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
                $this->Flash->success(__('Los datos del afiliado fueron actualizados con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $departments = $this->Persons->Departments->find('list', ['limit' => 200]);
        $status = $this->Persons->Status->find('list', ['limit' => 200]);
        $cargos = $this->Persons->Cargos->find('list', ['limit' => 200]);
        $this->set(compact('person', 'departments', 'status', 'cargos'));
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
            $this->Flash->success(__('El afiliado fue eliminado con exito'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
