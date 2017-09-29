<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Officer[]|\Cake\Collection\CollectionInterface $officers
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Officer'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="officers index large-9 medium-8 columns content">
    <h3><?= __('Officers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_officer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($officers as $officer): ?>
                <tr>
                    <td><?= $this->Number->format($officer->id_officer) ?></td>
                    <td><?= h($officer->name) ?></td>
                    <td><?= h($officer->email) ?></td>
                    <td><?= h($officer->created) ?></td>
                    <td><?= h($officer->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $officer->id_officer]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $officer->id_officer]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $officer->id_officer], ['confirm' => __('Are you sure you want to delete # {0}?', $officer->id_officer)]) ?>
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
