<?php
/**
* @var \App\View\AppView $this
* @var \App\Model\Entity\EvidenceItem[]|\Cake\Collection\CollectionInterface $evidenceItems
*/

$urlToProductsIndexJson = $this->Url->build([
	"controller" => "EvidenceItems",
	"action" => "findItems",
	"_ext" => "json"
]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToProductsIndexJson . '";', ['block' => true]);

$this->Html->script('EvidenceItems/app', ['block' => true]);

?>
<?php if ($loggedUser != null) : ?>
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
