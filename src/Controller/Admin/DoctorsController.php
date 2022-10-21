<?php
declare(strict_types=1);


namespace App\Controller\Admin;

use App\Controller\AppController;
/**
 * Doctors Controller
 *
 * @property \App\Model\Table\DoctorsTable $Doctors
 * @method \App\Model\Entity\Doctor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DoctorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Specialties', 'UsersDoctors'],
        ];
        $doctors = $this->paginate($this->Doctors);

        $this->set(compact('doctors'));
        /* $doctor = $this->Doctors->newEmptyEntity();
        $data = $this->request->getData('Doctor.cupos');
        //$doctor = $this->Doctors->patchEntity($doctor, $data);

        $this->Doctors->save($data);

        $response = $this->response->withType('application/json')
            ->withStringBody(json_encode($doctor));

            return $response; */

    }

    /**
     * View method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $doctor = $this->Doctors->get($id, [
            'contain' => ['Specialties', 'UsersDoctors', 'ClinicalHistories', 'Prescriptions', 'Quotes'],
        ]);

        $this->set(compact('doctor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');

        if ($session->read('Auth.User.role_id') == 1) {
            $doctor = $this->Doctors->newEmptyEntity();
            if ($this->request->is('post')) {
                $doctor = $this->Doctors->patchEntity($doctor, $this->request->getData());
                if (!$doctor->getErrors()) {

                    $firma = $this->request->getData('firma_file');
                    $sello = $this->request->getData('sello_file');

                    $name = $firma->getClientFilename();
                    $names = $sello->getClientFilename();

                    $fileName = $firma->getClientFilename();
                    $fileNames = $sello->getClientFilename();

                    $targetPath = WWW_ROOT.'img'.DS.$fileName;
                    $targetPaths = WWW_ROOT.'img'.DS.$fileNames;

                    if ($name && $names) {
                        $firma->moveTo($targetPath);
                        $sello->moveTo($targetPaths);

                        $doctor->firma = $name;
                        $doctor->sello = $names;
                    }
                }



                if ($this->Doctors->save($doctor)) {
                    $this->Flash->success(__('El doctor fue agregado con exito.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Imposible agregar el doctor, intente mas tarde.'));
            }

            $specialties = $this->Doctors->Specialties->find('list', ['limit' => 200])->order(['id' => 'asc']);
            $users = $this->Doctors->UsersDoctors->find('list', ['limit' => 200]);
            //$turns = $this->Doctors->Turns->find('list', ['limit' => 200]);
            $this->set(compact('doctor', 'specialties', 'users'));


            }else{
                $this->Flash->error(__('No tiene permisos para acceder a esta página.'));
                return $this->redirect(['controller' => 'Pages', 'action' => 'display']);
            }

    }

    /**
     * Edit method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');
        if ($session->read('Auth.User.role_id') == 1) {

        $doctor = $this->Doctors->get($id, [
            //'contain' => ['Turns'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $doctor = $this->Doctors->patchEntity($doctor, $this->request->getData());
            if (!$doctor->getErrors()) {

                $firma = $this->request->getData('firma_file');
                $sello = $this->request->getData('sello_file');

                $name = $firma->getClientFilename();
                $names = $sello->getClientFilename();

                $fileName = $firma->getClientFilename();
                $fileNames = $sello->getClientFilename();

                $targetPath = WWW_ROOT.'img'.DS.$fileName;
                $targetPaths = WWW_ROOT.'img'.DS.$fileNames;

                if ($name /* && $names */) {
                    $firma->moveTo($targetPath);
                    //$sello->moveTo($targetPaths);

                    $doctor->firma = $name;
                    //$doctor->sello = $names;
                }elseif($names){
                    $sello->moveTo($targetPaths);

                    $doctor->sello = $names;
                }
            }


            if ($this->Doctors->save($doctor)) {
                $this->Flash->success(__('La información del doctor fue actualizada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Imposible actualiar la información del doctor.'));
        }
        $specialties = $this->Doctors->Specialties->find('list', ['limit' => 200]);
        $users = $this->Doctors->UsersDoctors->find('list', ['limit' => 200]);
        //$turns = $this->Doctors->Turns->find('list', ['limit' => 200]);
        $this->set(compact('doctor', 'specialties', 'users'));

        }else{
            $this->Flash->error(__('No tiene permisos para acceder a esta página.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'display']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Doctor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $doctor = $this->Doctors->get($id);
        if ($this->Doctors->delete($doctor)) {
            $this->Flash->success(__('The doctor has been deleted.'));
        } else {
            $this->Flash->error(__('The doctor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
