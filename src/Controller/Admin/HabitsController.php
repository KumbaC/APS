<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Habits Controller
 *
 * @property \App\Model\Table\HabitsTable $Habits
 * @method \App\Model\Entity\Habit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HabitsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $habits = $this->paginate($this->Habits);

        $this->set(compact('habits'));
    }

    /**
     * View method
     *
     * @param string|null $id Habit id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $habit = $this->Habits->get($id, [
            'contain' => ['ClinicalHistories'],
        ]);

        $this->set(compact('habit'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $habit = $this->Habits->newEmptyEntity();
        if ($this->request->is('post')) {
            $habit = $this->Habits->patchEntity($habit, $this->request->getData());
            if ($this->Habits->save($habit)) {
                $this->Flash->success(__('The habit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The habit could not be saved. Please, try again.'));
        }
        $clinicalHistories = $this->Habits->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('habit', 'clinicalHistories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Habit id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $habit = $this->Habits->get($id, [
            'contain' => ['ClinicalHistories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $habit = $this->Habits->patchEntity($habit, $this->request->getData());
            if ($this->Habits->save($habit)) {
                $this->Flash->success(__('The habit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The habit could not be saved. Please, try again.'));
        }
        $clinicalHistories = $this->Habits->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('habit', 'clinicalHistories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Habit id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $habit = $this->Habits->get($id);
        if ($this->Habits->delete($habit)) {
            $this->Flash->success(__('The habit has been deleted.'));

        } else {
            $this->Flash->error(__('The habit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function receive()
    {
        $habit = $this->Habits->newEmptyEntity();
        $data = $this->request->getData();
        $data = $this->Habits->patchEntity($habit, $data);

        $this->Habits->save($data);

        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($habit));

            return $response;

    }

   /*  public function destroy($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $data = $this->Habits->get((int)$id);
        $this->Habits->delete($data);

        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($data));

            return $response;
    } */
}
