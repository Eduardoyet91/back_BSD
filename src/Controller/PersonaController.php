<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Client;
use Cake\Http\ServerRequest;
use Cake\Event\EventInterface;

/**
 * Persona Controller
 *
 * @property \App\Model\Table\PersonaTable $Persona
 * @method \App\Model\Entity\Persona[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

     public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }



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
        
        $response = $this->Persona->find('all',['limit => 100']);

        $resonse = $this->Persona->query("SELECT * FROM persona AS Persona WHERE id = '234567';");
            return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));  


    }

    /**
     * View method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
         $response = $this->Persona->find('all', array('conditions' => array( 'Persona.id' => $id)));

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

        $existeRegistro = $this->Persona->exists(['id' => $body['id']]);

if ($existeRegistro) {
    $response = [
                         'status' => 'existe',
                         'message' => 'Fallo al guardar',
                             ];
} else {
    $persona = $this->Persona->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $persona = $this->Persona->patchEntity($persona, $body);

            if ($this->Persona->save($persona)) {
                $this->Flash->success(__('The persona has been saved.'));
                $response = [
                                'status' => 'success',
                                'message' => 'Persona Agregada',
                                'id' => $persona->id,
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
}



        
        //$response = $persona;
        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response)); 
    }

    /**
     * Edit method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $bodyjs = file_get_contents('php://input');
        $body = json_decode($bodyjs,true);

        $persona = $this->Persona->get($body['id'], [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $persona = $this->Persona->patchEntity($persona, $body);
            if ($this->Persona->save($persona)) {
                $response = [
                                'status' => 'success',
                                'message' => 'Persona Modificada',
                                'id' => $persona->id,
                        ];

                //return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('The persona could not be saved. Please, try again.'));
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
     * @param string|null $id Persona id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $persona = $this->Persona->get($id);
        if ($this->Persona->delete($persona)) {
            $this->Flash->success(__('The trabajadore has been deleted.'));
            $response = [
                                'status' => 'success',
                                'message' => 'persona eliminado',
                                
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
            ->withStringBody(json_encode($response));
    }
}
