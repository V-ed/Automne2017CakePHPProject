<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
* Officers Controller
*
* @property \App\Model\Table\OfficersTable $Officers
*
* @method \App\Model\Entity\Officer[] paginate($object = null, array $settings = [])
*/
class OfficersController extends AppController
{
    
    /**
    * Index method
    *
    * @return \Cake\Http\Response|void
    */
    public function index()
    {
        $this->paginate = [
            'contain' => ['OfficerRanks', 'Users']
        ];
        $officers = $this->paginate($this->Officers);
        
        $this->set(compact('officers'));
        $this->set('_serialize', ['officers']);
    }
    
    /**
    * View method
    *
    * @param string|null $id Officer id.
    * @return \Cake\Http\Response|void
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function view($id = null)
    {
        $officer = $this->Officers->get($id, [
            'contain' => ['OfficerRanks', 'Users', 'EvidenceItems']
        ]);
        
        $this->set('officer', $officer);
        $this->set('_serialize', ['officer']);
    }
    
    /**
    * Add method
    *
    * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    */
    public function add()
    {
        
        $officerRanks = $this->Officers->OfficerRanks->find('list', ['limit' => 200])->toArray();
        
        if (count($officerRanks) == 0) {
            $this->redirect($this->referer());
            $this->Flash->error(__('No officer rank is in the database, no officer can be added.'));
        } else {
            
            $officer = $this->Officers->newEntity();
            if ($this->request->is('post')) {
                $officer = $this->Officers->patchEntity($officer, $this->request->getData());
                if ($this->Officers->save($officer)) {
                    $this->Flash->success(__('The officer has been saved.'));
                    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The officer could not be saved. Please, try again.'));
            }
            $officerRanks = $this->Officers->OfficerRanks->find('list', ['limit' => 200]);
            $users = $this->Officers->Users->find('list', ['limit' => 200]);
            $this->set(compact('officer', 'officerRanks', 'users'));
            $this->set('_serialize', ['officer']);
            
        }
        
    }
    
    /**
    * Edit method
    *
    * @param string|null $id Officer id.
    * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Network\Exception\NotFoundException When record not found.
    */
    public function edit($id = null)
    {
        $officer = $this->Officers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $officer = $this->Officers->patchEntity($officer, $this->request->getData());
            if ($this->Officers->save($officer)) {
                $this->Flash->success(__('The officer has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The officer could not be saved. Please, try again.'));
        }
        $officerRanks = $this->Officers->OfficerRanks->find('list', ['limit' => 200]);
        $users = $this->Officers->Users->find('list', ['limit' => 200]);
        $this->set(compact('officer', 'officerRanks', 'users'));
        $this->set('_serialize', ['officer']);
    }
    
    /**
    * Delete method
    *
    * @param string|null $id Officer id.
    * @return \Cake\Http\Response|null Redirects to index.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $officer = $this->Officers->get($id);
        if ($this->Officers->delete($officer)) {
            $this->Flash->success(__('The officer has been deleted.'));
        } else {
            $this->Flash->error(__('The officer could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    public function isAuthorized($user) {
        $officers = $this->Officers->find('all')->toArray();
        foreach ($officers as $officer) {
            if ($user['id'] === $officer->user_id) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }
    
    // public function beforeFilter(Event $event){
    //     parent::beforeFilter($event);
    //     // $this->Auth->allow(['index', 'view', 'home', 'changelang']);
    //     // if ($loggedUser['is_admin']) {
    //     //     # code...
    //     // } else {
    //     //     $this->Auth->deny();
    //     // }
    // }
    
}
