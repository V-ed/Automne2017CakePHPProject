<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Officer $officer
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Officer'), ['action' => 'edit', $officer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Officer'), ['action' => 'delete', $officer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Officers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Officer'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="officers view large-10 medium-8 columns content">
    <h3><?= h($officer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($officer->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Rank') ?></th>
            <td><?= $this->Number->format($officer->officer_rank_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($officer->user_id) ?></td>
        </tr>
    </table>
</div>
