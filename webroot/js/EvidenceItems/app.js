$(document).ready(function(){
	
	init_index();
	
});

function init_index() {
	
	$addButton = $('#add-button');
	$editButtons = $('[id^="edit-button-"]');
	$deleteButtons = $('[id^="delete-button-"]');
	
	$addButton.click(function(event){
		event.preventDefault();
		
		$button = $(this);
		
		load_icon();
		
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
			
			$button = $(this);
			
			load_icon();
			
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
	
	$.each($deleteButtons, function() {
		$(this).click(function(event) {
			event.preventDefault();
			
			$button = $(this);
			
			var is_confirmed = confirm($button.attr('data-confirm-text'));
			
			if (is_confirmed) {
				
				load_icon();
				
				$.ajax({
					url: $button.attr('href'),
				})
				.done(function(data) {
					console.log("success");
					init_delete(data);
				})
				.fail(function(data) {
					console.log("error");
				})
				.always(function(data) {
					console.log("complete");
					unload_icon();
				});
				
			}
			
		});
	});
	
}

function init_add(data) {
	
	set_viewport(data);
	
	$addForm = $('#form-add');
	
	$addForm.submit(function(event){
		event.preventDefault();
		
		$form = $(this);
		
		load_icon();
		
		$.ajax({
			url: $form.attr('action'),
			type: 'POST',
			data: $form.serialize()
		})
		.done(function(data) {
			console.log("success");
			set_viewport(data);
			init_index();
		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
			unload_icon();
		});
		
	});
	
}

function init_edit(data) {
	
	set_viewport(data);
	
	$editForm = $('#form-edit');
	
	$editForm.submit(function(event){
		event.preventDefault();
		
		$form = $(this);
		
		load_icon();
		
		$.ajax({
			url: $form.attr('action'),
			type: 'POST',
			data: $form.serialize()
		})
		.done(function(data) {
			console.log("success");
			set_viewport(data);
			init_index();
		})
		.fail(function(data) {
			console.log("error");
		})
		.always(function(data) {
			console.log("complete");
			unload_icon();
		});
		
	});
	
}

function init_delete(data) {
	set_viewport(data);
	init_index();
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
