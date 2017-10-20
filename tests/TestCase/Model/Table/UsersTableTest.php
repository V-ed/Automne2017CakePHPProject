<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    public $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
		// Table name
		$expected = 'users';
		$result = $this->Users->table();
		$this->assertEquals($expected, $result);
		
		// Associations
		$expected = [
			'evidenceitems',
			'officers'
		];
		$result = $this->Users->associations()->keys();
		$this->assertEquals($expected, $result);
		
		// Timestamp Behavior
		$result = $this->Users->behaviors()->has('Timestamp');
		$this->assertTrue($result);
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $data = [
			'firstName' => 'Isabel',
			'lastName' => 'Morrison',
			'username' => 'newibpimel',
			'password' => 'wEd?P4cU'
		];
		
		$user = $this->Users->newEntity($data);
		
		$this->assertEmpty($user->errors());
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
		$data = [
			'firstName' => 'Isabel',
			'lastName' => 'Morrison',
			'username' => 'acisa',
			'password' => 'wEd?P4cU'
		];
		
		$badUser = $this->Users->newEntity($data);
		
		$result = $this->Users->checkRules($badUser);
        $this->assertFalse($result);

        $expected = [
			'username' => 'acisa',
        ];

        $this->assertEquals($expected, $badUser->invalid());
    }
}
