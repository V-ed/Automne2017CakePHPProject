<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Routing\Router;
use Cake\Utility\Text;
use Cake\Mailer\Email;
// use Cake\View\Helper\HtmlHelper;

/**
* UserConfirmations Model
*
* @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
*
* @method \App\Model\Entity\UserConfirmation get($primaryKey, $options = [])
* @method \App\Model\Entity\UserConfirmation newEntity($data = null, array $options = [])
* @method \App\Model\Entity\UserConfirmation[] newEntities(array $data, array $options = [])
* @method \App\Model\Entity\UserConfirmation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
* @method \App\Model\Entity\UserConfirmation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
* @method \App\Model\Entity\UserConfirmation[] patchEntities($entities, array $data, array $options = [])
* @method \App\Model\Entity\UserConfirmation findOrCreate($search, callable $callback = null, $options = [])
*/
class UserConfirmationsTable extends Table
{
	
	/**
	* Initialize method
	*
	* @param array $config The configuration for the Table.
	* @return void
	*/
	public function initialize(array $config)
	{
		parent::initialize($config);
		
		$this->setTable('user_confirmations');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');
		
		$this->belongsTo('Users', [
			'foreignKey' => 'user_id'
		]);
	}
	
	/**
	* Default validation rules.
	*
	* @param \Cake\Validation\Validator $validator Validator instance.
	* @return \Cake\Validation\Validator
	*/
	public function validationDefault(Validator $validator)
	{
		$validator
		->integer('id')
		->allowEmpty('id');
		
		$validator
		->scalar('uuid')
		->allowEmpty('uuid');
		
		$validator
		->boolean('is_confirmed')
		->allowEmpty('is_confirmed');
		
		return $validator;
	}
	
	/**
	* Returns a rules checker object that will be used for validating
	* application integrity.
	*
	* @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
	* @return \Cake\ORM\RulesChecker
	*/
	public function buildRules(RulesChecker $rules)
	{
		$rules->add($rules->existsIn(['user_id'], 'Users'));
		
		return $rules;
	}
	
	public function newConfirmation($user)
	{
		$newConfirmation = $this->newEntity();
		
		$confData = [
			'uuid' => Text::uuid(),
			'user_id' => $user->id
		];
		
		$newConfirmation = $this->patchEntity($newConfirmation, $confData);
		
		$newConfirmation = $this->save($newConfirmation);
		
		$this->sendEmailToUser($user, $newConfirmation->uuid);
		
		return $newConfirmation;
	}
	
	private function sendEmailToUser($user, $uuid)
	{
		$confirmLink = Router::url(['controller' => 'Users', 'action' => 'confirm', $uuid], true);
		
		$company = 'Evidocs';
		
		$emailSubject = $company . ' | ' . __('Please confirm your account!');
		
		$textHeader = __('Thank you for registering to {0}, {1}!', $company, $user->full_name);
		
		$textBody = __('To complete your account activation, please click on the following link to finish your account activation : {0}', $confirmLink);
		
		$textFooter = __('Thank you again for registering to our website and we hope you\'ll have a nice stay!');
		
		$mailContent = $textHeader . "\n\n" . $textBody . "\n\n" . $textFooter;
		
		$email = new Email('default');
		$email
		->to($user->email)
		->subject($emailSubject)
		->send($mailContent);
	}
	
	public function confirmUUID($uuid)
	{
		// $this->get
	}
	
}
