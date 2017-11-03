<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
* OfficerRanks Controller
*
* @property \App\Model\Table\OfficerRanksTable $OfficerRanks
*
* @method \App\Model\Entity\OfficerRank[] paginate($object = null, array $settings = [])
*/
class OfficerRanksController extends AppController
{
    
    /**
    * Index method
    *
    * @return \Cake\Http\Response|void
    */
    public function index()
    {
        $officerRanks = $this->paginate($this->OfficerRanks);
        
        $this->set(compact('officerRanks'));
        $this->set('_serialize', ['officerRanks']);
    }
    
    /**
    * View method
    *
    * @param string|null $id Officer Rank id.
    * @return \Cake\Http\Response|void
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function view($id = null)
    {
        $officerRank = $this->OfficerRanks->get($id, [
            'contain' => []
        ]);
        
        $this->set('officerRank', $officerRank);
        $this->set('_serialize', ['officerRank']);
    }
    
    /**
    * Add method
    *
    * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    */
    public function add()
    {
        $officerRank = $this->OfficerRanks->newEntity();
        if ($this->request->is('post')) {
            $officerRank = $this->OfficerRanks->patchEntity($officerRank, $this->request->getData());
            if ($this->OfficerRanks->save($officerRank)) {
                $this->Flash->success(__('The officer rank has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The officer rank could not be saved. Please, try again.'));
        }
        $this->set(compact('officerRank'));
        $this->set('_serialize', ['officerRank']);
    }
    
    /**
    * Edit method
    *
    * @param string|null $id Officer Rank id.
    * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Network\Exception\NotFoundException When record not found.
    */
    public function edit($id = null)
    {
        $officerRank = $this->OfficerRanks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $officerRank = $this->OfficerRanks->patchEntity($officerRank, $this->request->getData());
            if ($this->OfficerRanks->save($officerRank)) {
                $this->Flash->success(__('The officer rank has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The officer rank could not be saved. Please, try again.'));
        }
        $this->set(compact('officerRank'));
        $this->set('_serialize', ['officerRank']);
    }
    
    /**
    * Delete method
    *
    * @param string|null $id Officer Rank id.
    * @return \Cake\Http\Response|null Redirects to index.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $officerRank = $this->OfficerRanks->get($id);
        if ($this->OfficerRanks->delete($officerRank)) {
            $this->Flash->success(__('The officer rank has been deleted.'));
        } else {
            $this->Flash->error(__('The officer rank could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
    
    public function beforeFilter(Event $event)
    {
        if ($this->Auth->user('is_admin')) {
            $this->Auth->allow();
        }
        else {
            $this->Auth->deny();
            $this->Flash->error(__('You must be an admin to access that page!'));
        }
    }
    
}
