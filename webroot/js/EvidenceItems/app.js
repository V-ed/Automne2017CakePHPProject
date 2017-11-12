$(document).ready(function(){
	
	init_index();
	
});

function init_index() {
	
	var addButton = $('#add-button');
	var editButtons = $('[id^="edit-button-"]');
	var deleteButtons = $('[id^="delete-button-"]');
	
	addButton.click(function(event){
		event.preventDefault();
		
		load_icon()
		
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
			unload_icon();
		});
		
	});
	
	$.each(editButtons, function() {
		$(this).click(function(event) {
			event.preventDefault();
			
			load_icon();
			
			var button = $(this);
			
			$.ajax({
				url: button.attr('href'),
			})
			.done(function(data) {
				console.log("success");
				init_edit(data);
			})
			.fail(function(data) {
				console.log("error");
			})
			.always(function(data) {
				console.log("complete");
				unload_icon();
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
			set_viewport(data);
		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
		});
		
	});
	
}

function init_edit(data) {
	
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
			set_viewport(data);
		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
		});
		
	});
	
}

function set_viewport(data) {
	$('#viewport').empty().append(data);
}

function load_icon() {
	$('#ajax-loading-icon').show();
}

function unload_icon() {
	$('#ajax-loading-icon').hide();
}