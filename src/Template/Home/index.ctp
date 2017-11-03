<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;
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
	<?= $this->Html->css('home.css') ?>
	<?= $this->Html->css('custom.css') ?>
	
	<link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
	
</head>

<body class="home">
	<?= $this->Flash->render() ?>
	<header class="row">
		<div class="header-image"><?= $this->Html->image('logo.png', ['width' => '400']) ?></div>
		<div class="header-title">
			<h1><?= __('Keeping the evidences under control.') ?></h1>
		</div>
	</header>
	
	<header class="row">
		<div class="header-title">
			
			<?php if($loggedUser == null) : ?>
				<?= $this->Html->link('<h1>' . __('Login') . '</h1>', ['controller' => 'users', 'action' => 'login'], ['escape' => false]) ?>
			<?php else: ?>
				<?= $this->Html->link('<h1>' . __('Welcome, {0}! Logout?', h($loggedUser['first_name']) . ' ' . h($loggedUser['last_name'])) . '</h1>', ['controller' => 'users', 'action' => 'logout'], ['escape' => false]) ?>
			<?php endif; ?>
			<?= $this->Html->link('<h1>' . __('Evidence Items') . '</h1>', ['controller' => 'evidence_items'], ['escape' => false]) ?>
			<?= $this->Html->link('<h1>' . __('Officers') . '</h1>', ['controller' => 'officers'], ['escape' => false]) ?>
			<?= $this->Html->link('<h1>' . __('Users') . '</h1>', ['controller' => 'users'], ['escape' => false]) ?>
			<h1>
				<?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]) ?>
				<?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) ?>
				<?= $this->Html->link('Deutsch', ['action' => 'changeLang', 'de_DE'], ['escape' => false]) ?>
			</h1>
		</div>
	</header>
</body>
</html>
