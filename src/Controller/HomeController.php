<?php
namespace App\Controller;

use App\Controller\AppController;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*
* @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
*/
class HomeController extends AppController
{
    
    /**
    * Index method
    *
    * @return \Cake\Http\Response|void
    */
    public function index()
    {
        parent::setLang('fr_CA');
    }
    
}
