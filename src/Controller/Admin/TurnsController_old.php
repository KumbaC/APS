<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Turns Controller
 *
 * @property \App\Model\Table\TurnsTable $Turns
 * @method \App\Model\Entity\Turn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TurnsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $turns = $this->paginate($this->Turns, ['limit' => '5']);

        $this->set(compact('turns'));
    }

    /**
     * View method
     *
     * @param string|null $id Turn id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $turn = $this->Turns->get($id, [
            'contain' => ['Doctors'],
        ]);

        $this->set(compact('turn'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $turn = $this->Turns->newEmptyEntity();
        if ($this->request->is('post')) {
            $turn = $this->Turns->patchEntity($turn, $this->request->getData());
            if ($this->Turns->save($turn)) {
                $this->Flash->success(__('The turn has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The turn could not be saved. Please, try again.'));
        }
        $this->set(compact('turn'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Turn id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $turn = $this->Turns->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $turn = $this->Turns->patchEntity($turn, $this->request->getData());
            if ($this->Turns->save($turn)) {
                $this->Flash->success(__('The turn has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The turn could not be saved. Please, try again.'));
        }
        $this->set(compact('turn'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Turn id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $turn = $this->Turns->get($id);
        if ($this->Turns->delete($turn)) {
            $this->Flash->success(__('The turn has been deleted.'));
        } else {
            $this->Flash->error(__('The turn could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
