<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Orden Controller
 *
 * @property \App\Model\Table\OrdenTable $Orden
 * @method \App\Model\Entity\Orden[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdenController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $response = $this->Orden->query("SELECT * FROM `orden` WHERE tipo = 'Insumo';");

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    /**
     * View method
     *
     * @param string|null $id Orden id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $response = $this->Orden->get($id, [
            'contain' => [],
        ]);

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function insumoOrd($id = null)
    {
        
        $response = $this->Orden->find('all',array('conditions' => array( 'Orden.status' => 'Completada','Orden.tipo' => 'Insumo')));
        //$response= $this->Orden->query("SELECT * FROM orden WHERE Orden.tipo = 'Insumo';");

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }



    public function ordenAdmin($id = null)
    {
        
        $response = $this->Orden->find('all',array('conditions' => array( 'Orden.status' => 'Procesada')));

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    public function ordenPagos($id = null)
    {
        
        $response = $this->Orden->find('all',array('conditions' => array( 'Orden.status' => 'Pendiente')));

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

        $orden = $this->Orden->newEmptyEntity();
        if ($this->request->is('post')) {
            $orden = $this->Orden->patchEntity($orden, $body);
            if ($this->Orden->save($orden)) {
                $response = [
                                'status' => 'success',
                                'message' => 'factura agregada',
                                'id' => $orden->id,
                        ];

                
            }else{
            
            $response = [
                         'status' => 'error',
                         'message' => 'Fallo al modificar',
                         
                             ];
            }
        }

        $response = [
                         'status' => 'error',
                         'message' => 'Fallo al modificar',
                         
                             ];
        
         return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orden id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bodyjs = file_get_contents('php://input');
        $body = json_decode($bodyjs,true);
        $orden = $this->Orden->get($body['id'], [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orden = $this->Orden->patchEntity($orden, $body);
            if ($this->Orden->save($orden)) {
                $this->Flash->success(__('The orden has been saved.'));
$response = [
                                'status' => 'success',
                                'message' => 'propietario modificado',
                                'id' => $orden->id,
                                
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
     * @param string|null $id Orden id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orden = $this->Orden->get($id);
        if ($this->Orden->delete($orden)) {
            $this->Flash->success(__('The orden has been deleted.'));
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
