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
		<li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Officers'), ['controller' => 'Officers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Officer'), ['controller' => 'Officers', 'action' => 'add']) ?> </li>
	</ul>
</nav>
<div class="officerRanks view large-10 medium-8 columns content">
	<h3><?= h($officerRank->rank_name) ?></h3>
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
		<tr>
			<th scope="row"><?= __('Department') ?></th>
			<td><?= $officerRank->has('department') ? $this->Html->link($officerRank->department->name, ['controller' => 'Departments', 'action' => 'view', $officerRank->department->id]) : '' ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Id') ?></th>
			<td><?= $this->Number->format($officerRank->id) ?></td>
		</tr>
	</table>
	<div class="related">
		<h4><?= __('Related Officers') ?></h4>
		<?php if (!empty($officerRank->officers)): ?>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th scope="col"><?= __('Id') ?></th>
					<th scope="col"><?= __('Email') ?></th>
					<th scope="col"><?= __('Officer Rank Id') ?></th>
					<th scope="col"><?= __('User Id') ?></th>
					<th scope="col" class="actions"><?= __('Actions') ?></th>
				</tr>
				<?php foreach ($officerRank->officers as $officers) : ?>
					<tr>
						<td><?= h($officers->id) ?></td>
						<td><?= h($officers->email) ?></td>
						<td><?= h($officers->officer_rank_id) ?></td>
						<td><?= h($officers->user_id) ?></td>
						<td class="actions">
							<?= $this->Html->link(__('View'), ['controller' => 'Officers', 'action' => 'view', $officers->id]) ?>
							<?= $this->Html->link(__('Edit'), ['controller' => 'Officers', 'action' => 'edit', $officers->id]) ?>
							<?= $this->Form->postLink(__('Delete'), ['controller' => 'Officers', 'action' => 'delete', $officers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officers->id)]) ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php endif; ?>
	</div>
</div>
