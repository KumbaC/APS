<?php
declare(strict_types=1);


namespace App\Controller\Admin;

use App\Controller\AppController;
/**
 * DoctorsTurns Controller
 *
 * @property \App\Model\Table\DoctorsTurnsTable $DoctorsTurns
 * @method \App\Model\Entity\DoctorsTurn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DoctorsTurnsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Doctors', 'Turns'],
        ];
        $doctorsTurns = $this->paginate($this->DoctorsTurns);

        $this->set(compact('doctorsTurns'));
    }

    /**
     * View method
     *
     * @param string|null $id Doctors Turn id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doctorsTurn = $this->DoctorsTurns->get($id, [
            'contain' => ['Doctors', 'Turns'],
        ]);

        $this->set(compact('doctorsTurn'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $doctorsTurn = $this->DoctorsTurns->newEmptyEntity();
        if ($this->request->is('post')) {
            $doctorsTurn = $this->DoctorsTurns->patchEntity($doctorsTurn, $this->request->getData());
            if ($this->DoctorsTurns->save($doctorsTurn)) {
                $this->Flash->success(__('The doctors turn has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The doctors turn could not be saved. Please, try again.'));
        }
        $doctors = $this->DoctorsTurns->Doctors->find('list', ['limit' => 200]);
        $turns = $this->DoctorsTurns->Turns->find('list', ['limit' => 200]);
        $this->set(compact('doctorsTurn', 'doctors', 'turns'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Doctors Turn id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $doctorsTurn = $this->DoctorsTurns->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doctorsTurn = $this->DoctorsTurns->patchEntity($doctorsTurn, $this->request->getData());
            if ($this->DoctorsTurns->save($doctorsTurn)) {
                $this->Flash->success(__('The doctors turn has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The doctors turn could not be saved. Please, try again.'));
        }
        $doctors = $this->DoctorsTurns->Doctors->find('list', ['limit' => 200]);
        $turns = $this->DoctorsTurns->Turns->find('list', ['limit' => 200]);
        $this->set(compact('doctorsTurn', 'doctors', 'turns'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Doctors Turn id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doctorsTurn = $this->DoctorsTurns->get($id);
        if ($this->DoctorsTurns->delete($doctorsTurn)) {
            $this->Flash->success(__('The doctors turn has been deleted.'));
        } else {
            $this->Flash->error(__('The doctors turn could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
