$(document).ready(function(){
	
	var addButton = $('#add-button');
	var editButtons = $('[id^="edit-button-"]');
	var deleteButtons = $('[id^="delete-button-"]');
	
	// var addButton = $('#add');
	// var editButton = $('#edit');
	
	console.log(addButton.parent().serialize());
	console.log(editButtons.parent().serialize());
	console.log(deleteButtons.parent().serialize());
	
	addButton.click(function(event){
		event.preventDefault();
		
		$.ajax({
			url: $(this).attr('href'), method: 'POST', data: addButton.parent().serialize()
		}).fail(function(){
			console.log('fail');
		}).done(function(){
			console.log('success');
		});
		
	});
	
	$.each(editButtons, function() {
		$(this).click(function(event) {
			event.preventDefault();
			
			var button = $(this);
			
			console.log(button.parent().serialize());
			
			$.ajax({
				url: button.attr('href'),
				// type: 'POST',
				// data: button.parent().serialize(),
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
	
	// editButton.click(function(event){
	// 	event.preventDefault();
		
	// 	$.ajax({
	// 		url: $(this).attr('href'), method: 'POST', data: editButton.parent().serialize()
	// 	}).fail(function(){
	// 		console.log('fail');
	// 	}).done(function(){
	// 		console.log('success');
	// 	});
		
	// });
	
});
