$(document).ready(function(){
	
	var addButton = $('#add-button');
	var editButtons = $('[id^="edit-button-"]');
	var deleteButtons = $('[id^="delete-button-"]');
	
	console.log(addButton.parent().serialize());
	console.log(editButtons.parent().serialize());
	console.log(deleteButtons.parent().serialize());
	
	addButton.click(function(event){
		event.preventDefault();
		
		var button = $(this);
		
		$.ajax({
			url: button.attr('href'),
		})
		.done(function(data) {
			console.log("success");
			$('#viewport').empty().append(data);
		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
		});
		
	});
	
	$.each(editButtons, function() {
		$(this).click(function(event) {
			event.preventDefault();
			
			var button = $(this);
			
			console.log(button.parent().serialize());
			
			$.ajax({
				url: button.attr('href'),
			})
			.done(function(data) {
				console.log("success");
				console.log(data);
			})
			.fail(function(data) {
				console.log("error");
			})
			.always(function(data) {
				console.log("complete");
			});
			
		});
	});
	
});
