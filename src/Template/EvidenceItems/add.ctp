<?php
/**
* @var \App\View\AppView $this
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Evidence Items'), ['action' => 'index']) ?></li>
	</ul>
</nav>
<div class="evidenceItems form large-10 medium-8 columns content">
	<?= $this->Form->create($evidenceItem) ?>
	<fieldset>
		<legend><?= __('Add Evidence Item') ?></legend>
		<?php
		echo $this->Form->control('description');
		echo $this->Form->control('origin');
		echo $this->Form->control('isSealed');
		echo $this->Form->control('officer_id');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
