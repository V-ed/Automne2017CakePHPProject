<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
* Users Model
*
* @property \App\Model\Table\EvidenceItemsTable|\Cake\ORM\Association\HasMany $EvidenceItems
* @property \App\Model\Table\OfficersTable|\Cake\ORM\Association\HasMany $Officers
* @property \App\Model\Table\UserConfirmationsTable|\Cake\ORM\Association\HasMany $UserConfirmations
*
* @method \App\Model\Entity\User get($primaryKey, $options = [])
* @method \App\Model\Entity\User newEntity($data = null, array $options = [])
* @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
* @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
* @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
* @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
* @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
*
* @mixin \Cake\ORM\Behavior\TimestampBehavior
*/
class UsersTable extends Table
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
		
		$this->setTable('users');
		$this->setDisplayField('username');
		$this->setPrimaryKey('id');
		
		$this->addBehavior('Timestamp');
		
		$this->hasMany('EvidenceItems', [
			'foreignKey' => 'user_id'
		]);
		$this->hasMany('Officers', [
			'foreignKey' => 'user_id'
		]);
		$this->hasMany('UserConfirmations', [
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
		->allowEmpty('id', 'create');
		
		$validator
		->boolean('is_admin')
		->allowEmpty('is_admin');
		
		$validator
		->scalar('first_name')
		->requirePresence('first_name', 'create')
		->notEmpty('first_name');
		
		$validator
		->scalar('last_name')
		->requirePresence('last_name', 'create')
		->notEmpty('last_name');
		
		$validator
		->scalar('username')
		->requirePresence('username', 'create')
		->notEmpty('username');
		
		$validator
		->scalar('password')
		->requirePresence('password', 'create')
		->notEmpty('password');
		
		$validator
		->email('email')
		->requirePresence('email', 'create')
		->notEmpty('email');
		
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
		$rules->add($rules->isUnique(['username']));
		$rules->add($rules->isUnique(['email']));
		
		return $rules;
	}
	
	public function newUser($user, $data)
	{
		
		$user = $this->patchEntity($user, $data);
		$user = $this->save($user);
		
		if ($user) {
			$conf = $this->UserConfirmations->newConfirmation($user);
			
			if ($conf) {
				return $user;
			}
			else {
				return false;
			}
		}
		else {
			return $user;
		}
		
	}
	
	public function getConfirmationOfUser($userId)
	{
		$userConfirmations = TableRegistry::get('UserConfirmations');
		
		$confirmation = $userConfirmations->find('all')->where(['user_id' => $userId])->first();
		
		return $confirmation;
	}
	
	public function isUserEmailConfirmed($userId)
	{
		$confirmation = $this->getConfirmationOfUser($userId);
		
		if ($confirmation == null) {
			return false;
		}
		else {
			return $confirmation->is_confirmed;
		}
	}
	
}
