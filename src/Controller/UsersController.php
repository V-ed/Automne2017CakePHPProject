<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*
* @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
*/
class UsersController extends AppController
{
	
	/**
	* Index method
	*
	* @return \Cake\Http\Response|void
	*/
	public function index()
	{
		$users = $this->paginate($this->Users);
		
		$this->set(compact('users'));
		$this->set('_serialize', ['users']);
	}
	
	/**
	* View method
	*
	* @param string|null $id User id.
	* @return \Cake\Http\Response|void
	* @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	*/
	public function view($id = null)
	{
		$user = $this->Users->get($id, [
			'contain' => ['EvidenceItems', 'Officers']
		]);
		
		$this->set('user', $user);
		$this->set('_serialize', ['user']);
	}
	
	/**
	* Edit method
	*
	* @param string|null $id User id.
	* @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	* @throws \Cake\Network\Exception\NotFoundException When record not found.
	*/
	public function edit($id = null)
	{
		$user = $this->Users->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->getData());
			if ($this->Users->save($user)) {
				
				$loggedUser = parent::getLoggedUser();
				if ($user['id'] == $loggedUser['id']) {
					$this->Flash->success(__('Your data has been saved!'));
					$this->Auth->setUser($user);
					$this->set('loggedUser', $user);
				}
				else{
					$this->Flash->success(sprintf(__('%s\'s data has been saved!'), $user['username']));
				}
				
				return $this->redirect(['action' => 'index']);
				
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
		$this->set(compact('user'));
		$this->set('_serialize', ['user']);
	}
	
	/**
	* Delete method
	*
	* @param string|null $id User id.
	* @return \Cake\Http\Response|null Redirects to index.
	* @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	*/
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		
		return $this->redirect(['action' => 'index']);
	}
	
	/**
	* Register method
	*
	* @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	*/
	public function register()
	{
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			$user = $this->Users->newUser($user, $this->request->getData());
			if ($user) {
				$this->Flash->success(__('The user has been saved.'));
				
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The user could not be saved. Please, try again.'));
		}
		$this->set(compact('user'));
		$this->set('_serialize', ['user']);
	}
	
	public function confirm($uuid)
	{
		$userConfirmations = TableRegistry::get('UserConfirmations');
		
		$confirmation = $userConfirmations->find('all')->where(['uuid' => $uuid, 'is_confirmed' => false])->first();
		
		if ($confirmation == null) {
			if($userConfirmations->exists(['uuid' => $uuid])) {
				$this->Flash->error(__('You do not need to confirm again!'));
			}
			else {
				$this->Flash->error(__('Please stop trying to break our website... :)'));
			}
		}
		else {
			$confirmation = $userConfirmations->patchEntity($confirmation, ['is_confirmed' => true]);
			$userConfirmations->save($confirmation);
			
			$this->Flash->success(__('Thank you for confirming your email! You can now access this website in it\'s entirety.'));
		}
		
		return $this->redirect(['controller' => 'Home']);
	}
	
	public function login()
	{
		
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				
				if(isset($this->request->query['redirect'])){
					return $this->redirect($this->request->query['redirect']); //TODO fix query redirect
				}
				else {
					return $this->redirect(['controller' => $this->request->data['controller'], 'action' => $this->request->data['action']]);
				}
			}
			$this->Flash->error(__('Invalid username or password, try again'));
		}
		else {
			$refer_url = $this->referer('/', true);
			$referer = Router::parse($refer_url);
			$this->set(compact('referer'));
		}
		
	}
	
	public function logout()
	{
		$this->Auth->logout();
		return $this->redirect($this->referer());
	}
	
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['register', 'logout', 'login', 'confirm']);
	}
	
	public function isAuthorized($user) {
		
		if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
			$userId = (int)$this->request->getParam('pass.0');
			if ($userId == $user['id']) {
				return true;
			}
		}
		
		$debug = $this->referer();
		
		return parent::isAuthorized($user);
	}
	
}
