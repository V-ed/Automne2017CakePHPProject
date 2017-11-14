<?php
/**
* @var \App\View\AppView $this
*/

$this->Html->script('Officers/app', ['block' => true]);

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Officers'), ['action' => 'index']) ?></li>
	</ul>
</nav>
<div class="officers form large-10 medium-8 columns content">
	
	<?= $this->element('ajax_loading_image') ?>
	
	<?= $this->Form->create($officer) ?>
	<fieldset>
		<legend><?= __('Add Officer') ?></legend>
		<?php
		echo $this->Form->control('email');
		echo $this->Form->control('user_id', ['label' => __('Available Users')]);
		echo $this->Form->control('officer_ranks.departments', ['id' => 'field-departments', 'required' => true]);
		echo $this->Form->control('officer_rank_id', ['id' => 'field-officer_ranks']);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
	
</div>
