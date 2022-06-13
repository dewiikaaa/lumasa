$(document).on("click", ".add-qna-group", function(e) {
		e.preventDefault();
		$("#parent-qna-group").find('.qna-group').find('.qna-up').prop('disabled', false);
		$("#parent-qna-group").find('.qna-group').find('.qna-down').prop('disabled', false);

	    var $cloneGroup = $("#parent-qna-group").find(".qna-group:first").clone();
	    var $questionNumber = ($(".qna-group").length+1);

	    $("#parent-qna-group").append($cloneGroup);
	    $("#parent-qna-group").find('textarea.question:last').val('');

	    $("#parent-qna-group").find('.qna-group:last').find('.question-number').html($questionNumber);
	    $("#parent-qna-group").find('.qna-group:last').find('input[name="question_number"]').val($questionNumber);
	   	$("#parent-qna-group").find(".qna-group:last .add-qna-group")
	   		.addClass('delete-qna-group').removeClass('add-qna-group')
	   		.addClass('btn-danger').removeClass('btn-info')
		.html('<i class="fa fa-trash"></i>');
	
		$("#parent-qna-group").find('.qna-group:last').find('div[id^=cke_editor_]').remove();
		$("#parent-qna-group").find('.qna-group:last').find('textarea.question').prop('id', 'editor_' + $questionNumber);

	    CKEDITOR.replace('editor_' + $questionNumber);

	    $("#parent-qna-group").find('.qna-group:first').find('.qna-up').prop('disabled', true);
		$("#parent-qna-group").find('.qna-group:last').find('.qna-down').prop('disabled', true);

});

 $(document).on("click", ".delete-qna-group", function(e) {
 	e.preventDefault();
 	var $this = $(this);
 	$.jAlert({
	    'type': 'confirm',
	    'confirmQuestion': 'Are you sure to delete this one?',
	    'onConfirm': function(e, btn){
	      e.preventDefault();
	     	$this.parent().parent().remove();
	      	btn.parents('.jAlert').closeAlert();
	      	return false;
	    },
	    'onDeny': function(e, btn){
	      e.preventDefault();
	      //do something here
	      btn.parents('.jAlert').closeAlert();
	      return false;
	    }
	});
 });

$(document).on("click", ".qna-up", function(e) {
	e.preventDefault();
	var $totalBlock = $(".qna-group").length;
	var $selectedBlockIndex = $(this).parent().parent().find('input[name="question_number"]').val();
	var $previousBlockIndex = ($selectedBlockIndex-1);

	$selectedBlockQuestion = $(this).parent().parent().find('.qna-group-content textarea.question').val();

	$previousBlockQuestion = $(this).parent().parent().prev().find('.qna-group-content textarea.question').val();

	$(this).parent().parent().find('.qna-group-content textarea.question').val($previousBlockQuestion);

	$(this).parent().parent().prev().find('.qna-group-content textarea.question').val($selectedBlockQuestion);
});

$(document).on("click", ".qna-down", function(e) {
	e.preventDefault();
	var $totalBlock = $(".qna-group").length;
	var $selectedBlockIndex = $(this).parent().parent().find('input[name="question_number"]').val();
	var $nextBlockIndex = ($selectedBlockIndex+1);

	$selectedBlockQuestion = $(this).parent().parent().find('.qna-group-content textarea.question').val();

	$nextBlockQuestion = $(this).parent().parent().next().find('.qna-group-content textarea.question').val();

	$(this).parent().parent().find('.qna-group-content textarea.question').val($nextBlockQuestion);

	$(this).parent().parent().next().find('.qna-group-content textarea.question').val($selectedBlockQuestion);
});

$(document).on("click", ".btn-delete-image", function(e) {
	e.preventDefault();
	var id = $(this).attr('data-id');
 	var $this = $(this);
 	$.jAlert({
	    'type': 'confirm',
	    'confirmQuestion': 'Are you sure to delete this one?',
	    'onConfirm': function(e, btn){
	      e.preventDefault();

	     	$.post(site_url+'admin/dailyMaintenance/delete_image', {id: id})
                    .done(function (data) {
                       location.reload();
                    });
	      	btn.parents('.jAlert').closeAlert();
	      	return false;
	    },
	    'onDeny': function(e, btn){
	      e.preventDefault();
	      //do something here
	      btn.parents('.jAlert').closeAlert();
	      return false;
	    }
	});
});