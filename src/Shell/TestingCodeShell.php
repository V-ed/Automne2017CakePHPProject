<?php

namespace App\Shell;

use Cake\Console\Shell;
use Cake\Mailer\Email;
use Cake\Routing\Router;
use Cake\Utility\Text;

class TestingCodeShell extends Shell
{
	
	public function main()
	{
		
		$linebreak = '<br />';
		
		$confirmLink = Router::url(['controller' => 'Users', 'action' => 'confirm', Text::uuid()], true);
		
		$confirmLink = '<a href="' . $confirmLink . '">' . __('activate your account!') . '</a>';
		
		$company = 'Evidocs';
		
		$emailSubject = $company . ' | ' . __('Please confirm your account!');
		
		$textHeader = __('Thank you for registering to {0}, {1}!', $company, 'Full name Test');
		
		$textBody = __('To complete your account activation, please click on the following link to finish your account activation : {0}', $confirmLink);
		
		$textFooter = __('Thank you again for registering to our website and we hope you\'ll have a nice stay!');
		
		$mailContent = $textHeader . $linebreak . $linebreak . $textBody . $linebreak . $linebreak . $textFooter;
		
		$email = new Email('default');
		$email
		->to('guillaumemarcoux@gmail.com')
		->subject($emailSubject)
		->emailFormat('html')
		->send($mailContent);
		
		$this->out('Message sent!');
		
	}
	
}
