<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\OfficerRank $officerRank
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('Edit Officer Rank'), ['action' => 'edit', $officerRank->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Officer Rank'), ['action' => 'delete', $officerRank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officerRank->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Officer Ranks'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Officer Rank'), ['action' => 'add']) ?> </li>
	</ul>
</nav>
<div class="officerRanks view large-10 medium-8 columns content">
	<h3><?= h($officerRank->id) ?></h3>
	<table class="vertical-table">
		<tr>
			<th scope="row"><?= __('Rank Code') ?></th>
			<td><?= h($officerRank->rank_code) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Rank Name') ?></th>
			<td><?= h($officerRank->rank_name) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Rank Description') ?></th>
			<td><?= h($officerRank->rank_description) ?></td>
		</tr>
	</table>
</div>
