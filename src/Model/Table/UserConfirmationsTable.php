<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Text;
use Cake\Mailer\Email;

/**
 * UserConfirmations Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
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

        $this->hasMany('Users', [
            'foreignKey' => 'user_confirmation_id'
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
            ->scalar('uuid')
            ->allowEmpty('uuid');

        $validator
            ->boolean('is_confirmed')
            ->allowEmpty('is_confirmed');

        return $validator;
    }
	
	public function newConfirmation($userData)
	{
		$newConfirmation = $this->newEntity();
		
		$confData = [
			'uuid' => Text::uuid()
		];
		
		$newConfirmation = $this->patchEntity($newConfirmation, $confData);
		
		$newConfirmation = $this->save($newConfirmation);
		
		$userData['uuid'] = $newConfirmation->uuid;
		
		$this->sendEmailToUser($userData);
		
		return $newConfirmation->id;
	}
	
	private function sendEmailToUser($userData)
	{
		$email = new Email('default');
        $email
        ->setTo($userData['email'])
        ->setSubject(__('Test mail'))
        ->send(__('This is a test mail'));
	}
	
}
