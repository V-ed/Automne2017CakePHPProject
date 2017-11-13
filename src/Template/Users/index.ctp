<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('Register'), ['action' => 'register']) ?></li>
	</ul>
</nav>
<div class="users index large-10 medium-8 columns content">
	<h3><?= __('Users') ?></h3>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<?php if($loggedUser != null && $loggedUser->is_admin) : ?>
					<th scope="col"><?= $this->Paginator->sort('is_admin', __('Is Admin')) ?></th>
				<?php endif; ?>
				<th scope="col"><?= $this->Paginator->sort('first_name', __('First Name')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('last_name', __('Last Name')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('username') ?></th>
				<th scope="col"><?= $this->Paginator->sort('created', __('Joined On')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('officer') ?></th>
				<th scope="col" class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user) : ?>
				<tr <?php if($loggedUser != null && $loggedUser->id == $user->id) echo 'id="rowIsUserConnected"' ?> >
					<?php if($loggedUser != null && $loggedUser->is_admin) : ?>
						<td><?= $user->is_admin ? __('Yes') : __('No') ?></td>
					<?php endif; ?>
					<td><?= h($user->first_name) ?></td>
					<td><?= h($user->last_name) ?></td>
					<td><?= h($user->username) ?></td>
					<td><?= h($user->created) ?></td>
					<td>
						<?php
						if ($user->is_officer) {
							$officerOfUser = $user->associated_officer;
							echo $this->Html->link(__('{0} {1}', $officerOfUser->rank->rank_name, $user->last_name), ['controller' => 'Officers', 'action' => 'view', $officerOfUser->id]);
						}
						else {
							echo '---';
						}
						?>
					</td>
					<td class="actions">
						<?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
						<?= $this->Html->link(__('PDF'), ['action' => 'view', $user->id, '_ext' => 'pdf']) ?>
						<?php if($loggedUser != null && ($loggedUser->id == $user->id || $loggedUser->is_admin)) : ?>
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<div class="paginator">
		<ul class="pagination">
			<?= $this->Paginator->first('<< ' . __('first')) ?>
			<?= $this->Paginator->prev('< ' . __('previous')) ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next(__('next') . ' >') ?>
			<?= $this->Paginator->last(__('last') . ' >>') ?>
		</ul>
		<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
	</div>
</div>
