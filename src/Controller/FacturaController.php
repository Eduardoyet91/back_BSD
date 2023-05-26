<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Factura Controller
 *
 * @property \App\Model\Table\FacturaTable $Factura
 * @method \App\Model\Entity\Factura[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FacturaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //$this->paginate = [
          //  'contain' => ['Propietarios'],
        //];
        //$response = $this->paginate($this->Factura);
        $response = $this->Factura->find('all',['limit => 100']);


         return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));  
    }

    /**
     * View method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $response = $this->Factura->get($id, [
            'contain' => ['Propietarios'],
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

        $factura = $this->Factura->newEmptyEntity();
        if ($this->request->is('post')) {
            $factura = $this->Factura->patchEntity($factura, $body);
            if ($this->Factura->save($factura)) {
                $response = [
                                'status' => 'success',
                                'message' => 'factura agregada',
                                'factura' => $factura,
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
     * Edit method
     *
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $bodyjs = file_get_contents('php://input');
        $body = json_decode($bodyjs,true);

        $factura = $this->Factura->get($body['id'], [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $factura = $this->Factura->patchEntity($factura, $body);
            if ($this->Factura->save($factura)) {
                $this->Flash->success(__('The factura has been saved.'));
$response = [
                                'status' => 'success',
                                'message' => 'propietario modificado',
                                'id' => $factura->id,
                                
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
     * @param string|null $id Factura id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $factura = $this->Factura->get($id);
        if ($this->Factura->delete($factura)) {
            $this->Flash->success(__('The factura has been deleted.'));
        } else {
            $this->Flash->error(__('The factura could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
