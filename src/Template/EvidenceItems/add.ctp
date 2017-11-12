<?= $this->Form->create($evidenceItem) ?>
<fieldset>
	<legend><?= __('Add Evidence Item') ?></legend>
	<?php
	echo $this->Form->control('description');
	echo $this->Form->control('origin');
	echo $this->Form->control('is_sealed');
	echo $this->Form->control('officer_id');
	?>
</fieldset>
<?= $this->Form->button(__('Submit'), ['id' => 'submit-button',]) ?>
<?= $this->Form->end() ?>
