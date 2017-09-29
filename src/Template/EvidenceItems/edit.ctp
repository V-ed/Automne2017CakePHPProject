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
                ['action' => 'delete', $evidenceItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $evidenceItem->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Evidence Items'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="evidenceItems form large-9 medium-8 columns content">
    <?= $this->Form->create($evidenceItem) ?>
    <fieldset>
        <legend><?= __('Edit Evidence Item') ?></legend>
        <?php
            echo $this->Form->control('description');
            echo $this->Form->control('origin');
            echo $this->Form->control('is_sealed');
            echo $this->Form->control('is_deleted');
            echo $this->Form->control('id_officier');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
