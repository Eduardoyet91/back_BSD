<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Comprobante Controller
 *
 * @property \App\Model\Table\ComprobanteTable $Comprobante
 * @method \App\Model\Entity\Comprobante[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComprobanteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orden'],
        ];
        $comprobante = $this->paginate($this->Comprobante);

        $this->set(compact('comprobante'));
    }

    /**
     * View method
     *
     * @param string|null $id Comprobante id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $response = $this->Comprobante->get($id, [
            'contain' => ['Orden'],
        ]);

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

     public function byorden($id = null)
    {
        $response = $this->Comprobante->find('all',array('conditions' => array( 'Comprobante.orden_id' => $id)));

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
        
        $comprobante = $this->Comprobante->newEmptyEntity();
        if ($this->request->is('post')) {
            $comprobante = $this->Comprobante->patchEntity($comprobante, $body);
            if ($this->Comprobante->save($comprobante)) {
                $response = [
                                'status' => 'success',
                                'message' => 'factura agregada',
                                'id' => $comprobante->id,
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
     * @param string|null $id Comprobante id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comprobante = $this->Comprobante->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comprobante = $this->Comprobante->patchEntity($comprobante, $this->request->getData());
            if ($this->Comprobante->save($comprobante)) {
                $this->Flash->success(__('The comprobante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comprobante could not be saved. Please, try again.'));
        }
        $orden = $this->Comprobante->Orden->find('list', ['limit' => 200])->all();
        $this->set(compact('comprobante', 'orden'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Comprobante id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comprobante = $this->Comprobante->get($id);
        if ($this->Comprobante->delete($comprobante)) {
            $this->Flash->success(__('The comprobante has been deleted.'));
        } else {
            $this->Flash->error(__('The comprobante could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
