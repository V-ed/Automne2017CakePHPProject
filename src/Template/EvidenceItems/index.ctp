<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\EvidenceItem[]|\Cake\Collection\CollectionInterface $evidenceItems
*/

$this->Html->script('EvidenceItems/app', ['block' => true]);

?>
<?php if($loggedUser != null) : ?>
	<nav class="large-3 medium-4 columns" id="actions-sidebar">
		<ul class="side-nav">
			<li class="heading"><?= __('Actions') ?></li>
			
			<li><?= $this->Html->link(__('New Evidence Item'), ['action' => 'add'], ['id' => 'add-button']) ?></li>
		</ul>
	</nav>
<?php endif; ?>
<div id="viewport">
	
	<?= $this->element('EvidenceItems' . DS . 'index_viewport', ['evidenceItems' => $evidenceItems]) ?>
	
</div>
