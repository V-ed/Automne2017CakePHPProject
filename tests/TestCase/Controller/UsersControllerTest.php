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
        $url = Router::url(['controller' => 'users']);
        $urlWithAction = Router::url(['controller' => 'users', 'action' => 'index']);
        
        $this->assertEquals($url, $urlWithAction);
        
        $this->get($url);
        
        $this->assertResponseOk();
    }
    
    /**
    * Test view method
    *
    * @return void
    */
    public function testView()
    {
        $url = Router::url(['controller' => 'users', 'action' => 'view', 1]);
        
        $this->get($url);
        
        $this->assertResponseOk();
    }
    
    public function testViewNotExisting()
    {
        $url = Router::url(['controller' => 'users', 'action' => 'view', 1000]);
        $this->get($url);
        
        $this->markTestSkipped('Please visit https://github.com/V-ed/Automne2017CakePHPProject/issues/2#issuecomment-338435067 for more information on why this test is skipped.');
        $expected = "Flash/error";
        $this->assertSession($expected, 'Flash.flash.0.element');
        $this->assertRedirect(['controller' => 'users', 'action' => 'index']);
    }
    
    /**
    * Test register (add) method
    *
    * @return void
    */
    public function testRegister()
    {
        $url = Router::url(['controller' => 'users', 'action' => 'register']);
        
        $this->get($url);
        
        $this->assertResponseOk();
    }
    
    public function testRegisterWithData(){
        $data = [
            'firstName' => 'Mina',
            'lastName' => 'Larson',
            'username' => 'docmuziz',
            'password' => 'BA9tW+bT'
        ];
        
        $url = Router::url(['controller' => 'users', 'action' => 'register']);
        
        $this->post($url, $data);
        
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
        $url = Router::url(['controller' => 'users', 'action' => 'edit', 1]);
        
        $this->get($url);
        
        $this->assertRedirect(Router::url(['controller' => 'users', 'action' => 'login', '?' => ['redirect' => $url]]));
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
        
        $urlIndex = Router::url(['controller' => 'users']);
        $this->get($urlIndex);
        
        $url = Router::url(['controller' => 'users', 'action' => 'edit', 2]);
        
        $this->get($url);
        
        $this->markTestSkipped('Please visit https://github.com/V-ed/Automne2017CakePHPProject/issues/2#issuecomment-338435067 for more information on why this test is skipped.');
        $expected = "Flash/error";
        $this->assertSession($expected, 'Flash.flash.0.element');
        $this->assertRedirect(['controller' => 'users', 'action' => 'index']);
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
        
        $url = Router::url(['controller' => 'users', 'action' => 'edit', 1]);
        
        $this->get($url);
        
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
        
        $url = Router::url(['controller' => 'users', 'action' => 'edit', 1]);
        
        $this->get($url);
        $this->assertResponseOk();
        
        $data = [
            'firstName' => 'Mina',
            'lastName' => 'Larson',
            'username' => 'docmuziz',
            'password' => 'BA9tW+bT'
        ];
        
        $this->post($url, $data);
        
        $expected = "Flash/success";
        $this->assertSession($expected, 'Flash.flash.0.element');
        $this->assertRedirect(['controller' => 'users', 'action' => 'index']);
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
        
        $url = Router::url(['controller' => 'users', 'action' => 'edit', 1]);
        
        $this->get($url);
        $this->assertResponseOk();
        
        $data = [
            'firstName' => 'Mina',
            'lastName' => 'Larson',
            'username' => 'docmuziz',
            'password' => 'BA9tW+bT'
        ];
        
        $this->post($url, $data);
        
        $expected = "Flash/success";
        $this->assertSession($expected, 'Flash.flash.0.element');
        $this->assertRedirect(['controller' => 'users', 'action' => 'index']);
    }
    
    /**
    * Test delete method
    *
    * @return void
    */
    public function testDeleteNoAuth()
    {
        $url = Router::url(['controller' => 'users', 'action' => 'delete', 1]);
        
        $this->get($url);
        
        $this->assertRedirect(Router::url(['controller' => 'users', 'action' => 'login', '?' => ['redirect' => $url]]));
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
        
        $url = Router::url(['controller' => 'users', 'action' => 'delete', 666]);
        
        $this->post($url);
        
        $this->markTestSkipped('Please visit https://github.com/V-ed/Automne2017CakePHPProject/issues/2#issuecomment-338435067 for more information on why this test is skipped.');
        $expected = "Flash/error";
        $this->assertSession($expected, 'Flash.flash.0.element');
        $this->assertRedirect(['controller' => 'users', 'action' => 'index']);
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
        
        $url = Router::url(['controller' => 'users', 'action' => 'delete', 666]);
        
        $this->post($url);
        
        $expected = "Flash/success";
        $this->assertSession($expected, 'Flash.flash.0.element');
        $this->assertRedirect(['controller' => 'users', 'action' => 'index']);
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
        
        $url = Router::url(['controller' => 'users', 'action' => 'delete', 666]);
        
        $this->post($url);
        
        $expected = "Flash/success";
        $this->assertSession($expected, 'Flash.flash.0.element');
        $this->assertRedirect(['controller' => 'users', 'action' => 'index']);
    }
    
}
