<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\EvidenceItem $evidenceItem
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Evidence Items'), ['action' => 'index']) ?> </li>
		<?php if($loggedUser != null) : ?>
			<li class="heading"><?= __('User Actions') ?></li>
			<li><?= $this->Html->link(__('New Evidence Item'), ['action' => 'add']) ?> </li>
			<?php if($loggedUser['id'] == $evidenceItem->officer->user_id || $loggedUser['is_admin']) : ?>
				<li class="heading"><?= $loggedUser['id'] == $evidenceItem->officer->user->id ? __('Owner Actions') : __('Admin Actions') ?></li>
				<li><?= $this->Html->link(__('Edit Evidence Item'), ['action' => 'edit', $evidenceItem->id]) ?> </li>
				<li><?= $this->Form->postLink(__('Delete Evidence Item'), ['action' => 'delete', $evidenceItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evidenceItem->id)]) ?> </li>
			<?php endif; ?>
		<?php endif; ?>
	</ul>
</nav>
<div class="evidenceItems view large-10 medium-8 columns content">
	<h3><?= h($evidenceItem->description) ?></h3>
	<table class="vertical-table">
		<tr>
			<th scope="row"><?= __('Description') ?></th>
			<td><?= h($evidenceItem->description) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Origin') ?></th>
			<td><?= h($evidenceItem->origin) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Officer') ?></th>
			<td><?= h($evidenceItem->officer->user->username) ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Is Sealed') ?></th>
			<td><?= $evidenceItem->isSealed ? __('Yes') : __('No') ?></td>
		</tr>
		<tr>
			<th scope="row"><?= __('Created') ?></th>
			<td><?= h($evidenceItem->created) ?></td>
		</tr>
		<?php if ($loggedUser['is_admin']) : ?>
			<tr>
				<th scope="row"><?= __('Is Deleted') ?></th>
				<td><?= $evidenceItem->isDeleted ? __('Yes') : __('No') ?></td>
			</tr>
		<?php endif; ?>
	</table>
	<?php if (!empty($evidenceItem->files)) : ?>
		<div class="related">
			<h4><?= __('Related Files') ?></h4>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th scope="col"><?= __('Name') ?></th>
					<th scope="col"><?= __('Image') ?></th>
					<th scope="col"><?= __('Detail') ?></th>
					<th scope="col"><?= __('Modified') ?></th>
					<th scope="col"><?= __('Created') ?></th>
					<th scope="col" class="actions"><?= __('Actions') ?></th>
				</tr>
				<?php foreach ($evidenceItem->files as $file) : ?>
					<tr>
						<td><?= h($file->name) ?></td>
						<td>
							<?php echo $this->Html->image($file->path . '/' . $file->name, [
								"alt" => $file->name,
								'width' => '175'
							]);
							?>
						</td>
						<td><?= h($file->detail) ?></td>
						<td><?= h($file->created) ?></td>
						<td><?= h($file->modified) ?></td>
						<td class="actions">
							<?= $this->Html->link(__('View'), ['controller' => 'Files', 'action' => 'view', $file->id]) ?>
							<?php if($loggedUser['id'] == $evidenceItem->officer->user_id || $loggedUser['is_admin']) : ?>
								<?= $this->Html->link(__('Edit'), ['controller' => 'Files', 'action' => 'edit', $file->id]) ?>
								<?= $this->Form->postLink(__('Delete'), ['controller' => 'Files', 'action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	<?php endif; ?>
</div>
