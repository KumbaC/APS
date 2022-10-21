<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Hours Controller
 *
 * @property \App\Model\Table\HoursTable $Hours
 * @method \App\Model\Entity\Hour[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HoursController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $hours = $this->paginate($this->Hours);

        $this->set(compact('hours'));
    }

    /**
     * View method
     *
     * @param string|null $id Hour id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hour = $this->Hours->get($id, [
            'contain' => ['Doctors'],
        ]);

        $this->set(compact('hour'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hour = $this->Hours->newEmptyEntity();
        if ($this->request->is('post')) {
            $hour = $this->Hours->patchEntity($hour, $this->request->getData());
            if ($this->Hours->save($hour)) {
                $this->Flash->success(__('The hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hour could not be saved. Please, try again.'));
        }
        $this->set(compact('hour'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hour id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hour = $this->Hours->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hour = $this->Hours->patchEntity($hour, $this->request->getData());
            if ($this->Hours->save($hour)) {
                $this->Flash->success(__('The hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hour could not be saved. Please, try again.'));
        }
        $this->set(compact('hour'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hour id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hour = $this->Hours->get($id);
        if ($this->Hours->delete($hour)) {
            $this->Flash->success(__('The hour has been deleted.'));
        } else {
            $this->Flash->error(__('The hour could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
