<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EvidenceItems Model
 *
 * @method \App\Model\Entity\EvidenceItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\EvidenceItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EvidenceItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EvidenceItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EvidenceItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EvidenceItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EvidenceItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EvidenceItemsTable extends Table
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

        $this->setTable('evidence_items');
        $this->setDisplayField('id_item');
        $this->setPrimaryKey('id_item');

        $this->addBehavior('Timestamp');
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
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('origin')
            ->requirePresence('origin', 'create')
            ->notEmpty('origin');

        $validator
            ->boolean('is_sealed')
            ->requirePresence('is_sealed', 'create')
            ->notEmpty('is_sealed');

        $validator
            ->boolean('is_deleted')
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');

        $validator
            ->integer('id_officier')
            ->requirePresence('id_officier', 'create')
            ->notEmpty('id_officier');

        return $validator;
    }
}
