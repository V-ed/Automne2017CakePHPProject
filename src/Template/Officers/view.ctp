<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Officer $officer
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Officers'), ['action' => 'index']) ?> </li>
		<?php if($loggedUser != null) : ?>
			<li class="heading"><?= __('User Actions') ?></li>
			<li><?= $this->Html->link(__('New Officer'), ['action' => 'add']) ?> </li>
			<?php if($loggedUser->id == $officer->user->id || $loggedUser->is_admin) : ?>
				<li class="heading"><?= $loggedUser->id == $officer->user->id ? __('Account Actions') : __('Admin Actions') ?></li>
				<li><?= $this->Html->link(__('Edit Officer'), ['action' => 'edit', $officer->id]) ?> </li>
				<li><?= $this->Form->postLink(__('Delete Officer'), ['action' => 'delete', $officer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officer->id)]) ?> </li>
			<?php endif; ?>
		<?php endif; ?>
	</ul>
</nav>
<div class="officers view large-10 medium-8 columns content">
	<h3><?= h($officer->officer_rank->rank_name . ' ' . $officer->user->full_name) ?></h3>
	<table class="vertical-table">
		<?php if($loggedUser != null && $loggedUser->is_admin) : ?>
			<tr>
				<th scope="row"><?= __('Is Admin') ?></th>
				<td><?= $officer->user->is_admin ? __('Yes') : __('No'); ?></td>
			</tr>
		<?php endif; ?>
		<tr>
			<th scope="row"><?= __('Email') ?></th>
			<td><?= h($officer->email) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Rank') ?></th>
			<td><?= h($officer->officer_rank->rank_name) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('First Name') ?></th>
			<td><?= h($officer->user->first_name) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Last Name') ?></th>
			<td><?= h($officer->user->last_name) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Username') ?></th>
			<td><?= h($officer->user->username) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Joined On') ?></th>
			<td><?= h($officer->user->created) ?></td>
		</tr>
	</table>
</div>
