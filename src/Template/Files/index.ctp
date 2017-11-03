<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\File[]|\Cake\Collection\CollectionInterface $files
*/
?>
<?php if($loggedUser != null) : ?>
	<nav class="large-3 medium-4 columns" id="actions-sidebar">
		<ul class="side-nav">
			<li class="heading"><?= __('Actions') ?></li>
			<li><?= $this->Html->link(__('New File'), ['action' => 'add']) ?></li>
		</ul>
	</nav>
<?php endif; ?>
<div class="files index large-10 medium-8 columns content">
	<h3><?= __('Files') ?></h3>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th scope="col"><?= $this->Paginator->sort('name') ?></th>
				<th scope="col"><?= $this->Paginator->sort('path', __('Image')) ?></th>
				<th scope="col"><?= $this->Paginator->sort('detail') ?></th>
				<th scope="col"><?= $this->Paginator->sort('evidence_item_id') ?></th>
				<th scope="col"><?= $this->Paginator->sort('created') ?></th>
				<th scope="col"><?= $this->Paginator->sort('modified') ?></th>
				<th scope="col" class="actions"><?= __('Actions') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($files as $file) : ?>
				<tr>
					<td><?= h($file->name) ?></td>
					<td>
						<?= $this->Html->image($file->path . '/' . $file->name, [
							"alt" => $file->name,
							'width' => '200'
						]);
						?>
					</td>
					<td><?= h($file->detail) ?></td>
					<td><?= h($file->evidence_item->description) ?></td>
					<td><?= h($file->created) ?></td>
					<td><?= h($file->modified) ?></td>
					<td class="actions">
						<?= $this->Html->link(__('View'), ['action' => 'view', $file->id]) ?>
						<?php if($loggedUser['is_admin']) : ?>
							<?= $this->Html->link(__('Edit'), ['action' => 'edit', $file->id]) ?>
							<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?>
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
