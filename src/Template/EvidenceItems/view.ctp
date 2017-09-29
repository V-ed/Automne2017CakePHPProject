<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\EvidenceItem $evidenceItem
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Evidence Item'), ['action' => 'edit', $evidenceItem->id_item]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Evidence Item'), ['action' => 'delete', $evidenceItem->id_item], ['confirm' => __('Are you sure you want to delete # {0}?', $evidenceItem->id_item)]) ?> </li>
        <li><?= $this->Html->link(__('List Evidence Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evidence Item'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="evidenceItems view large-9 medium-8 columns content">
    <h3><?= h($evidenceItem->id_item) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Officier') ?></th>
            <td><?= $this->Number->format($evidenceItem->id_officier) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($evidenceItem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($evidenceItem->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Sealed') ?></th>
            <td><?= $evidenceItem->is_sealed ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $evidenceItem->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($evidenceItem->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Origin') ?></h4>
        <?= $this->Text->autoParagraph(h($evidenceItem->origin)); ?>
    </div>
</div>
