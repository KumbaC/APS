<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Pathology;
use App\Model\Table\PathologiesTable;

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
        $this->paginate = [
            'contain' => ['Specialties', 'Diseases', 'Pathologies', 'Persons', 'StatusQuotes'],
        ];
        $quotes = $this->paginate($this->Quotes);

        $this->set(compact('quotes'));
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
            'contain' => ['Specialties', 'Diseases', 'Pathologies', 'Persons', 'StatusQuotes'],
        ]);

        $this->set(compact('quote'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

   /*  public function getEspecialidadByPatologia() {
        if ($this->request->is('ajax', 'post')) {
         $idEspecialidad = $this->params['data']['idEspecialidad'];

         $Patologia = new Pathology;
         $Patologias = $Patologia->find('all', array(
          'fields' => array('Pathology.id', 'Pathology.descripcion'),
          'conditions'=>array('Pathology.specialty_id.' => $idEspecialidad)));

         $this->RequestHandler->respondAs('json');
         $this->autoRender = false;
         echo json_encode ( $Patologias );
        }
       } */


    public function add($id = null)
    {
        $quote = $this->Quotes->newEmptyEntity();
        if ($this->request->is('post')) {
            $quote = $this->Quotes->patchEntity($quote, $this->request->getData());
            $quote->person_id = $id;

            if ($this->Quotes->save($quote)) {
                $this->Flash->success(__('Consulta medica guardada con exito. '));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
        }

        $diseases = $this->Quotes->Diseases->find('list', ['limit' => 200]);
        $persons = $this->Quotes->Persons->find('list', ['limit' => 200]);
        $statusQuotes = $this->Quotes->StatusQuotes->find('list', ['limit' => 200]);
        $status = $this->Quotes->Status->find('list', ['limit' => 200]);
        $specialties = $this->Quotes->Specialties->find('list', ['limit' => 200]);
        $pathologies = $this->Quotes->Pathologies->find('list', ['limit' => 200]);

        $this->set(compact('quote', 'specialties', 'diseases', 'pathologies', 'persons', 'statusQuotes', 'status'));
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
            'contain' => ['Specialties', 'Diseases', 'Pathologies', 'Persons', 'StatusQuotes'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quote = $this->Quotes->patchEntity($quote, $this->request->getData());
            if ($this->Quotes->save($quote)) {
                $this->Flash->success(__('Consulta medica fue actualizada con exito'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
        }
        $specialties = $this->Quotes->Specialties->find('list', ['limit' => 200]);
        $diseases = $this->Quotes->Diseases->find('list', ['limit' => 200]);
        $pathologies = $this->Quotes->Pathologies->find('list', ['limit' => 200]);
        $persons = $this->Quotes->Persons->find('list', ['limit' => 200]);
        $statusQuotes = $this->Quotes->StatusQuotes->find('list', ['limit' => 200]);

        $this->set(compact('quote', 'specialties', 'diseases', 'pathologies', 'persons', 'statusQuotes'));
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
            $this->Flash->success(__('Consulta medica eliminada.'));
        } else {
            $this->Flash->error(__('The quote could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
