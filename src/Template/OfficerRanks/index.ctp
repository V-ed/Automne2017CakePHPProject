<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\OfficerRank[]|\Cake\Collection\CollectionInterface $officerRanks
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Officer Rank'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="officerRanks index large-9 medium-8 columns content">
    <h3><?= __('Officer Ranks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('rank_code') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($officerRanks as $officerRank): ?>
            <tr>
                <td><?= h($officerRank->rank_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $officerRank->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $officerRank->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $officerRank->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officerRank->id)]) ?>
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
