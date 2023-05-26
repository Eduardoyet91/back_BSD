<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Trabajadores Controller
 *
 * @property \App\Model\Table\TrabajadoresTable $Trabajadores
 * @method \App\Model\Entity\Trabajadore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrabajadoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        
        $this->paginate = [
            'contain' => ['Persona','Actividad'],
        ];
        $response = $this->paginate($this->Trabajadores);


        
            return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));  
        
    }

    /**
     * View method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $response = $this->Trabajadores->get($id, [
            'contain' => ['Persona','Actividad'],
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

       $trabajadore = $this->Trabajadores->newEmptyEntity();
        if ($this->request->is('post')) {
            $trabajadore = $this->Trabajadores->patchEntity($trabajadore, $body);
            if ($this->Trabajadores->save($trabajadore)) {
                $this->Flash->success(__('The persona has been saved.'));
                $response = [
                                'status' => 'success',
                                'message' => 'Trabajador Agregada',
                                'id' => $trabajadore->id,
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
     * @param string|null $id Trabajadore id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $bodyjs = file_get_contents('php://input');
        $body = json_decode($bodyjs,true);
        $trabajadore = $this->Trabajadores->get($body['id'], [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trabajadore = $this->Trabajadores->patchEntity($trabajadore, $body);
            if ($this->Trabajadores->save($trabajadore)) {
                $this->Flash->success(__('The trabajadore has been saved.'));
                $response = [
                                'status' => 'success',
                                'message' => 'propietario modificado',
                                'id' => $trabajadore->id,
                        ];

                
            }else{
            
            $response = [
                         'status' => 'error',
                         'message' => 'Fallo al modificar',
                             ];
            }
        }
        
         return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response)); 
    }


    




    /**
     * Delete method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trabajadore = $this->Trabajadores->get($id);
        if ($this->Trabajadores->delete($trabajadore)) {
            $this->Flash->success(__('The trabajadore has been deleted.'));
            $response = [
                                'status' => 'success',
                                'message' => 'propietario eliminado',
                                
                        ];
        } else {
            $this->Flash->error(__('The trabajadore could not be deleted. Please, try again.'));
            $response = [
                                'status' => 'error',
                                'message' => 'no eliminado',
                                
                        ];
        }

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));;
    }


}






