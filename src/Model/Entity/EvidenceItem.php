<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EvidenceItem Entity
 *
 * @property int $id
 * @property string $description
 * @property string $origin
 * @property bool $is_sealed
 * @property bool $is_deleted
 * @property int $officer_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Officer $officer
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\File[] $files
 */
class EvidenceItem extends Entity
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
}
