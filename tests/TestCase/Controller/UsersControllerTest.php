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
		$this->get('/Users');

        $this->assertResponseOk();
		
		$this->get('/Users/index');

        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test register (add) method
     *
     * @return void
     */
    public function testRegister()
    {
		$this->get('/Users/register');

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
    public function testEdit()
    {
		$link = '/Users/edit/1';
		$this->get($link);

    	$this->assertRedirect('/users/login?redirect=' . urlencode($link));
    }
	
	public function testEditLoggedIn()
	{
		$this->session([
	        'Auth' => [
	            'User' => [
	                'id' => 1,
					'isAdmin' => 0,
	                'username' => 'testing'
	            ]
	        ]
	    ]);
		
		$this->get('/Users/edit/1');
		
    	$this->assertResponseOk();
	}

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
