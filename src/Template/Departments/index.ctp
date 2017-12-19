<?php

// $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css', ['block' => true]);
// $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js', ['block' => true]);

$deletionText = __('Are you sure you want to delete # {0}?');
echo $this->Html->scriptBlock('var deletionText = "' . $deletionText . '";', ['block' => true]);

$editLink = $this->Url->build(['action' => 'edit'], [
    'fullBase' => true
]);

echo $this->Html->scriptBlock('var editLink = \'' . $editLink . '\';', ['block' => true]);

$this->Html->script('Departments/app', ['block' => 'scriptBottom']);
?>
<div ng-app="DepartmentsApp" ng-controller="DepsController" id="viewport">
	
	<nav class="large-3 medium-4 columns" id="actions-sidebar">
		<ul class="side-nav">
			<li class="heading"><?= __('Actions') ?></li>
			<li><?= $this->Html->link(__('List Officer Ranks'), ['controller' => 'OfficerRanks', 'action' => 'index']) ?></li>
			<li>
				<?=
				$this->Html->tag('a', __('New Department'), [
					'ng-click' => 'newDepartment()',
				])
				?>
			</li>
			<li><?= $this->Html->link(__('New Officer Rank'), ['controller' => 'OfficerRanks', 'action' => 'add']) ?></li>
		</ul>
	</nav>
	<div class="departments index large-10 medium-8 columns content">
		
		<?= $this->element('ajax_loading_image') ?>
		
		<h3><?= __('Departments') ?></h3>
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th scope="col"><?= $this->Paginator->sort('id') ?></th>
					<th scope="col"><?= $this->Paginator->sort('name') ?></th>
					<th scope="col"><?= $this->Paginator->sort('description') ?></th>
					<th scope="col" class="actions"><?= __('Actions') ?></th>
				</tr>
			</thead>
			<tbody ng-init="listAll()">
				<tr ng-repeat="department in departments">
					<td>{{ department.id }}</td>
					<td>{{ department.name }}</td>
					<td>{{ department.description }}</td>
					<td>
						<?=
						$this->Html->tag('a', __('View'), [
							'ng-click' => 'viewDepartment(department.id)',
						])
						?>
						<?= $this->Html->tag('a', __('Edit'), [
							'ng-click' => 'editDepartment(department.id)',
						])
						?>
						<?= $this->Html->tag('a', __('Delete'), [
							'ng-click' => 'deleteDepartment(department.id)',
						])
						?>
					</td>
				</tr>
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
