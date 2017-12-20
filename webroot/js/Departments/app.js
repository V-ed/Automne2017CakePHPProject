var app = angular.module('DepartmentsApp', []);

app.controller('DepsController', function ($scope, $http) {
	
	$scope.listAll = function() {
		
		$scope.load_icon();
		
		$http.get("departments/index.json").then(function (response) {
			
			$scope.departments = response.data.departments;
			
			$scope.unload_icon();
			
		});
		
	}
	
	$scope.clearForm = function () {
		$scope.id = "";
		$scope.name = "";
		$scope.description = "";
	}
	
	$scope.restoreIndex = function() {
		
		$('#viewport-index').show();
		
		$('#viewport-add').hide();
		$('#viewport-view').hide();
		
		$scope.listAll();
		
	}
	
	$scope.newDepartment = function() {
		
		$('#viewport-index').hide();
		
		$('#viewport-add').show();
		
	}
	
	$scope.saveNewDepartment = function() {
		
		$scope.load_icon();
		
		$http.post('departments/add.json', {
			'name': $scope.name,
			'description': $scope.description,
		}).then(function (response, status, headers, config) {
			
			$scope.clearForm();
			
			$scope.restoreIndex();
			
			// $scope.unload_icon();
			
		})
		
	}
	
	$scope.viewDepartment = function (id) {
		
		$scope.load_icon();
		
		$http.post('departments/view.json', {
			'id': id
		}).then(function (response, status, headers, config) {

			$scope.department = response.data.department;
			
			$('#viewport-index').hide();
			
			$('#viewport-view').show();

			$scope.unload_icon();
			
		});
		
	}
	
	$scope.editDepartment = function (id) {
		
		var link = editLink.format(id);
		
		window.location.href = link;
		
	}
	
	$scope.deleteDepartment = function (id) {
		
		var confirmText = deletionText.format(id);
		
		// ask the user if he is sure to delete the record
		if ( confirm(confirmText) ) {
			
			$scope.load_icon();
			
			$http.post('departments/delete.json', {
				'id': id
			}).then(function (data, status, headers, config) {
				
				// tell the user that the department was deleted
				// Materialize.toast(data.response.result, 4000);
				
				// refresh the list
				$scope.listAll();
				
				// $scope.unload_icon();
				
			});
			
		}
		
	}
	
	$scope.load_icon = function() {
		$('#ajax-loading-icon').show();
	}
	$scope.unload_icon = function() {
		$('#ajax-loading-icon').hide();
	}
	
	$('#submit-btn-add').click(function(event) {
		event.preventDefault();
	});

});

String.prototype.format = function() {
	a = this;
	for (k in arguments) {
		a = a.replace("{" + k + "}", arguments[k])
	}
	return a
}
