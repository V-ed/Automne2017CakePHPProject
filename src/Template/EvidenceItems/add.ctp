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
