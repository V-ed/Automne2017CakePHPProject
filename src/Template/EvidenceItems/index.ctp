<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\EvidenceItem[]|\Cake\Collection\CollectionInterface $evidenceItems
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Evidence Item'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="evidenceItems index large-9 medium-8 columns content">
    <h3><?= __('Evidence Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_item') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_sealed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fk_id_officier') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evidenceItems as $evidenceItem): ?>
            <tr>
                <td><?= $this->Number->format($evidenceItem->id_item) ?></td>
                <td><?= h($evidenceItem->is_sealed) ?></td>
                <td><?= h($evidenceItem->is_deleted) ?></td>
                <td><?= $this->Number->format($evidenceItem->fk_id_officier) ?></td>
                <td><?= h($evidenceItem->created) ?></td>
                <td><?= h($evidenceItem->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $evidenceItem->id_item]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $evidenceItem->id_item]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $evidenceItem->id_item], ['confirm' => __('Are you sure you want to delete # {0}?', $evidenceItem->id_item)]) ?>
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
