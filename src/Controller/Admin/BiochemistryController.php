<?php
declare(strict_types=1);

namespace App\Controller\Doctor;

use App\Controller\AppController;

/**
 * Biochemistry Controller
 *
 * @property \App\Model\Table\BiochemistryTable $Biochemistry
 * @method \App\Model\Entity\Biochemistry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BiochemistryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $biochemistry = $this->paginate($this->Biochemistry);

        $this->set(compact('biochemistry'));
    }

    /**
     * View method
     *
     * @param string|null $id Biochemistry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $biochemistry = $this->Biochemistry->get($id, [
            'contain' => ['Laboratories'],
        ]);

        $this->set(compact('biochemistry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $biochemistry = $this->Biochemistry->newEmptyEntity();
        if ($this->request->is('post')) {
            $biochemistry = $this->Biochemistry->patchEntity($biochemistry, $this->request->getData());
            if ($this->Biochemistry->save($biochemistry)) {
                $this->Flash->success(__('The biochemistry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The biochemistry could not be saved. Please, try again.'));
        }
        $laboratories = $this->Biochemistry->Laboratories->find('list', ['limit' => 200]);
        $this->set(compact('biochemistry', 'laboratories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Biochemistry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $biochemistry = $this->Biochemistry->get($id, [
            'contain' => ['Laboratories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $biochemistry = $this->Biochemistry->patchEntity($biochemistry, $this->request->getData());
            if ($this->Biochemistry->save($biochemistry)) {
                $this->Flash->success(__('The biochemistry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The biochemistry could not be saved. Please, try again.'));
        }
        $laboratories = $this->Biochemistry->Laboratories->find('list', ['limit' => 200]);
        $this->set(compact('biochemistry', 'laboratories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Biochemistry id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $biochemistry = $this->Biochemistry->get($id);
        if ($this->Biochemistry->delete($biochemistry)) {
            $this->Flash->success(__('The biochemistry has been deleted.'));
        } else {
            $this->Flash->error(__('The biochemistry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function receive()
    {
        $bioquimica = $this->Biochemistry->newEmptyEntity();
        $data = $this->request->getData();
        $data = $this->Biochemistry->patchEntity($bioquimica, $data);

        $this->Biochemistry->save($data);

        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($bioquimica));

            return $response;

    }
}
