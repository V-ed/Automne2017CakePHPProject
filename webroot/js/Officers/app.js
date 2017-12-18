$(document).ready(function () {
	
	$('#field-departments').change(function(event) {
		
		$rankField = $('#field-officer_ranks');
		
		var departmentId = $(this).val();
		
		if (departmentId) {
			
			$.ajax({
				url: urlToLinkedListFilter,
				data: 'department_id=' + departmentId,
			})
			.done(function(ranks) {
				console.log("success");
				
				$rankField.find('option').remove();
				
				for (var i = 0; i < ranks.officerRanks.length; i++) {
					$rankField.append('<option value=' + ranks.officerRanks[i].id + '>' + ranks.officerRanks[i].rank_name + '</option>');
				}
				
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
			
		} else {
			$rankField.html('<option value="">Select Category first</option>');
		}
		
	});
	
});

function load_icon() {
	$('#ajax-loading-icon').show();
}

function unload_icon() {
	$('#ajax-loading-icon').hide();
}

var app = angular.module('OfficersAdd', []);
app.controller('DepartmentsLinkedList', function ($scope, $http) {
	
	$http.get(getDepartmentsUrl).then(function (response) {
		$scope.departments = response.data;
	});
	
});
