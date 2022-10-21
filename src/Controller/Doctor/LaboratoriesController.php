<?php
declare(strict_types=1);

namespace App\Controller\Doctor;

use App\Controller\Doctor\AppController;

/**
 * Laboratories Controller
 * @property \App\Model\Table\LaboratoriesTable $Laboratories
 * @method \App\Model\Entity\Laboratory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LaboratoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ClinicalHistories'=>['Persons', 'Beneficiary', 'Doctors'], 'Hematologies', 'Immunology', 'Parasitologies', 'Biochemistry', 'Specials', 'Urinalysis'],
        ];

        $laboratories = $this->paginate($this->Laboratories);

        $this->set(compact('laboratories'));
    }

    /**
     * View method
     *
     * @param string|null $id Laboratory id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $laboratories = $this->Laboratories->get($id, [
            'contain' => ['ClinicalHistories'=>['Persons' => 'Genders', 'Beneficiary' => 'Genders', 'Doctors'], 'Hematologies', 'Immunology', 'Parasitologies', 'Biochemistry', 'Specials', 'Urinalysis'],
        ]);

        $this->viewBuilder()->setOption(
            'pdfConfig',
            [
                'orientation' => 'landscape',
                'title' => 'Laboratorio',
                'filename' => 'Solicitud de Laboratorio_' . $id,
                'margin' => [
                    'bottom' => 0,
                    'left' => 50,
                    'right' => 0,
                    'top' => 4
                ],
            ]
        );

        $this->set(compact('laboratories'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $laboratory = $this->Laboratories->newEmptyEntity();
        if ($this->request->is('post')) {
            $laboratory = $this->Laboratories->patchEntity($laboratory, $this->request->getData());
            $laboratory->clinical_history_id = $id;

            if ($this->Laboratories->save($laboratory)) {
                $this->Flash->success(__('La solicitud de examen de laboratorio fue guardada con exito. '));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La solicitud no pudo ser guardada con exito.'));
        }
        $urinalysis = $this->Laboratories->Urinalysis->find('list', ['limit' => 200]);
        $specials = $this->Laboratories->Specials->find('list', ['limit' => 200]);
        $parasitologies = $this->Laboratories->Parasitologies->find('list', ['limit' => 200]);
        $hematologies = $this->Laboratories->Hematologies->find('list', ['limit' => 200]);
        $immunology = $this->Laboratories->Immunology->find('list');
        $biochemistry = $this->Laboratories->Biochemistry->find('list', ['limit' => 200]);
        $clinicalHistories = $this->Laboratories->ClinicalHistories->find('list');
        $this->set(compact('laboratory', 'urinalysis', 'specials', 'parasitologies', 'hematologies', 'immunology', 'biochemistry', 'clinicalHistories'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Laboratories id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $laboratory = $this->Laboratories->get($id, [
            'contain' => ['ClinicalHistories', 'Hematologies', 'Immunology', 'Parasitologies', 'Biochemistry', 'Specials', 'Urinalysis'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $laboratory = $this->Laboratories->patchEntity($laboratory, $this->request->getData());
            if ($this->Laboratories->save($laboratory)) {
                $this->Flash->success(__('The laboratory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The laboratory could not be saved. Please, try again.'));
        }
        $urinalysis = $this->Laboratories->Urinalysis->find('list', ['limit' => 200]);
        $specials = $this->Laboratories->Specials->find('list', ['limit' => 200]);
        $parasitologies = $this->Laboratories->Parasitologies->find('list', ['limit' => 200]);
        $hematologies = $this->Laboratories->Hematologies->find('list', ['limit' => 200]);
        $immunology = $this->Laboratories->Immunology->find('list');
        $biochemistry = $this->Laboratories->Biochemistry->find('list', ['limit' => 200]);
        $clinicalHistories = $this->Laboratories->ClinicalHistories->find('list');
        $this->set(compact('laboratory', 'urinalysis', 'specials', 'parasitologies', 'hematologies', 'immunology', 'biochemistry', 'clinicalHistories'));

    }

    /**
     * Delete method
     *
     * @param string|null $id Laboratory id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $laboratory = $this->Laboratories->get($id);
        if ($this->Laboratories->delete($laboratory)) {
            $this->Flash->success(__('The laboratory has been deleted.'));
        } else {
            $this->Flash->error(__('The laboratory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
