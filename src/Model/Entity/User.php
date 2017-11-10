<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

/**
* User Entity
*
* @property int $id
* @property bool $is_admin
* @property string $first_name
* @property string $last_name
* @property string $username
* @property string $password
* @property \Cake\I18n\FrozenTime $created
* @property \Cake\I18n\FrozenTime $modified
* @property string $email
*
* @property \App\Model\Entity\UserConfirmation $user_confirmation
* @property \App\Model\Entity\EvidenceItem[] $evidence_items
* @property \App\Model\Entity\Officer[] $officers
*/
class User extends Entity
{
	
	/**
	* Fields that can be mass assigned using newEntity() or patchEntity().
	*
	* Note that when '*' is set to true, this allows all unspecified fields to
	* be mass assigned. For security purposes, it is advised to set '*' to false
	* (or remove it), and explicitly make individual fields accessible as needed.
	*
	* @var array
	*/
	protected $_accessible = [
		'*' => true,
		'id' => false
	];
	
	/**
	* Fields that are excluded from JSON versions of the entity.
	*
	* @var array
	*/
	protected $_hidden = [
		'password'
	];
	
	protected function _setPassword($password)
	{
		if (strlen($password) > 0) {
			return (new DefaultPasswordHasher)->hash($password);
		}
	}
	
	protected function _getFullName()
	{
		return $this->_properties['first_name'] . ' ' . $this->_properties['last_name'];
	}
	
	protected function _getIsConfirmed()
	{
		$isConfirmed = TableRegistry::get('Users')->isUserEmailConfirmed($this->_properties['id']);
		
		return $isConfirmed;
	}
	
	protected function _getConfirmation()
	{
		$confirmation = TableRegistry::get('Users')->getConfirmationOfUser($this->_properties['id']);
		
		return $confirmation;
	}
	
	protected function _getIsOfficer()
	{
		return TableRegistry::get('Users')->isUserAnOfficer($this->_properties['id']);
	}
	
	protected function _getAssociatedOfficer()
	{
		return TableRegistry::get('Users')->getAssociatedOfficerOfUser($this->_properties['id']);
	}
	
}
