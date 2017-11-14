$(document).ready(function () {
	
	$('#field-departments').change(function(event) {
		
		$rankField = $('#field-officer_ranks');
		
		var departmentId = $(this).val();
		
		if (departmentId) {
			
			$.ajax({
				url: urlToLinkedListFilter,
				data: 'category_id=' + departmentId,
			})
			.done(function(ranks) {
				console.log("success");
				
				$rankField.find('option').remove();
				
				$.each(ranks, function (key, value)
				{
					$.each(value, function (childKey, childValue) {
						$rankField.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
					});
				});
				
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
			
		} else {
			$('#subcategory-id').html('<option value="">Select Category first</option>');
		}
		
	});
	
});

function load_icon() {
	$('#ajax-loading-icon').show();
}

function unload_icon() {
	$('#ajax-loading-icon').hide();
}
