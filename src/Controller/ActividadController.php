<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Actividad Controller
 *
 * @property \App\Model\Table\ActividadTable $Actividad
 * @method \App\Model\Entity\Actividad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActividadController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Trabajadores'],
        ];
        $response = $this->paginate($this->Actividad);

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));  
    }

    /**
     * View method
     *
     * @param string|null $id Actividad id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $response = $this->Actividad->get($id, [
            'contain' => ['Trabajadores'],
        ]);

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));  
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $bodyjs = file_get_contents('php://input');
        $body = json_decode($bodyjs,true);
        $actividad = $this->Actividad->newEmptyEntity();
        if ($this->request->is('post')) {
            $actividad = $this->Actividad->patchEntity($actividad, $body);
            if ($this->Actividad->save($actividad)) {
                $this->Flash->success(__('The persona has been saved.'));
                $response = [
                                'status' => 'success',
                                'message' => 'propietario Agregada',
                                'id' => $actividad->id,
                        ];

                //return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('The persona could not be saved. Please, try again.'));
            $response = [
                         'status' => 'error',
                         'message' => 'Fallo al guardar',
                             ];
            }
        }
        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response)); 
    }


    /**
     * Edit method
     *
     * @param string|null $id Actividad id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $actividad = $this->Actividad->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $actividad = $this->Actividad->patchEntity($actividad, $this->request->getData());
            if ($this->Actividad->save($actividad)) {
                $this->Flash->success(__('The actividad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The actividad could not be saved. Please, try again.'));
        }
        $trabajadores = $this->Actividad->Trabajadores->find('list', ['limit' => 200])->all();
        $this->set(compact('actividad', 'trabajadores'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Actividad id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $actividad = $this->Actividad->get($id);
        if ($this->Actividad->delete($actividad)) {
            $this->Flash->success(__('The actividad has been deleted.'));
            $response = [
                                'status' => 'success',
                                'message' => 'actividad eliminada',
                                
                        ];
        } else {
            $this->Flash->error(__('The actividad could not be deleted. Please, try again.'));
            $response = [
                                'status' => 'error',
                                'message' => 'no eliminado',
                                
                        ];
        }

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }





}
