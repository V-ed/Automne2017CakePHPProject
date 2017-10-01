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
<div class="evidenceItems index large-10 medium-8 columns content">
    <h3><?= __('Evidence Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <?php if($loggedUser['isAdmin']): ?>
                    <th scope="col"><?= $this->Paginator->sort('isDeleted') ?></th>
                <?php endif; ?>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('origin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('isSealed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('officer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evidenceItems as $evidenceItem): ?>
                <?php
                $isItemDeleted = $evidenceItem->isDeleted;
                
                if (!$isItemDeleted || $loggedUser['isAdmin']) :
                    ?>
                    <tr <?php if($isItemDeleted) echo 'style="background-color: #DEDEDE"'; ?> >
                        <?php if($loggedUser['isAdmin']): ?>
                            <td><?= $isItemDeleted ? __('Yes') : __('No'); ?></td>
                        <?php endif; ?>
                        <td><?= h($evidenceItem->description) ?></td>
                        <td><?= h($evidenceItem->origin) ?></td>
                        <td><?= h($evidenceItem->isSealed) ?></td>
                        <td><?= h($evidenceItem->officer->email) ?></td>
                        <td><?= h($evidenceItem->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $evidenceItem->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $evidenceItem->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $evidenceItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evidenceItem->id)]) ?>
                        </td>
                    </tr>
                <?php endif; ?>
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
