<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\User $user
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('Register'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
		<?php if($loggedUser['id'] == $user->id || $loggedUser['is_admin']) : ?>
			<li class="heading"><?= $loggedUser['is_admin'] ? __('Admin Actions') : __('User Actions') ?></li>
			<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
			<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
		<?php endif; ?>
	</ul>
</nav>
<div class="users view large-10 medium-8 columns content">
	<h3><?= h($user->first_name) . ' ' . h($user->last_name) ?></h3>
	<table class="vertical-table">
		<?php if($loggedUser['is_admin']) : ?>
			<tr>
				<th scope="row"><?= __('Is Admin') ?></th>
				<td><?= $user->is_admin ? __('Yes') : __('No'); ?></td>
			</tr>
		<?php endif; ?>
		<tr>
			<th scope="row"><?= __('First Name') ?></th>
			<td><?= h($user->first_name) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Last Name') ?></th>
			<td><?= h($user->last_name) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Username') ?></th>
			<td><?= h($user->username) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Joined On') ?></th>
			<td><?= h($user->created) ?></td>
		</tr>
	</table>
</div>
