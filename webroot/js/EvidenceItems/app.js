$(document).ready(function(){
	
	init_index();
	
});

function init_index() {
	
	$addButton = $('#add-button');
	$editButtons = $('[id^="edit-button-"]');
	$deleteButtons = $('[id^="delete-button-"]');
	
	$addButton.click(function(event){
		event.preventDefault();
		
		load_icon()
		
		$button = $(this);
		
		$.ajax({
			url: $button.attr('href'),
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
	
	$.each($editButtons, function() {
		$(this).click(function(event) {
			event.preventDefault();
			
			load_icon();
			
			$button = $(this);
			
			$.ajax({
				url: $button.attr('href'),
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
	
	$addForm = $('#form-add');
	
	$addForm.submit(function(event){
		event.preventDefault();
		
		$form = $(this);
		
		$.ajax({
			url: $form.attr('action'),
			type: 'POST',
			data: $form.serialize()
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
	
	$editForm = $('#form-edit');
	
	$editForm.submit(function(event){
		event.preventDefault();
		
		$form = $(this);
		
		$.ajax({
			url: $form.attr('action'),
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