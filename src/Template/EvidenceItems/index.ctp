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
	
	<div class="evidenceItems index large-10 medium-8 columns content">
		
		<?= $this->Html->image('ajax-loader.gif', ['id' => 'ajax-loading-icon', 'style' => 'display: none']) ?>
		
		<h3><?= __('Evidence Items') ?></h3>
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th scope="col"><?= $this->Paginator->sort('description') ?></th>
					<th scope="col"><?= $this->Paginator->sort('origin') ?></th>
					<th scope="col"><?= $this->Paginator->sort('is_sealed', __('Is Sealed')) ?></th>
					<th scope="col"><?= $this->Paginator->sort('officer_id') ?></th>
					<th scope="col"><?= $this->Paginator->sort('files') ?></th>
					<th scope="col"><?= $this->Paginator->sort('created', __('Created On')) ?></th>
					<th scope="col" class="actions"><?= __('Actions') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($evidenceItems as $evidenceItem) : ?>
					<?= $this->element('EvidenceItems' . DS . 'index_item_row', ['evidenceItem' => $evidenceItem]) ?>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="paginator">
			<ul class="pagination">
				<?= $this->Paginator->first('<< ' . __('first')) ?>
				<?= $this->Paginator->prev('< ' . __('previous')) ?>
				<?= $this->Paginator->numbers() ?>
				<?= $this->Paginator->next(__('next') . ' >') ?>
				<?= $this->Paginator->last(__('last') . ' >>') ?>
			</ul>
			<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
		</div>
	</div>
	
</div>
