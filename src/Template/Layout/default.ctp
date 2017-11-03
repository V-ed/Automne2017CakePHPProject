<?php
/**
* CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
* @link          https://cakephp.org CakePHP(tm) Project
* @since         0.10.0
* @license       https://opensource.org/licenses/mit-license.php MIT License
*/

use Cake\Routing\Router;

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= __('Welcome to our site!') ?>
	</title>
	<?= $this->Html->meta('icon') ?>
	
	<?= $this->Html->css('base.css') ?>
	<?= $this->Html->css('cake.css') ?>
	<?= $this->Html->css('custom.css') ?>
	
	<?php
	// In case a view request to load another css file
	$this->fetch('viewStyle');
	?>
	
	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
</head>
<body>
	<nav class="top-bar expanded" data-topbar role="navigation">
		<ul class="title-area large-3 medium-4 columns" id="top-left-bar">
			<li class="name">
				<h1><a href=""><?= $this->fetch('title') ?></a></h1>
			</li>
		</ul>
		<div class="top-bar-section">
			<ul class="left">
				<li><a href="<?= Router::url('/', true) ?>"><?= __('Home') ?></a></li>
				<li><?= $this->Html->link(__('Evidence Items'), ['controller' => 'evidence_items']) ?></li>
				<li><?= $this->Html->link(__('Officers'), ['controller' => 'officers']) ?></li>
				<li><?= $this->Html->link(__('Users'), ['controller' => 'users']) ?></li>
				<?php if($loggedUser['is_admin']) : ?>
					<li><?= $this->Html->link(__('Files'), ['controller' => 'files']) ?></li>
					<li><?= $this->Html->link(__('Ranks'), ['controller' => 'officer_ranks']) ?></li>
				<?php endif; ?>
			</ul>
			<ul class="right">
				<?php if( isset($loggedUser) ) : ?>
					<?php
					$user = h($loggedUser['first_name']) . ' ' . h($loggedUser['last_name']);
					if ($loggedUser['is_admin']) {
						$user = $user . ' (<span style="color: #FF5400">' . __('ADMIN') . '</span>)';
					}
					?>
					<li><?= $this->Html->link(__('Logged in as {0}', $user), ['controller' => 'users', 'action' => 'edit', $loggedUser['id']], ['escape' => false]) ?></li>
					<li><?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']) ?></li>
				<?php else: ?>
					<?php if( !($this->request->params['controller'] == 'Users' && $this->request->params['action'] == 'login') ) : ?>
						<li><?= $this->Html->link(__('Login'), ['controller' => 'users', 'action' => 'login']) ?></li>
					<?php endif; ?>
					<li><?= $this->Html->link(__('Register'), ['controller' => 'users', 'action' => 'register']) ?></li>
				<?php endif; ?>
				
				<ul class="dropdown-menu">
					<li><?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]) ?></li>
					<li><?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) ?></li>
					<li><?= $this->Html->link('Deutsch', ['action' => 'changeLang', 'de_DE'], ['escape' => false]) ?></li>
				</ul>
				
			</ul>
		</div>
	</nav>
	<?= $this->Flash->render() ?>
	<div class="container clearfix">
		<?= $this->fetch('content') ?>
	</div>
	<footer>
	</footer>
</body>
</html>
