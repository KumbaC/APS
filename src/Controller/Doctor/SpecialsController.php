<?php
declare(strict_types=1);

namespace App\Controller\Doctor;

use App\Controller\Doctor\AppController;

/**
 * Specials Controller
 *
 * @property \App\Model\Table\SpecialsTable $Specials
 * @method \App\Model\Entity\Special[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpecialsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $specials = $this->paginate($this->Specials);

        $this->set(compact('specials'));
    }

    /**
     * View method
     *
     * @param string|null $id Special id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $special = $this->Specials->get($id, [
            'contain' => ['Laboratories'],
        ]);

        $this->set(compact('special'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $special = $this->Specials->newEmptyEntity();
        if ($this->request->is('post')) {
            $special = $this->Specials->patchEntity($special, $this->request->getData());
            if ($this->Specials->save($special)) {
                $this->Flash->success(__('The special has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The special could not be saved. Please, try again.'));
        }
        $laboratories = $this->Specials->Laboratories->find('list', ['limit' => 200]);
        $this->set(compact('special', 'laboratories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Special id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $special = $this->Specials->get($id, [
            'contain' => ['Laboratories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $special = $this->Specials->patchEntity($special, $this->request->getData());
            if ($this->Specials->save($special)) {
                $this->Flash->success(__('The special has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The special could not be saved. Please, try again.'));
        }
        $laboratories = $this->Specials->Laboratories->find('list', ['limit' => 200]);
        $this->set(compact('special', 'laboratories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Special id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $special = $this->Specials->get($id);
        if ($this->Specials->delete($special)) {
            $this->Flash->success(__('The special has been deleted.'));
        } else {
            $this->Flash->error(__('The special could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function receive()
    {
        $specials = $this->Specials->newEmptyEntity();
        $data = $this->request->getData();
        $data = $this->Specials->patchEntity($specials, $data);

        $this->Specials->save($data);

        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($specials));

            return $response;

    }
}
