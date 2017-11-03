<?php
/**
* @var \App\View\AppView $this
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Officer Ranks'), ['action' => 'index']) ?></li>
	</ul>
</nav>
<div class="officerRanks form large-10 medium-8 columns content">
	<?= $this->Form->create($officerRank) ?>
	<fieldset>
		<legend><?= __('Add Officer Rank') ?></legend>
		<?php
		echo $this->Form->control('rank_code');
		echo $this->Form->control('rank_name');
		echo $this->Form->control('rank_description');
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
