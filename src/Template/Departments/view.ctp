<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Department'), ['action' => 'edit', $department->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Department'), ['action' => 'delete', $department->id], ['confirm' => __('Are you sure you want to delete # {0}?', $department->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Officer Ranks'), ['controller' => 'OfficerRanks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Officer Rank'), ['controller' => 'OfficerRanks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="departments view large-10 medium-8 columns content">
    <h3><?= h($department->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($department->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($department->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($department->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Officer Ranks') ?></h4>
        <?php if (!empty($department->officer_ranks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Rank Code') ?></th>
                <th scope="col"><?= __('Rank Name') ?></th>
                <th scope="col"><?= __('Rank Description') ?></th>
                <th scope="col"><?= __('Department Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($department->officer_ranks as $officerRanks): ?>
            <tr>
                <td><?= h($officerRanks->id) ?></td>
                <td><?= h($officerRanks->rank_code) ?></td>
                <td><?= h($officerRanks->rank_name) ?></td>
                <td><?= h($officerRanks->rank_description) ?></td>
                <td><?= h($officerRanks->department_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OfficerRanks', 'action' => 'view', $officerRanks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OfficerRanks', 'action' => 'edit', $officerRanks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OfficerRanks', 'action' => 'delete', $officerRanks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officerRanks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
