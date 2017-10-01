<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete your account?')]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-10 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            if ($loggedUser['isAdmin']) {
                echo $this->Form->control('isAdmin', ['label' => __('Is Admin')]);
            }
            echo $this->Form->control('firstName', ['label' => __('First Name')]);
            echo $this->Form->control('lastName', ['label' => __('Last Name')]);
            echo $this->Form->control('username');
            echo $this->Form->control('password', ['value' => '', 'label' => __('New Password')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
