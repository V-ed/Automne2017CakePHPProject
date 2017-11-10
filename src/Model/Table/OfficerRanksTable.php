<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OfficerRanks Model
 *
 * @property |\Cake\ORM\Association\HasMany $Officers
 *
 * @method \App\Model\Entity\OfficerRank get($primaryKey, $options = [])
 * @method \App\Model\Entity\OfficerRank newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OfficerRank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OfficerRank|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OfficerRank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OfficerRank[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OfficerRank findOrCreate($search, callable $callback = null, $options = [])
 */
class OfficerRanksTable extends Table
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

        $this->setTable('officer_ranks');
        $this->setDisplayField('rank_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Officers', [
            'foreignKey' => 'officer_rank_id'
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
            ->scalar('rank_code')
            ->requirePresence('rank_code', 'create')
            ->notEmpty('rank_code');

        $validator
            ->scalar('rank_name')
            ->requirePresence('rank_name', 'create')
            ->notEmpty('rank_name');

        $validator
            ->scalar('rank_description')
            ->allowEmpty('rank_description');

        return $validator;
    }
}
