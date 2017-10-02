<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\File $file
*/
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?> </li>
        <?php if($loggedUser != null) : ?>
            <li class="heading"><?= __('User Actions') ?></li>
            <li><?= $this->Html->link(__('New File'), ['action' => 'add']) ?> </li>
            <?php if($loggedUser['isAdmin']) : ?>
                <li class="heading"><?= __('Admin Actions') ?></li>
                <li><?= $this->Html->link(__('Edit File'), ['action' => 'edit', $file->id]) ?> </li>
                <li><?= $this->Form->postLink(__('Delete File'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?> </li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
</nav>
<div class="files view large-10 medium-8 columns content">
    <h3><?= h($file->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($file->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td>
                <?= $this->Html->image($file->path . '/' . $file->name, [
                    "alt" => $file->name,
                    'width' => '200'
                ]);
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Detail') ?></th>
            <td><?= h($file->detail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($file->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($file->modified) ?></td>
        </tr>
    </table>
</div>
