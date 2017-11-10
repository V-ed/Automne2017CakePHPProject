<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
* Officers Model
*
* @property \App\Model\Table\OfficerRanksTable|\Cake\ORM\Association\BelongsTo $OfficerRanks
* @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
* @property \App\Model\Table\EvidenceItemsTable|\Cake\ORM\Association\HasMany $EvidenceItems
*
* @method \App\Model\Entity\Officer get($primaryKey, $options = [])
* @method \App\Model\Entity\Officer newEntity($data = null, array $options = [])
* @method \App\Model\Entity\Officer[] newEntities(array $data, array $options = [])
* @method \App\Model\Entity\Officer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
* @method \App\Model\Entity\Officer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
* @method \App\Model\Entity\Officer[] patchEntities($entities, array $data, array $options = [])
* @method \App\Model\Entity\Officer findOrCreate($search, callable $callback = null, $options = [])
*/
class OfficersTable extends Table
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
		
		$this->setTable('officers');
		$this->setDisplayField('email');
		$this->setPrimaryKey('id');
		
		$this->belongsTo('OfficerRanks', [
			'foreignKey' => 'officer_rank_id'
		]);
		$this->belongsTo('Users', [
			'foreignKey' => 'user_id'
		]);
		$this->hasMany('EvidenceItems', [
			'foreignKey' => 'officer_id'
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
		$rules->add($rules->isUnique(['email']));
		$rules->add($rules->existsIn(['officer_rank_id'], 'OfficerRanks'));
		$rules->add($rules->existsIn(['user_id'], 'Users'));
		
		return $rules;
	}
	
	public function getRankOfOfficer($officerId)
	{
		$officer = $this->get($officerId);
		
		try {
			return $this->OfficerRanks->get($officer->officer_rank_id);
		} catch (Cake\Datasource\Exception\RecordNotFoundException $e) {
			return null;
		}
	}
	
}
