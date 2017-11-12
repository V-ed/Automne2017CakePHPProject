$(document).ready(function(){
	
	init_index();
	
});

function init_index() {
	
	var addButton = $('#add-button');
	var editButtons = $('[id^="edit-button-"]');
	var deleteButtons = $('[id^="delete-button-"]');
	
	addButton.click(function(event){
		event.preventDefault();
		
		var button = $(this);
		
		$.ajax({
			url: button.attr('href'),
		})
		.done(function(data) {
			console.log("success");
			init_add(data);
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
	
}

function init_add(data) {
	
	$('#viewport').empty().append(data);
	
	var submitButton = $('#submit-button');
	
	submitButton.click(function(event){
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
	
}
