<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ficha Controller
 *
 * @property \App\Model\Table\FichaTable $Ficha
 * @method \App\Model\Entity\Ficha[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FichaController extends AppController
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
        $response = $this->paginate($this->Ficha);



        
            return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($response));  

    }

    /**
     * View method
     *
     * @param string|null $id Ficha id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $response = $this->Ficha->get($id, [
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

        $ficha = $this->Ficha->newEmptyEntity();
        if ($this->request->is('post')) {
            $ficha = $this->Ficha->patchEntity($ficha, $body);
            if ($this->Ficha->save($ficha)) {
                $response = [
                                'status' => 'success',
                                'message' => 'ficha agregada',
                                'id' => $ficha->id,
                        ];

                
            }else{
            
            $response = [
                         'status' => 'error',
                         'message' => 'Fallo al modificar',
                         'body' => $body,
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
     * @param string|null $id Ficha id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $bodyjs = file_get_contents('php://input');
        $body = json_decode($bodyjs,true);
        $ficha = $this->Ficha->get($body['id'], [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ficha = $this->Ficha->patchEntity($ficha, $body);
            if ($this->Ficha->save($ficha)) {
                $this->Flash->success(__('The trabajadore has been saved.'));
                $response = [
                                'status' => 'success',
                                'message' => 'propietario modificado',
                                'id' => $ficha->id,
                                'entrada' => $body['entrada'],
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
     * @param string|null $id Ficha id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ficha = $this->Ficha->get($id);
        if ($this->Ficha->delete($ficha)) {
            $this->Flash->success(__('The ficha has been deleted.'));
        } else {
            $this->Flash->error(__('The ficha could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
