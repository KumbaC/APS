<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Beneficiary Controller
 *
 * @property \App\Model\Table\BeneficiaryTable $Beneficiary
 * @method \App\Model\Entity\Beneficiary[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BeneficiaryController extends AppController
{


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Persons', 'Kins', 'Genders'],
        ];
        $beneficiary = $this->Beneficiary->find('all');

        $this->set(compact('beneficiary'), $this->paginate($beneficiary, ['limit' => '5']));
    }

    /**
     * View method
     *
     * @param string|null $id Beneficiary id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $beneficiary = $this->Beneficiary->get($id, [
            'contain' => ['Persons', 'Kins', 'Genders'],
        ]);
        $this->viewBuilder()->setOptions([
            'pdfConfig',
             [
                'orientation' => 'portrait',
                'filename' => 'CarnetAPS_' . $id
             ]
        ]);
        $this->set(compact('beneficiary'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $beneficiary = $this->Beneficiary->newEmptyEntity();
        if ($this->request->is('post')) {
            $beneficiary = $this->Beneficiary->patchEntity($beneficiary, $this->request->getData());
            $beneficiary->person_id = $id;
            if ($this->Beneficiary->save($beneficiary)) {
                $this->Flash->success(__('El beneficiario se guardo con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The beneficiary could not be saved. Please, try again.'));
        }
        $persons = $this->Beneficiary->Persons->find('list');
        $kins = $this->Beneficiary->Kins->find('list');
        $genders = $this->Beneficiary->Genders->find('list');
        $this->set(compact('beneficiary', 'persons', 'kins', 'genders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Beneficiary id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $beneficiary = $this->Beneficiary->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $beneficiary = $this->Beneficiary->patchEntity($beneficiary, $this->request->getData());
            if ($this->Beneficiary->save($beneficiary)) {
                $this->Flash->success(__('El beneficiario fue actualizado con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The beneficiary could not be saved. Please, try again.'));
        }
        $persons = $this->Beneficiary->Persons->find('list', ['limit' => 200]);
        $kins = $this->Beneficiary->Kins->find('list', ['limit' => 200]);
        $genders = $this->Beneficiary->Genders->find('list', ['limit' => 200]);
        $this->set(compact('beneficiary', 'persons', 'kins', 'genders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Beneficiary id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $beneficiary = $this->Beneficiary->get($id);
        if ($this->Beneficiary->delete($beneficiary)) {
            $this->Flash->success(__('El beneficiario fue eliminado con exito.'));
        } else {
            $this->Flash->error(__('The beneficiary could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}