<?php
/**
* @var \App\View\AppView $this
*/
$this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
	</ul>
</nav>
<div class="users form large-10 medium-8 columns content">
	<?= $this->Form->create($user) ?>
	<fieldset>
		<legend><?= __('Register') ?></legend>
		<?php
		echo $this->Form->control('first_name');
		echo $this->Form->control('last_name');
		echo $this->Form->control('email');
		echo $this->Form->control('username');
		echo $this->Form->control('password');
		?>
		<div class="captcha">
			<?= captcha_image_html() ?>
			<?= $this->Form->input('CaptchaCode', ['label' => '', 'maxlength' => '10', 'style' => 'width: 270px;margin-left: 30px;', 'id' => 'CaptchaCode']) ?>
		</div>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
