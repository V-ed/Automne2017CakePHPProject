<!-- <?= $this->Flash->render() ?> -->
<?= $this->Form->create() ?>
<fieldset>
	<legend><?= __('Please enter your username and password') ?></legend>
	<?= $this->Form->control('username') ?>
	<?= $this->Form->control('password') ?>
	<?= $this->Form->hidden('controller', ['value' => $referer['controller']]) ?>
	<?= $this->Form->hidden('action', ['value' => $referer['action']]) ?>
</fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
