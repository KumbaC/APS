<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * MedicalsAntecedents Controller
 *
 * @property \App\Model\Table\SurgicalsAntecedentsTable $SurgicalsAntecedents
 * @method \App\Model\Entity\SurgicalsAntecedent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SurgicalsAntecedentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $surgicalsAntecedents = $this->paginate($this->SurgicalsAntecedents);

        $this->set(compact('surgicalsAntecedents'));
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
        $surgicalsAntecedent = $this->SurgicalsAntecedents->get($id, [
            'contain' => ['ClinicalHistories'],
        ]);

        $this->set(compact('surgicalsAntecedent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $surgicalsAntecedent = $this->SurgicalsAntecedents->newEmptyEntity();
        if ($this->request->is('post')) {
            $surgicalsAntecedent = $this->SurgicalsAntecedents->patchEntity($surgicalsAntecedent, $this->request->getData());
            if ($this->SurgicalsAntecedents->save($surgicalsAntecedent)) {
                $this->Flash->success(__('Los antecedentes quirurgicos fueron guardados.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicals antecedent could not be saved. Please, try again.'));
        }
        //$clinicalHistories = $this->SurgicalsAntecedents->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('surgicalsAntecedent'));
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
        $surgicalsAntecedent= $this->SurgicalsAntecedents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $surgicalsAntecedent = $this->SurgicalsAntecedents->patchEntity($surgicalsAntecedent, $this->request->getData());
            if ($this->SurgicalsAntecedents->save($surgicalsAntecedent)) {
                $this->Flash->warning(__('EL ANTECEDENTE QUIRURGICO FUE ACTUALIZADO CON EXITO.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medicals antecedent could not be saved. Please, try again.'));
        }
        //$clinicalHistories = $this->SurgicalsAntecedents->ClinicalHistories->find('list', ['limit' => 200]);
        $this->set(compact('surgicalsAntecedent'));
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
        $surgicalsAntecedent = $this->SurgicalsAntecedents->get($id);
        if ($this->SurgicalsAntecedents->delete($surgicalsAntecedent)) {
            $this->Flash->success(__('Los antecedentes quirurgicos fueron eliminados.'));
        } else {
            $this->Flash->error(__('Intente de nuevo, no se puedo borrar los antecedentes.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function receive()
    {
        $surgicalsAntecedent = $this->SurgicalsAntecedents->newEmptyEntity();
        $data = $this->request->getData();
        $data = $this->SurgicalsAntecedents->patchEntity($surgicalsAntecedent, $data);

        $this->SurgicalsAntecedents->save($data);

        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($surgicalsAntecedent));

            return $response;

    }
}
