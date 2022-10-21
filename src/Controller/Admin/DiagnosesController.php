<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Utility\Hash;
use Cake\Routing\Router;
/**
 * Diagnoses Controller
 *
 * @property \App\Model\Table\DiagnosesTable $Diagnoses
 * @method \App\Model\Entity\Diagnosis[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiagnosesController extends AppController
{

    public $db;

    public function initialize(): void
    {
        parent::initialize();
        $this->db = ConnectionManager::get("default");
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $key = $this->request->getQuery('key');
        if($key){
                $query = $this->Diagnoses->find('all')->where(['diagnoses.descripcion like' => '%'. $key. '%']);
        }else{
               $query = $this->Diagnoses;

        }

        $diagnoses = $this->paginate($query);

        $this->set(compact('diagnoses'), $diagnoses);

    }

    /**
     * View method
     *
     * @param string|null $id Diagnosis id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diagnosis = $this->Diagnoses->get($id, [
            'contain' => ['ClinicalHistories'],
        ]);

        $this->set(compact('diagnosis'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diagnosis = $this->Diagnoses->newEmptyEntity();
        if ($this->request->is('post')) {
            $diagnosis = $this->Diagnoses->patchEntity($diagnosis, $this->request->getData());
            if ($this->Diagnoses->save($diagnosis)) {
                $this->Flash->success(__('El diagnostico fue guardado con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnosis could not be saved. Please, try again.'));
        }
        $clinicalHistories = $this->Diagnoses->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('diagnosis', 'clinicalHistories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Diagnosis id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diagnosis = $this->Diagnoses->get($id, [
            'contain' => ['ClinicalHistories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diagnosis = $this->Diagnoses->patchEntity($diagnosis, $this->request->getData());
            if ($this->Diagnoses->save($diagnosis)) {
                $this->Flash->success(__('El diagnostico fue modificado con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diagnosis could not be saved. Please, try again.'));
        }
        $clinicalHistories = $this->Diagnoses->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('diagnosis', 'clinicalHistories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Diagnosis id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete', 'ajax', 'get']);
        $diagnosis = $this->Diagnoses->get($id);
        if ($this->Diagnoses->delete($diagnosis)) {
            $this->Flash->success(__('El diagnostico fue eliminado con exito.'));
        } else {
            $this->Flash->error(__('The diagnosis could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function receive()
    {
        $diagnosis = $this->Diagnoses->newEmptyEntity();
        $data = $this->request->getData();
        $data = $this->Diagnoses->patchEntity($diagnosis, $data);

        $this->Diagnoses->save($data);

        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($diagnosis));

            return $response;

    }



    public function loadEmployees()
    {

        if ($this->request->is("ajax")) {
                // get per page data
                $data = $this->Diagnoses->find('all'); //$this->db->execute("SELECT * from diagnoses")->fetchAll('assoc');
            }

           $data = Hash::map($data->toArray(),'{n}', function($row){

                $row['acciones'] = '

                                <a href="'.Router::url(['controller' => 'Diagnoses', 'action' => 'edit', $row['id']]).'" class="fas fa-edit btn btn-warning"></a>
                                <a href="'.Router::url(['controller' => 'Diagnoses', 'action' => 'delete', $row['id']]).'" class="fas fa-trash btn btn-warning elimi_diagnoses"></a>

                        ';
                return $row;
           });   // total data array

           //debug($data);exit;

            $json_data = array(
                //"draw" => intval($params['draw']),
                //"recordsTotal" => count($total_count),
                //"recordsFiltered" => count($total_count),
                "data" => $data   // total data array
            );

            echo json_encode($json_data);
            die;
        }





}
