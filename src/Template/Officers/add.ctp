<?php
/**
* @var \App\View\AppView $this
*/

$urlToLinkedListFilter = $this->Url->build([
	"controller" => "OfficerRanks",
	"action" => "getByDepartment",
	"_ext" => "json"
]);
$this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);

$getDepartmentsUrl = $this->Url->build([
	"controller" => "Departments",
	"action" => "getDepartments",
	"_ext" => "json"
]);
$this->Html->scriptBlock('var getDepartmentsUrl = "' . $getDepartmentsUrl . '";', ['block' => true]);

$this->Html->script('Officers/app', ['block' => true]);

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('List Officers'), ['action' => 'index']) ?></li>
	</ul>
</nav>
<div class="officers form large-10 medium-8 columns content" ng-app="OfficersAdd" ng-controller="DepartmentsLinkedList">
	
	<?= $this->element('ajax_loading_image') ?>
	
	<?= $this->Form->create($officer) ?>
	<fieldset>
		<legend><?= __('Add Officer') ?></legend>
		<?php
		echo $this->Form->control('email');
		echo $this->Form->control('user_id', ['label' => __('Available Users')]);
		
		echo $this->Form->input('department_id', [
			'label' => __('Departments'),
			'type' => 'select',
			'required' => true,
			'empty' => __('[Choose one]'),
			'id' => 'field-departments',
			'ng-model' => 'department',
			'ng-options' => 'department.name for department in departments track by department.id',
		]);
		
		echo $this->Form->input('officer_ranks_id', [
			'label' => __('Officer Ranks'),
			'type' => 'select',
			'required' => true,
			'empty' => __('[Choose one]'),
			'id' => 'field-officer-ranks',
			'ng-disabled' => '!department',
			'ng-model' => 'officer_rank',
			'ng-options' => 'officer_rank.rank_name for officer_rank in department.officer_ranks track by officer_rank.id',
		]);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
	
</div>
