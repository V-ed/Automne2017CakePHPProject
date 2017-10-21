<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\Routing\Router;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.evidence_items',
        'app.officers',
        'app.officer_ranks',
        'app.files'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
		$this->get(Router::url(
			[
				'controller' => 'users'
			]
		));

        $this->assertResponseOk();
		
		$this->get(Router::url(
			[
				'controller' => 'users',
				'action' => 'index'
			]
		));

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
		$this->get(Router::url(
			[
				'controller' => 'users',
				'action' => 'view',
				1
			]
		));

        $this->assertResponseOk();
    }

    /**
     * Test register (add) method
     *
     * @return void
     */
    public function testRegister()
    {
		$this->get(Router::url(
			[
				'controller' => 'users',
				'action' => 'register'
			]
		));

        $this->assertResponseOk();
    }
	
	public function testRegisterWithData(){
		$data = [
			'firstName' => 'Mina',
			'lastName' => 'Larson',
			'username' => 'docmuziz',
			'password' => 'BA9tW+bT'
		];
		
		$this->post(Router::url(
			[
				'controller' => 'users',
				'action' => 'register'
			]
		), $data);
		
		$expected = "Flash/success";
		$this->assertSession($expected, 'Flash.flash.0.element');
	}

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEditNoAuth()
    {
		$this->get(Router::url(
			[
				'controller' => 'Users',
				'action' => 'edit',
				1
			]
		));

    	$this->assertRedirect('/users/login?redirect=' . urlencode('/users/edit/1'));
    }
	
	public function testEditLoggedInAsWrongUser()
	{
		$this->session([
	        'Auth' => [
	            'User' => [
					'id' => 1,
					'isAdmin' => false,
		            'username' => 'loznogin',
		            'lastName' => 'Dean',
		            'firstName' => 'Marcus'
	            ]
	        ]
	    ]);
		
		$this->get(Router::url(
			[
				'controller' => 'users',
				'action' => 'edit',
				1
			]
		));
		
		$this->markTestSkipped('Please visit https://github.com/V-ed/Automne2017CakePHPProject/issues/2#issuecomment-338435067 for more information on why this test is skipped.');
		$expected = "Flash/error";
		$this->assertSession($expected, 'Flash.flash.0.element');
		$this->assertRedirect(['controller' => 'Users', 'action' => 'index']);
	}
	
	public function testEditLoggedInAsAdmin()
	{
		$this->session([
	        'Auth' => [
	            'User' => [
					'id' => 2,
					'isAdmin' => true,
		            'username' => 'loznogin',
		            'lastName' => 'Dean',
		            'firstName' => 'Marcus'
	            ]
	        ]
	    ]);
		
		$this->get(Router::url(
			[
				'controller' => 'users',
				'action' => 'edit',
				1
			]
		));
		
    	$this->assertResponseOk();
	}
	
	public function testEditChangeAsAdmin()
	{
		$this->session([
	        'Auth' => [
	            'User' => [
					'id' => 1,
					'isAdmin' => true,
					'firstName' => 'Marcus',
		            'lastName' => 'Dean',
					'username' => 'loznogin',
	            ]
	        ]
	    ]);
		
		$this->get(Router::url(
			[
				'controller' => 'users',
				'action' => 'register'
			]
		));
		$this->assertResponseOk();
		
		$data = [
			'firstName' => 'Mina',
			'lastName' => 'Larson',
			'username' => 'docmuziz',
			'password' => 'BA9tW+bT'
		];
		
		$this->post(Router::url(
			[
				'controller' => 'users',
				'action' => 'edit',
				1
			]
		), $data);
		
		$expected = "Flash/success";
		$this->assertSession($expected, 'Flash.flash.0.element');
		$this->assertRedirect(['controller' => 'Users', 'action' => 'index']);
	}
	
	public function testEditChangeAsLoggedUser()
	{
		$this->session([
	        'Auth' => [
	            'User' => [
					'id' => 1,
					'isAdmin' => false,
					'firstName' => 'Marcus',
		            'lastName' => 'Dean',
					'username' => 'loznogin',
	            ]
	        ]
	    ]);
		
		$this->get(Router::url(
			[
				'controller' => 'users',
				'action' => 'edit',
				1
			]
		));
		$this->assertResponseOk();
		
		$data = [
			'firstName' => 'Mina',
			'lastName' => 'Larson',
			'username' => 'docmuziz',
			'password' => 'BA9tW+bT'
		];
		
		$this->post(Router::url(
			[
				'controller' => 'users',
				'action' => 'edit',
				1
			]
		), $data);
		
		$expected = "Flash/success";
		$this->assertSession($expected, 'Flash.flash.0.element');
		$this->assertRedirect(['controller' => 'Users', 'action' => 'index']);
	}

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDeleteNoAuth()
    {
		$this->get(Router::url(
			[
				'controller' => 'users',
				'action' => 'delete',
				1
			]
		));

    	$this->assertRedirect('/users/login?redirect=' . urlencode('/users/delete/1'));
    }
	
	public function testDeleteAsWrongUser()
	{
		$this->session([
			'Auth' => [
				'User' => [
					'id' => 1,
					'isAdmin' => false,
					'firstName' => 'Marcus',
					'lastName' => 'Dean',
					'username' => 'loznogin',
				]
			]
		]);
		
		$this->post(Router::url(
			[
				'controller' => 'users',
				'action' => 'delete',
				666
			]
		));
		
		$this->markTestSkipped('Please visit https://github.com/V-ed/Automne2017CakePHPProject/issues/2#issuecomment-338435067 for more information on why this test is skipped.');
		$expected = "Flash/error";
		$this->assertSession($expected, 'Flash.flash.0.element');
		$this->assertRedirect(['controller' => 'Users', 'action' => 'index']);
	}
	
	public function testDeleteAsAdmin()
	{
		$this->session([
	        'Auth' => [
	            'User' => [
					'id' => 1,
					'isAdmin' => true,
					'firstName' => 'Marcus',
		            'lastName' => 'Dean',
					'username' => 'loznogin',
	            ]
	        ]
	    ]);
		
		$this->post(Router::url(
			[
				'controller' => 'users',
				'action' => 'delete',
				666
			]
		));
		
		$expected = "Flash/success";
		$this->assertSession($expected, 'Flash.flash.0.element');
		$this->assertRedirect(['controller' => 'Users', 'action' => 'index']);
	}
	
	public function testDeleteAsLoggedUser()
	{
		$this->session([
	        'Auth' => [
	            'User' => [
					'id' => 666,
					'isAdmin' => false,
					'firstName' => 'Marcus',
		            'lastName' => 'Dean',
					'username' => 'loznogin',
	            ]
	        ]
	    ]);
		
		$this->post(Router::url(
			[
				'controller' => 'users',
				'action' => 'delete',
				666
			]
		));
		
		$expected = "Flash/success";
		$this->assertSession($expected, 'Flash.flash.0.element');
		$this->assertRedirect(['controller' => 'Users', 'action' => 'index']);
	}
	
}
