<?php
/**
* @var \App\View\AppView $this
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Officers'), ['action' => 'index']) ?></li>
	</ul>
</nav>
<div class="officers form large-10 medium-8 columns content">
	<?= $this->Form->create($officer) ?>
	<fieldset>
		<legend><?= __('Add Officer') ?></legend>
		<?php
		echo $this->Form->control('email');
		echo $this->Form->control('officer_rank_id');
		echo $this->Form->control('user_id');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
