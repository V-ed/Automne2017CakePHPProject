<?php

// $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css', ['block' => true]);
// $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js', ['block' => true]);

$deletionText = __('Are you sure you want to delete # {0}?');
echo $this->Html->scriptBlock('var deletionText = "' . $deletionText . '";', ['block' => true]);

$getEditingDepartmentUrl = $this->Url->build([
	"controller" => "Departments",
	"action" => "getDepartment"
]);
$this->Html->scriptBlock('var getEditingDepartmentUrl = "' . $getEditingDepartmentUrl . '";', ['block' => true]);

$this->Html->script('Departments/app', ['block' => 'scriptBottom']);
?>
<div ng-app="DepartmentsApp" ng-controller="DepsController">
	
	<nav class="large-3 medium-4 columns" id="actions-sidebar">
		<ul class="side-nav">
			<li class="heading"><?= __('Actions') ?></li>
			<li><?= $this->Html->tag('a', __('New Department'), ['ng-click' => 'newDepartment()']) ?></li>
			<li><?= $this->Html->tag('a', __('List Departments'), ['ng-click' => 'restoreIndex()']) ?></li>
			<li><?= $this->Html->link(__('New Officer Rank'), ['controller' => 'OfficerRanks', 'action' => 'add']) ?></li>
			<li><?= $this->Html->link(__('List Officer Ranks'), ['controller' => 'OfficerRanks', 'action' => 'index']) ?></li>
		</ul>
	</nav>
	
	<div class="departments large-10 medium-8 columns content">
		
		<?= $this->element('ajax_loading_image') ?>
		
		<div id="viewport-index" class="index">
			
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
							<?=
							$this->Html->tag('a', __('Edit'), [
								'ng-click' => 'editDepartment(department.id)',
							])
							?>
							<?=
							$this->Html->tag('a', __('Delete'), [
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
		
		<div id="viewport-add" class="form" style="display: none;">
			
			<?= $this->Form->create() ?>
			<fieldset>
				<legend><?= __('Add Department') ?></legend>
				<?php
				echo $this->Form->control('name', [
					'ng-model' => 'name',
					'placeholder' => __('Type the department\'s name here'),
				]);
				echo $this->Form->control('description', [
					'ng-model' => 'description',
					'placeholder' => __('Type the department\'s description here'),
				]);
				?>
			</fieldset>
			<?=
			$this->Form->button(__('Submit'), [
				'class' => 'submit-btn',
				'ng-click' => 'saveNewDepartment()',
			])
			?>
			<?= $this->Form->end() ?>
			
		</div>
		
		<div id="viewport-view" class="view" style="display: none;">
			
			<h3>{{ department.name }}</h3>
			<table class="vertical-table">
				<tr>
					<th scope="row"><?= __('Name') ?></th>
					<td>{{ department.name }}</td>
				</tr>
				<tr>
					<th scope="row"><?= __('Description') ?></th>
					<td>{{ department.description }}</td>
				</tr>
				<tr>
					<th scope="row"><?= __('Id') ?></th>
					<td>{{ department.id }}</td>
				</tr>
			</table>
			
			<div class="related" ng-hide="department.officer_ranks == null">
				<h4><?= __('Related Officer Ranks') ?></h4>
				<table cellpadding="0" cellspacing="0">
					<tr>
						<th scope="col"><?= __('Id') ?></th>
						<th scope="col"><?= __('Rank Code') ?></th>
						<th scope="col"><?= __('Rank Name') ?></th>
						<th scope="col"><?= __('Rank Description') ?></th>
					</tr>
					<tr ng-repeat="officer_rank in department.officer_ranks">
						<td>{{ officer_rank.id }}</td>
						<td>{{ officer_rank.rank_code }}</td>
						<td>{{ officer_rank.rank_name }}</td>
						<td>{{ officer_rank.rank_description }}</td>
					</tr>
				</table>
				
			</div>
			
		</div>
		
		<div id="viewport-edit" class="form" style="display: none;">
			
			<?= $this->Form->create() ?>
			<fieldset>
				<legend><?= __('Edit Department') ?></legend>
				<?php
				echo $this->Form->control('name', [
					'ng-model' => 'department.name',
					'placeholder' => __('Type the department\'s name here'),
				]);
				echo $this->Form->control('description', [
					'ng-model' => 'department.description',
					'placeholder' => __('Type the department\'s description here'),
				]);
				?>
			</fieldset>
			<?=
			$this->Form->button(__('Submit'), [
				'class' => 'submit-btn',
				'ng-click' => 'saveEditedDepartment()',
			])
			?>
			<?= $this->Form->end() ?>
			
		</div>
		
	</div>

</div>
