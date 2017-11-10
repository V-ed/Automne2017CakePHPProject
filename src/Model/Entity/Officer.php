<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Officer Entity
 *
 * @property int $id
 * @property string $email
 * @property int $officer_rank_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\OfficerRank $officer_rank
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\EvidenceItem[] $evidence_items
 */
class Officer extends Entity
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
	
	protected function _getRank()
	{
		return TableRegistry::get('Officers')->getRankOfOfficer($this->_properties['id']);
	}
	
}
