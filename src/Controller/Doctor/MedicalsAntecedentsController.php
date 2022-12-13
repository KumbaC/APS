<?php
declare(strict_types=1);

namespace App\Controller\Doctor;

use App\Controller\Doctor\AppController;

/**
 * MedicalsAntecedents Controller
 *
 * @property \App\Model\Table\MedicalsAntecedentsTable $MedicalsAntecedents
 * @method \App\Model\Entity\MedicalsAntecedent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MedicalsAntecedentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $medicalsAntecedents = $this->paginate($this->MedicalsAntecedents);

        $this->set(compact('medicalsAntecedents'));
    }

    /**
     * View method
     *
     * @param string|null $id Medicals Antecedent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medicalsAntecedent = $this->MedicalsAntecedents->get($id, [
            'contain' => ['ClinicalHistories'],
        ]);

        $this->set(compact('medicalsAntecedent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medicalsAntecedent = $this->MedicalsAntecedents->newEmptyEntity();
        if ($this->request->is('post')) {
            $medicalsAntecedent = $this->MedicalsAntecedents->patchEntity($medicalsAntecedent, $this->request->getData());
            if ($this->MedicalsAntecedents->save($medicalsAntecedent)) {
                $this->Flash->success(__('The medicals antecedent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicals antecedent could not be saved. Please, try again.'));
        }
        $clinicalHistories = $this->MedicalsAntecedents->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('medicalsAntecedent', 'clinicalHistories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Medicals Antecedent id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $medicalsAntecedent = $this->MedicalsAntecedents->get($id, [
            'contain' => ['ClinicalHistories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medicalsAntecedent = $this->MedicalsAntecedents->patchEntity($medicalsAntecedent, $this->request->getData());
            if ($this->MedicalsAntecedents->save($medicalsAntecedent)) {
                $this->Flash->success(__('The medicals antecedent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicals antecedent could not be saved. Please, try again.'));
        }
        $clinicalHistories = $this->MedicalsAntecedents->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('medicalsAntecedent', 'clinicalHistories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Medicals Antecedent id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medicalsAntecedent = $this->MedicalsAntecedents->get($id);
        if ($this->MedicalsAntecedents->delete($medicalsAntecedent)) {
            $this->Flash->success(__('The medicals antecedent has been deleted.'));
        } else {
            $this->Flash->error(__('The medicals antecedent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function receive()
    {
        $medicalsAntecedent = $this->MedicalsAntecedents->newEmptyEntity();
        $data = $this->request->getData();
        $data = $this->MedicalsAntecedents->patchEntity($medicalsAntecedent, $data);

        $this->MedicalsAntecedents->save($data);

        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($medicalsAntecedent));

            return $response;

    }
}
