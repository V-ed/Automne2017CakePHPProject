<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\Officer[]|\Cake\Collection\CollectionInterface $officers
*/
?>
<?php if($loggedUser != null && ($loggedUser->is_officer || $loggedUser->is_admin)) : ?>
	<nav class="large-3 medium-4 columns" id="actions-sidebar">
		<ul class="side-nav">
			<li class="heading"><?= __('Actions') ?></li>
			<li><?= $this->Html->link(__('New Officer'), ['action' => 'add']) ?></li>
		</ul>
	</nav>
<?php endif; ?>
<div class="officers index large-10 medium-8 columns content">
	<h3><?= __('Officers') ?></h3>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th scope="col"><?= $this->Paginator->sort('email') ?></th>
				<th scope="col"><?= $this->Paginator->sort('officer_rank_id', __('Officer\'s Rank')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
				<th scope="col" class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($officers as $officer) : ?>
				<tr <?php if($loggedUser != null && $loggedUser->id == $officer->user_id) echo 'id="rowIsUserConnected"' ?> >
					<td><?= h($officer->email) ?></td>
					<td><?= h($officer->officer_rank->rank_name) ?></td>
					<td><?= h($officer->user->username) ?></td>
					<td class="actions">
						<?= $this->Html->link(__('View'), ['action' => 'view', $officer->id]) ?>
						<?php if($loggedUser != null && ($loggedUser->id == $officer->user_id || $loggedUser->is_admin)) : ?>
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $officer->id]) ?>
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $officer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officer->id)]) ?>
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
