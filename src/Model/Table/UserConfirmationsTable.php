<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Text;

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
			'user_id' => $user->id,
			'is_confirmed' => false
		];
		
		$newConfirmation = $this->patchEntity($newConfirmation, $confData);
		
		$newConfirmation = $this->save($newConfirmation);
		
		return $newConfirmation;
	}
	
	public function confirmUUID($uuid)
	{
		// $this->get
	}
	
}
