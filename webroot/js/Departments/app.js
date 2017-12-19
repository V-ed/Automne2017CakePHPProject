var app = angular.module('DepartmentsApp', []);

app.controller('DepsController', function ($scope, $http) {
	
	$scope.listAll = function() {
		
		$http.get("departments/index.json").then(function (response) {
			$scope.departments = response.data.departments;
		});
		
	}
	
	$scope.newDepartment = function() {
		
		$scope.load_icon();
		
	}
	
	$scope.saveNewDepartment = function(){
		
		$scope.load_icon();
		
	}
	
	$scope.viewDepartment = function (id) {
		
		$scope.load_icon();
		
	}
	
	$scope.editDepartment = function (id) {
		
		$scope.load_icon();
		
	}
	
	$scope.saveEditDepartment = function () {
		
		$scope.load_icon();
		
	}
	
	$scope.deleteDepartment = function (id) {
		
		var confirmText = deletionText.format(id);
		
		// ask the user if he is sure to delete the record
		if ( confirm(confirmText) ) {
			
			$scope.load_icon();
			
			$http.post('departments/delete.json', {
				'id': id
			}).success(function (data, status, headers, config) {
				
				// tell the user subcategory was deleted
				Materialize.toast(data.response.result, 4000);
				
				// refresh the list
				$scope.listAll();
				
				$scope.unload_icon();
				
			});
			
		}
		
	}
	
	$scope.setViewport = function(data) {
		$('#viewport').empty().append(data);
	}
	$scope.load_icon = function() {
		$('#ajax-loading-icon').show();
	}
	$scope.unload_icon = function() {
		$('#ajax-loading-icon').hide();
	}

});

String.prototype.format = function() {
	a = this;
	for (k in arguments) {
		a = a.replace("{" + k + "}", arguments[k])
	}
	return a
}
