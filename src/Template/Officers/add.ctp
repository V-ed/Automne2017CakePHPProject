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
			'ng-model' => 'departments',
			'ng-options' => 'department.name for department in departments track by department.id',
		]);
		
		echo $this->Form->control('officer_rank_id', ['id' => 'field-officer_ranks']);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
	
</div>
