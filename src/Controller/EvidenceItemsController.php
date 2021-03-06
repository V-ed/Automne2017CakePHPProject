<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
* EvidenceItems Controller
*
* @property \App\Model\Table\EvidenceItemsTable $EvidenceItems
*
* @method \App\Model\Entity\EvidenceItem[] paginate($object = null, array $settings = [])
*/
class EvidenceItemsController extends AppController
{
	
	public function findItems() {
		
		if (!$this->request->is('ajax')) {
			throw new NotFoundException();
		}
		else {
			
			$this->autoRender = false;
			
			$description = $this->request->query['term'];
			
			$results = $this->EvidenceItems->find('all', [
				'conditions' => ['EvidenceItems.description LIKE ' => '%' . $description . '%']
			]);
			
			$resultArr = array();
			foreach ($results as $result) {
				$resultArr[] = ['label' => $result['description'], 'value' => $result['description']];
			}
			
			echo json_encode($resultArr);
			
		}
		
	}
	
	/**
	* Index method
	*
	* @return \Cake\Http\Response|void
	*/
	public function index()
	{
		$this->paginate = [
			'contain' => ['Officers' => ['Users'], 'Files']
		];
		$evidenceItems = $this->paginate($this->EvidenceItems);
		
		$this->set(compact('evidenceItems'));
		$this->set('_serialize', ['evidenceItems']);
	}
	
	/**
	* View method
	*
	* @param string|null $id Evidence Item id.
	* @return \Cake\Http\Response|void
	* @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	*/
	public function view($id = null)
	{
		$evidenceItem = $this->EvidenceItems->get($id, [
			'contain' => ['Officers' => ['Users'], 'Files']
		]);
		
		$this->set('evidenceItem', $evidenceItem);
		$this->set('_serialize', ['evidenceItem']);
	}
	
	/**
	* Add method
	*
	* @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	*/
	public function add()
	{
		
		$officers = $this->EvidenceItems->Officers->find('list', ['limit' => 1])->toArray();
		
		if (count($officers) == 0) {
			$this->redirect($this->referer());
			$this->Flash->error(__('No officer is in the database, no item can be added.'));
		} else {
			
			$evidenceItem = $this->EvidenceItems->newEntity();
			if ($this->request->is('post')) {
				$evidenceItem = $this->EvidenceItems->patchEntity($evidenceItem, $this->request->getData());
				$evidenceItem->user_id = $this->getLoggedUser()->id;
				if ($this->EvidenceItems->save($evidenceItem)) {
					$this->Flash->success(__('The evidence item has been saved.'));
					
					if ($this->request->is('ajax')) {
						$this->index();
						
						return $this->render('/Element/EvidenceItems/index_viewport');
					}
					else {
						return $this->redirect(['action' => 'index']);
					}
				}
				$this->Flash->error(__('The evidence item could not be saved. Please, try again.'));
			}
			
			$officers = $this->EvidenceItems->Officers->find('list', ['limit' => 200, 'contain' => 'Users', 'keyField' => 'id', 'valueField' => function ($officer)
			{
				return __('{0} ({1})', $officer->user->username, $officer->user->full_name);
			}]);
			$users = $this->EvidenceItems->Users->find('list', ['limit' => 200]);
			$this->set(compact('evidenceItem', 'officers', 'users'));
			$this->set('_serialize', ['evidenceItem']);
			
		}
		
	}
	
	/**
	* Edit method
	*
	* @param string|null $id Evidence Item id.
	* @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	* @throws \Cake\Network\Exception\NotFoundException When record not found.
	*/
	public function edit($id = null)
	{
		$evidenceItem = $this->EvidenceItems->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$evidenceItem = $this->EvidenceItems->patchEntity($evidenceItem, $this->request->getData());
			if ($this->EvidenceItems->save($evidenceItem)) {
				$this->Flash->success(__('The evidence item has been saved.'));
				
				if ($this->request->is('ajax')) {
					$this->index();
					
					return $this->render('/Element/EvidenceItems/index_viewport');
				}
				else {
					return $this->redirect(['action' => 'index']);
				}
			}
			$this->Flash->error(__('The evidence item could not be saved. Please, try again.'));
		}
		$officers = $this->EvidenceItems->Officers->find('list', ['limit' => 200, 'contain' => 'Users', 'keyField' => 'id', 'valueField' => 'user.username']);
		$users = $this->EvidenceItems->Users->find('list', ['limit' => 200]);
		$this->set(compact('evidenceItem', 'officers', 'users'));
		$this->set('_serialize', ['evidenceItem']);
	}
	
	/**
	* Delete method
	*
	* @param string|null $id Evidence Item id.
	* @return \Cake\Http\Response|null Redirects to index.
	* @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	*/
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete', 'ajax']);
		$evidenceItem = $this->EvidenceItems->get($id);
		if ($this->EvidenceItems->delete($evidenceItem)) {
			$this->Flash->success(__('The evidence item has been deleted.'));
		} else {
			$this->Flash->error(__('The evidence item could not be deleted. Please, try again.'));
		}
		
		if ($this->request->is('ajax')) {
			$this->index();
			
			return $this->render('/Element/EvidenceItems/index_viewport');
		}
		else {
			return $this->redirect(['action' => 'index']);
		}
	}
	
	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
		$this->Auth->allow(['add', 'findItems']);
	}
	
}
