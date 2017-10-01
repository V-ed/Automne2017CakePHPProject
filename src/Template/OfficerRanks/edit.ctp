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
                ['action' => 'delete', $officerRank->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $officerRank->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Officer Ranks'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="officerRanks form large-9 medium-8 columns content">
    <?= $this->Form->create($officerRank) ?>
    <fieldset>
        <legend><?= __('Edit Officer Rank') ?></legend>
        <?php
            echo $this->Form->control('rank_code');
            echo $this->Form->control('rank_name');
            echo $this->Form->control('rank_description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
