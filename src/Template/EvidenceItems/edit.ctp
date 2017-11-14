<div class="evidenceItems form large-10 medium-8 columns content">
	
	<?= $this->element('ajax_loading_image') ?>
	
	<?= $this->Form->create($evidenceItem, ['id' => 'form-edit']) ?>
	<fieldset>
		<legend><?= __('Edit Evidence Item') ?></legend>
		<?php
		echo $this->Form->control('description');
		echo $this->Form->control('origin');
		echo $this->Form->control('is_sealed');
		echo $this->Form->control('officer_id');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
	
</div>
