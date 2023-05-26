<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Propietarios Controller
 *
 * @property \App\Model\Table\PropietariosTable $Propietarios
 * @method \App\Model\Entity\Propietario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropietariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

public function beforeFilter(\Cake\Event\EventInterface $event){
        parent::beforeFilter($event);  
       
        $this->response = $this->response->cors($this->request)
        ->allowOrigin(['http://localhost:3000'])
        ->allowMethods(['GET', 'POST'])
        ->allowHeaders(['Access-Control-Allow-Headers, Origin, Accept, X-Requested-With,Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, Authorization'])
        //->allowCredentials()
        //->exposeHeaders(['Link']) 
        ->build();
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Persona'],
        ];
        $response = $this->paginate($this->Propietarios);


        
            return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));  

    }

    /**
     * View method
     *
     * @param string|null $id Propietario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $response= $this->Propietarios->get($id, [
            'contain' => ['Persona'],
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
        $propietario = $this->Propietarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $propietario = $this->Propietarios->patchEntity($propietario, $body);
            if ($this->Propietarios->save($propietario)) {
                $this->Flash->success(__('The persona has been saved.'));
                $response = [
                                'status' => 'success',
                                'message' => 'propietario Agregada',
                                'id' => $propietario->id,
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
     * @param string|null $id Propietario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
  



public function edit($id = null)
    {
        $bodyjs = file_get_contents('php://input');
        $body = json_decode($bodyjs,true);

        $propietario = $this->Propietarios->get($body['id'], [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $propietario = $this->Propietarios->patchEntity($propietario,$body);
            if ($this->Propietarios->save($propietario)) {
                $this->Flash->success(__('The trabajadore has been saved.'));
                $response = [
                                'status' => 'success',
                                'message' => 'propietario modificado',
                                'id' => $propietario->id,
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
     * @param string|null $id Propietario id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
  

 public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'delete']);
        $propietario  = $this->Propietarios->get($id);
        if ($this->Propietarios->delete($propietario )) {
            $this->Flash->success(__('The propietario has been deleted.'));
            $response = [
                                'status' => 'success',
                                'message' => 'propietario eliminado',
                                
                        ];
        } else {
            $this->Flash->error(__('The propietario could not be deleted. Please, try again.'));
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