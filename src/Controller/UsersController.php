<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;

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
				
				$loggedUser = $this->getLoggedUser();
				if ($user->id == $loggedUser->id) {
					$this->Flash->success(__('Your data has been saved!'));
					$this->Auth->setUser($user);
					$this->set('loggedUser', $user);
				}
				else{
					$this->Flash->success(__('{0}\'s data has been saved!', $user->username));
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
		$this->loadComponent('CakeCaptcha.Captcha', [
			'captchaConfig' => 'ExampleCaptcha'
		]);
		
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			
			// validate the user-entered Captcha code
			$isHuman = captcha_validate($this->request->data['CaptchaCode']);
			
			// clear previous user input, since each Captcha code can only be validated once
			unset($this->request->data['CaptchaCode']);
			
			if ($isHuman) {
				$user = $this->Users->newUser($user, $this->request->getData());
				if ($user) {
					$this->sendEmailToUser($user, $user->confirmation);
					
					$this->Flash->success(__('The user has been saved. Go check under your email ({0}) to activate your account!', $user->email));
					
					return $this->redirect(['action' => 'index']);
				}
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			} else {
				$this->Flash->error(__('Captcha test failed. Please try again.'));
			}
			
		}
		$this->set(compact('user'));
		$this->set('_serialize', ['user']);
	}
	
	private function sendEmailToUser($user, $userConfirmation)
	{
		$paragraph = '<br /><br />';
		
		$company = 'Evidocs';
		
		$emailSubject = $company . ' | ' . __('Please confirm your account!');
		
		$textHeader = __('Thank you for registering to {0}, {1}!', $company, $user->full_name);
		
		$confirmLink = Router::url(['controller' => 'Users', 'action' => 'confirm', $userConfirmation->uuid], true);
		$confirmLink = '<a href="' . $confirmLink . '">' . __('activate your account!') . '</a>';
		$textBody = __('To complete your account activation, please click on the following link : {0}', $confirmLink);
		
		$textFooter = __('Thank you again for registering to our website and we hope you\'ll have a nice stay!');
		
		$mailContent = $textHeader . $paragraph . $textBody . $paragraph . $textFooter;
		
		$email = new Email('default');
		$email
		->to($user->email)
		->subject($emailSubject)
		->emailFormat('html')
		->send($mailContent);
	}
	
	public function confirm($uuid)
	{
		$confirmation = $this->Users->UserConfirmations->find('all')->where(['uuid' => $uuid])->first();
		
		if ($confirmation == null) {
			throw new NotFoundException(__('The unique identifier provided ({0}) does not exist.', $uuid));
		}
		else {
			if ($confirmation->is_confirmed) {
				$this->Flash->error(__('You do not need to confirm again!'));
			}
			else {
				$confirmation = $this->Users->UserConfirmations->patchEntity($confirmation, ['is_confirmed' => true]);
				$this->Users->UserConfirmations->save($confirmation);
				
				$this->Flash->success(__('Thank you for confirming your email! You can now access this website in it\'s entirety.'));
			}
		}
		
		return $this->redirect(['controller' => 'Home']);
	}
	
	public function login()
	{
		
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				
				if (isset($this->request->query['redirect'])) {
					return $this->redirect($this->request->query('redirect')); //TODO fix query redirect
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
			if ($userId == $user->id) {
				return true;
			}
		}
		
		$debug = $this->referer();
		
		return parent::isAuthorized($user);
	}
	
}
