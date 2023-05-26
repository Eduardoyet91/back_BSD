<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Client;
use Cake\Http\ServerRequest;
use Cake\Datasource\ConnectionManager;



/**
 * Insumo Controller
 *
 * @property \App\Model\Table\InsumoTable $Insumo
 * @method \App\Model\Entity\Insumo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InsumoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $response = $this->paginate($this->Insumo);

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response)); 
    }

     public function solicitado($id = null)
    {
        $response = $this->Insumo->find('all',array('conditions' => array( 'Insumo.status' => 'Solicitado')));

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));
    }

    /**
     * View method
     *
     * @param string|null $id Insumo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $response = $this->Insumo->get($id, [
            'contain' => [],
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
        $insumo = $this->Insumo->newEmptyEntity();
        if ($this->request->is('post')) {
            $insumo = $this->Insumo->patchEntity($insumo, $this->request->getData());
            if ($this->Insumo->save($insumo)) {
                $this->Flash->success(__('The insumo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The insumo could not be saved. Please, try again.'));
        }
        $this->set(compact('insumo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Insumo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bodyjs = file_get_contents('php://input');
        $body = json_decode($bodyjs,true);

        $insumo = $this->Insumo->get($body['id'], [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $insumo = $this->Insumo->patchEntity($insumo, $body);
            if ($this->Insumo->save($insumo)) {
                $this->Flash->success(__('The insumo has been saved.'));
$response = [
                                'status' => 'success',
                                'message' => 'propietario modificado',
                                'id' => $insumo->id,
                                
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
     * @param string|null $id Insumo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $insumo = $this->Insumo->get($id);
        if ($this->Insumo->delete($insumo)) {
            $this->Flash->success(__('The insumo has been deleted.'));
        } else {
            $this->Flash->error(__('The insumo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
