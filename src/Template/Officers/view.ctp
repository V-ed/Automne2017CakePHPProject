<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Officer $officer
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Officer'), ['action' => 'edit', $officer->id_officer]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Officer'), ['action' => 'delete', $officer->id_officer], ['confirm' => __('Are you sure you want to delete # {0}?', $officer->id_officer)]) ?> </li>
        <li><?= $this->Html->link(__('List Officers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Officer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="officers view large-9 medium-8 columns content">
    <h3><?= h($officer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Officer') ?></th>
            <td><?= $this->Number->format($officer->id_officer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($officer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($officer->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($officer->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Email') ?></h4>
        <?= $this->Text->autoParagraph(h($officer->email)); ?>
    </div>
</div>
