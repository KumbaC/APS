<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Beneficiary Controller
 *
 * @property \App\Model\Table\BeneficiaryTable $Beneficiary
 * @method \App\Model\Entity\Beneficiary[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BeneficiaryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function initialize(): void
    {
    parent::initialize();

        //Carga el componente paginador con la estrategia de paginador simple.
         $this->loadComponent('Paginator', [
            /* 'paginator' => new \Cake\Datasource\SimplePaginator(), */
        ]);
    }


    public function index()
    {
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');

        if ($session->read('Auth.User.role_id') == 2) {


        $this->paginate = [
            'conditions' => [
                 'Persons.user_internal_id' => $this->Auth->user('id'),
            ],
            'contain' => ['Persons', 'Kins', 'Genders'],
        ];
        $beneficiary = $this->Beneficiary->find('all');

        $this->set(compact('beneficiary'), $this->paginate($beneficiary, ['limit' => '3']));
     }else{

            $this->Flash->error(__('No tienes acceso para entrar.'));
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
         }
    }

    /**
     * View method
     *
     * @param string|null $id Beneficiary id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');

        if ($session->read('Auth.User.role_id') == 2) {

        $beneficiary = $this->Beneficiary->get($id, [

            'conditions' => [
                'Persons.user_internal_id' => $this->Auth->user('id'),
           ],

            'contain' => ['Persons', 'Kins', 'Genders'],

        ]);
        $this->viewBuilder()->setOptions([
            'pdfConfig',
             [
                'orientation' => 'portrait',
                'filename' => 'CarnetAPS_' . $id
             ]
        ]);
        $this->set(compact('beneficiary'));
         }else{

        $this->Flash->error(__('No tienes acceso para entrar.'));
        $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
  /*   public function add()
    {
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');

        if ($session->read('Auth.User.role_id') == 2) {

        $beneficiary = $this->Beneficiary->newEmptyEntity();
        if ($this->request->is('post')) {
            $beneficiary = $this->Beneficiary->patchEntity($beneficiary, $this->request->getData());
            if ($this->Beneficiary->save($beneficiary)) {
                $this->Flash->success(__('The beneficiary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The beneficiary could not be saved. Please, try again.'));
        }
        $persons = $this->Beneficiary->Persons->find('list', ['limit' => 200]);
        $kins = $this->Beneficiary->Kins->find('list', ['limit' => 200]);
        $genders = $this->Beneficiary->Genders->find('list', ['limit' => 200]);
        $this->set(compact('beneficiary', 'persons', 'kins', 'genders'));

         }else{

        $this->Flash->error(__('No tienes acceso para entrar.'));
        $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
 */
    /**
     * Edit method
     *
     * @param string|null $id Beneficiary id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /* public function edit($id = null)
    {
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');

        if ($session->read('Auth.User.role_id') == 2) {

        $beneficiary = $this->Beneficiary->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $beneficiary = $this->Beneficiary->patchEntity($beneficiary, $this->request->getData());
            if ($this->Beneficiary->save($beneficiary)) {
                $this->Flash->success(__('The beneficiary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The beneficiary could not be saved. Please, try again.'));
        }
        $persons = $this->Beneficiary->Persons->find('list', ['limit' => 200]);
        $kins = $this->Beneficiary->Kins->find('list', ['limit' => 200]);
        $genders = $this->Beneficiary->Genders->find('list', ['limit' => 200]);
        $this->set(compact('beneficiary', 'persons', 'kins', 'genders'));

        }else{

        $this->Flash->error(__('No tienes acceso para entrar.'));
        $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    } */

    /**
     * Delete method
     *
     * @param string|null $id Beneficiary id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /* public function delete($id = null)
    {
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');

        if ($session->read('Auth.User.role_id') == 2) {
            $this->request->allowMethod(['post', 'delete']);
            $beneficiary = $this->Beneficiary->get($id);
            if ($this->Beneficiary->delete($beneficiary)) {
                $this->Flash->success(__('El beneficiario fue eliminado.'));
            } else {
                $this->Flash->error(__('The beneficiary could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('No tienes acceso para entrar.'));
            $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    } */

}
