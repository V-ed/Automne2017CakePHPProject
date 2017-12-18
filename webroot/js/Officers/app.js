var app = angular.module('OfficersAdd', []);

app.controller('DepartmentsLinkedList', function ($scope, $http) {
	
	$http.get(getDepartmentsUrl).then(function (response) {
		$scope.departments = response.data;
	});
	
});
