<?php if (!$evidenceItem->is_deleted || ($loggedUser != null && $loggedUser->is_admin)) : ?>
	<tr <?php if ($evidenceItem->is_deleted) echo 'class="deleted-item"'; ?> >
		<td><?= h($evidenceItem->description) ?></td>
		<td><?= h($evidenceItem->origin) ?></td>
		<td><?= $evidenceItem->is_sealed ? __('Yes') : __('No') ?></td>
		<td><?= h($evidenceItem->officer->user->username) ?></td>
		<td>
			<?php if($evidenceItem->files == null) : ?>
				<?= __('No files available for this item!') ?>
			<?php else : ?>
				<?=
				$this->Html->image($evidenceItem->files[0]->path . '/' . $evidenceItem->files[0]->name, [
					"alt" => $evidenceItem->files[0]->name,
					'width' => '200'
				]);
				?>
			<?php endif; ?>
		</td>
		<td><?= h($evidenceItem->created) ?></td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $evidenceItem->id]) ?>
			<?php if ($loggedUser != null && ($loggedUser->id == $evidenceItem->officer->user_id || $loggedUser->is_admin)) : ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $evidenceItem->id], ['class' => 'edit-button', 'id' => "edit-button-$evidenceItem->id"]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $evidenceItem->id], ['confirm' => __('Are you sure you want to delete "{0}"?', $evidenceItem->description), 'class' => 'delete-button', 'id' => "delete-button-$evidenceItem->id"]) ?>
			<?php endif; ?>
		</td>
	</tr>
<?php endif; ?>