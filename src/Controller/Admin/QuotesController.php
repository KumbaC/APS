<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Utility\Hash;
/**
 * Quotes Controller
 *
 * @property \App\Model\Table\QuotesTable $Quotes
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuotesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $key = $this->request->getQuery('key');
        if($key){
                $query = $this->Quotes->find('all')->where(['Or' => ['beneficiary.cedula like' => '%'. $key. '%', 'persons.cedula like' => '%'. $key. '%']]);
        }else{
               $query = $this->Quotes;

        }

        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');
    if ($session->read('Auth.User.role_id') == 3) {
        $this->paginate = [
            'contain' => ['Specialties','Doctors', 'Beneficiary', 'Persons', 'StatusQuotes'],
            'order' => ['Quotes.fecha' => 'ASC'],
            'conditions' => [
                'Doctors.user_id' => $this->Auth->user('id'),
            ],
        ];
        $quotes = $this->paginate($query);

        $this->set(compact('quotes'));
       }else{
           $this->paginate = [
            'contain' => ['Specialties', 'Doctors', 'Beneficiary', 'Persons', 'StatusQuotes'],

        ];
           $quotes = $this->paginate($query);

           $this->set(compact('quotes'));
       }
    }

    /**
     * View method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quote = $this->Quotes->get($id, [
            'contain' => ['Specialties', 'Doctors', 'Beneficiary', 'Persons', 'StatusQuotes'],
        ]);

        $this->set(compact('quote'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $quote = $this->Quotes->newEmptyEntity();
        if ($this->request->is('post', 'get', 'ajax', 'put','patch')) {
            $quote = $this->Quotes->patchEntity($quote, $this->request->getData());
            $quote->person_id = $id;

                if ($this->Quotes->save($quote)) {
                    $this->Flash->success(__('Consulta medica guardada con exito. '));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('La consulta no pudo ser guardada, intente de nuevo.'));
            }



        $specialties = $this->Quotes->Specialties->find('all')->contain(['Doctors']);
        $doctors = $this->Quotes->Doctors->find('all');
        $beneficiary = $this->Quotes->Beneficiary->find('list', ['limit' => 200]);
        $persons = $this->Quotes->Persons->find('all')->contain(['Beneficiary']);
        $statusQuotes = $this->Quotes->StatusQuotes->find('list', ['limit' => 200]);
        $this->set(compact('quote', 'specialties', 'doctors', 'beneficiary', 'persons', 'statusQuotes'));
    }



    public function addb($id = null)
    {
        $quote = $this->Quotes->newEmptyEntity();
        if ($this->request->is('post', 'get', 'ajax', 'put','patch')) {
            $quote = $this->Quotes->patchEntity($quote, $this->request->getData());
            $quote->beneficiary_id = $id;

            if ($this->Quotes->save($quote)) {
                $this->Flash->success(__('Consulta medica guardada con exito. '));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));

        }

        $specialties =  $this->Quotes->Specialties->find('all')->contain(['Doctors']);
        $doctors = $this->Quotes->Doctors->find('all');
        $beneficiary = $this->Quotes->Beneficiary->find('list', ['limit' => 200]);
        $persons = $this->Quotes->Persons->find('all')->contain(['Beneficiary']);
        $statusQuotes = $this->Quotes->StatusQuotes->find('list', ['limit' => 200]);
        $this->set(compact('quote', 'specialties', 'doctors', 'beneficiary', 'persons', 'statusQuotes'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quote = $this->Quotes->get($id, [
            'contain' => ['Specialties', 'Doctors', 'Beneficiary', 'Persons', 'StatusQuotes'],
        ]);
       
        
    
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quote = $this->Quotes->patchEntity($quote, $this->request->getData());
            if ($this->Quotes->save($quote)) {
                $this->Flash->success(__('La consulta fue actualizada con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
        }
        $specialties =  $this->Quotes->Specialties->find('all')->contain(['Doctors']);
        $doctors = $this->Quotes->Doctors->find('all');
        $beneficiary = $this->Quotes->Beneficiary->find('list', ['limit' => 200]);
        $persons = $this->Quotes->Persons->find('all')->contain(['Beneficiary']);
        $statusQuotes = $this->Quotes->StatusQuotes->find('list', ['limit' => 200]);

        $this->set(compact('quote', 'specialties', 'doctors', 'beneficiary', 'persons', 'statusQuotes'));
       
    }

    public function editb($id = null)
    {
        $quote = $this->Quotes->get($id, [
            'contain' => ['Specialties', 'Doctors', 'Beneficiary', 'Persons', 'StatusQuotes'],
        ]);
       
        //Identificador de beneficiarios
        $quote->beneficiary_id = $id;
        //Identificador de beneficiarios
    
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quote = $this->Quotes->patchEntity($quote, $this->request->getData());
            if ($this->Quotes->save($quote)) {
                $this->Flash->success(__('La consulta fue actualizada con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
        }
        $specialties =  $this->Quotes->Specialties->find('all')->contain(['Doctors']);
        $doctors = $this->Quotes->Doctors->find('all');
        $beneficiary = $this->Quotes->Beneficiary->find('list', ['limit' => 200]);
        $persons = $this->Quotes->Persons->find('all')->contain(['Beneficiary']);
        $statusQuotes = $this->Quotes->StatusQuotes->find('list', ['limit' => 200]);

        $this->set(compact('quote', 'specialties', 'doctors', 'beneficiary', 'persons', 'statusQuotes'));
       
    }


    public function status($id = null)
    {
        $quote = $this->Quotes->get($id, [
            'contain' => ['StatusQuotes'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quote = $this->Quotes->patchEntity($quote, $this->request->getData());
            if ($this->Quotes->save($quote)) {
                $this->Flash->success(__('El estatus de la consulta fue actualizado con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El estatus de la consulta no pudo ser actualizado..'));
        }

        $statusQuotes = $this->Quotes->StatusQuotes->find('list', ['limit' => 200]);

        $this->set(compact('quote','statusQuotes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quote = $this->Quotes->get($id);
        if ($this->Quotes->delete($quote)) {
            $this->Flash->success(__('La consulta fue eliminada.'));
        } else {
            $this->Flash->error(__('La consulta no pudo ser eliminada, intente mas tarde.'));
        }

        return $this->redirect(['action' => 'index']);
    }



}
