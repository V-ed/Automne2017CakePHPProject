<?php
/**
* CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
* @link      https://cakephp.org CakePHP(tm) Project
* @since     0.2.9
* @license   https://opensource.org/licenses/mit-license.php MIT License
*/
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;
use Cake\ORM\TableRegistry;

/**
* Application Controller
*
* Add your application-wide methods in the class below, your controllers
* will inherit them.
*
* @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
*/
class AppController extends Controller
{
	
	/**
	* Initialization hook method.
	*
	* Use this method to add common initialization code like loading components.
	*
	* e.g. `$this->loadComponent('Security');`
	*
	* @return void
	*/
	public function initialize()
	{
		parent::initialize();
		
		$dReferer = $this->referer('/', true);
		$dRequestReferer = $this->request->referer('/', true);
		$dEnvReferer = env('HTTP_REFERER');
		
		$this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');
		$this->loadComponent('Auth', [
			'authorize' => ['Controller'],
			// 'unauthorizedRedirect' => true
		]);
		
		I18n::locale($this->request->session()->read('Config.language'));
		
		/*
		* Enable the following components for recommended CakePHP security settings.
		* see https://book.cakephp.org/3.0/en/controllers/components/security.html
		*/
		//$this->loadComponent('Security');
		//$this->loadComponent('Csrf');
		
		$loggedUser = $this->getLoggedUser();
		$this->set(compact('loggedUser'));
	}
	
	/**
	* Before render callback.
	*
	* @param \Cake\Event\Event $event The beforeRender event.
	* @return \Cake\Http\Response|null|void
	*/
	public function beforeRender(Event $event)
	{
		// Note: These defaults are just to get started quickly with development
		// and should not be used in production. You should instead set "_serialize"
		// in each action as required.
		if (!array_key_exists('_serialize', $this->viewVars) &&
		in_array($this->response->type(), ['application/json', 'application/xml']) ) {
			$this->set('_serialize', true);
		}
	}
	
	public function beforeFilter(Event $event) {
		$this->Auth->allow(['index', 'view', 'home', 'changelang']);
	}
	
	public function isAuthorized($user) {
		// Non-users can't access content requiring authorization.
		if($user == null){
			return false;
		}
		// Admin can access every action, others can't.
		return $user->isAdmin;
	}
	
	protected function getLoggedUser(){
		$authUserID = $this->Auth->user('id');
		
		if($authUserID == null){
			return null;
		}
		else{
			$users = TableRegistry::get('Users');
			$loggedUser = $users->get($authUserID);
			
			if($this->Auth->user() != $loggedUser){
				$this->Auth->setUser($loggedUser);
			}
			
			return $loggedUser;
		}
	}
	
	public function changeLang($lang = 'en_US') {
		I18n::setLocale($lang);
		$this->request->session()->write('Config.language', $lang);
		return $this->redirect($this->request->referer());
	}
	
}
