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
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');

        if ($session->read('Auth.User.role_id') == 1) {

            $key = $this->request->getQuery('key');
            if($key){
                    $query = $this->Doctors->find('all')->where(['doctors.cedula like' => '%'. $key. '%']);
            }else{
                   $query = $this->Doctors;
            }

            $this->paginate = [
                'contain' => ['Specialties', 'Turns'],
            ];


            $doctors = $this->Auth->user('id');
            $doctors = $this->paginate($query, ['limit' => '5']);

        $this->set(compact('doctors'));

        }else{

            $this->Flash->error(__('No tiene permisos para acceder a esta página.'));
            return $this->redirect(['controller' => 'UsersInternals', 'action' => 'index']);

        }
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
            'contain' => ['Specialties', 'UsersInternals', 'Turns', 'ClinicalHistories', 'Prescriptions', 'Quotes'],
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

            $specialties = $this->Doctors->Specialties->find('list', ['limit' => 200]);
            $usersInternals = $this->Doctors->Users->find('list', ['limit' => 200]);
            $turns = $this->Doctors->Turns->find('list', ['limit' => 200]);
            $this->set(compact('doctor', 'specialties', 'usersInternals', 'turns'));


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
            'contain' => [],
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
        $usersInternals = $this->Doctors->UsersInternals->find('list', ['limit' => 200]);
        $turns = $this->Doctors->Turns->find('list', ['limit' => 200]);
        $this->set(compact('doctor', 'specialties', 'usersInternals', 'turns'));

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
        $session = $this->request->getSession();
        $session = $this->request->getAttribute('session');
        if ($session->read('Auth.User.role_id') == 1) {

        $this->request->allowMethod(['post', 'delete']);
        $doctor = $this->Doctors->get($id);
        if ($this->Doctors->delete($doctor)) {
            $this->Flash->success(__('El doctor fue eliminado con exito. '));
        } else {
            $this->Flash->error(__('Imposible eliminar el registro, intente mas tarde.'));
        }

        return $this->redirect(['action' => 'index']);

        }else {
        $this->Flash->error(__('No tienes acceso para entrar.'));
        $this->redirect(['controller' => 'Pages', 'action' => 'display']);
        }
    }
}
