$(document).on("click", ".add-qna-group", function(e) {
		e.preventDefault();
		$("#parent-qna-group").find('.qna-group').find('.qna-up').prop('disabled', false);
		$("#parent-qna-group").find('.qna-group').find('.qna-down').prop('disabled', false);

	    var $cloneGroup = $("#parent-qna-group").find(".qna-group:first").clone();
	    var $questionNumber = ($(".qna-group").length+1);
	    

	    $("#parent-qna-group").append($cloneGroup);
	    $("#parent-qna-group").find('textarea.title:last').val('');
	    $("#parent-qna-group").find('textarea.youtube:last').val('');
	    $("#parent-qna-group").find('textarea.content:last').val('');

	    $("#parent-qna-group").find('.qna-group:last').find('.question-number').html($questionNumber);
	    $("#parent-qna-group").find('.qna-group:last').find('input[name="question_number"]').val($questionNumber);
	   	$("#parent-qna-group").find(".qna-group:last .add-qna-group")
	   		.addClass('delete-qna-group').removeClass('add-qna-group')
	   		.addClass('btn-danger').removeClass('btn-info')
	   		.html('<i class="fa fa-trash"></i>');

	   	$("#parent-qna-group").find('.qna-group:last').find('.answer-block').html('<textarea name="content[]" class="form-control editor answer"  placeholder=""></textarea>');
	    
	    $("#parent-qna-group").find('.qna-group:last').find('.image').attr('name', 'image_'+$questionNumber)

	    $("#parent-qna-group").find('.qna-group:last').find('.existing-image').remove();
	  
	    $('.editor').ckeditor();

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

	
	$selectedBlockQuestion = $(this).parent().parent().find('.qna-group-content textarea.title').val();
	$selectedBlockYoutube = $(this).parent().parent().find('.qna-group-content textarea.youtube').val();
	$selectedBlockAnswer = $(this).parent().parent().find('.qna-group-content textarea.content').val();

	$previousBlockQuestion = $(this).parent().parent().prev().find('.qna-group-content textarea.title').val();
	$previousBlockYoutube = $(this).parent().parent().prev().find('.qna-group-content textarea.youtube').val();
	$previousBlockAnswer = $(this).parent().parent().prev().find('.qna-group-content textarea.content').val();

	$(this).parent().parent().find('.qna-group-content textarea.title').val($previousBlockQuestion);
	$(this).parent().parent().find('.qna-group-content textarea.youtube').val($previousBlockYoutube);
	$(this).parent().parent().find('.qna-group-content textarea.content').val($previousBlockAnswer);

	$(this).parent().parent().prev().find('.qna-group-content textarea.title').val($selectedBlockQuestion);
	$(this).parent().parent().prev().find('.qna-group-content textarea.youtube').val($selectedBlockYoutube);
	$(this).parent().parent().prev().find('.qna-group-content textarea.content').val($selectedBlockAnswer);

	});

$(document).on("click", ".qna-down", function(e) {
	e.preventDefault();
	var $totalBlock = $(".qna-group").length;
	var $selectedBlockIndex = $(this).parent().parent().find('input[name="question_number"]').val();
	var $nextBlockIndex = ($selectedBlockIndex+1);

	$selectedBlockQuestion = $(this).parent().parent().find('.qna-group-content textarea.title').val();
	$selectedBlockYoutube = $(this).parent().parent().find('.qna-group-content textarea.youtube').val();
	$selectedBlockAnswer = $(this).parent().parent().find('.qna-group-content textarea.content').val();

	$nextBlockQuestion = $(this).parent().parent().next().find('.qna-group-content textarea.title').val();
	$nextBlockYoutube = $(this).parent().parent().next().find('.qna-group-content textarea.youtube').val();
	$nextBlockAnswer = $(this).parent().parent().next().find('.qna-group-content textarea.content').val();

	$(this).parent().parent().find('.qna-group-content textarea.title').val($nextBlockQuestion);
	$(this).parent().parent().find('.qna-group-content textarea.youtube').val($nextBlockYoutube);
	$(this).parent().parent().find('.qna-group-content textarea.content').val($nextBlockAnswer);

	$(this).parent().parent().next().find('.qna-group-content textarea.title').val($selectedBlockQuestion);
	$(this).parent().parent().next().find('.qna-group-content textarea.youtube').val($selectedBlockYoutube);
	$(this).parent().parent().next().find('.qna-group-content textarea.content').val($selectedBlockAnswer);

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

	     	$.post(site_url+'admin/contents/delete_image', {id: id})
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


$(document).on("click", ".add-content", function(e) {
	e.preventDefault();
 	$('#formContentModal .modal-body input[name="id"]').val();
  	$('#formContentModal .modal-body input[name="title"]').val();
  	$('#formContentModal').modal('show');
});


$(document).on("click", ".edit-content", function(e) {
	e.preventDefault();
	var id = $(this).attr('id');
	var title = $(this).attr('title');
 	$('#formContentModal .modal-body input[name="id"]').val(id);
  	$('#formContentModal .modal-body input[name="title"]').val(title);
  	$('#formContentModal').modal('show');
});

$(document).on("click", ".delete-content", function(e) {
	e.preventDefault();
	var id = $(this).attr('id');
	
	$.jAlert({
    'type': 'confirm',
    'confirmQuestion': 'Are you sure to delete this one?',
    'onConfirm': function(e, btn){
      e.preventDefault();

     	$.post(site_url+'admin/contents/delete', {id: id})
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

$(document).on("click", ".add-title", function(e) {
	e.preventDefault();
 	$('#formContentModal .modal-body input[name="id"]').val();
  	$('#formContentModal .modal-body input[name="title"]').val();
  	$('#formContentModal').modal('show');
});


$(document).on("click", ".edit-title", function(e) {
	e.preventDefault();
	var id = $(this).attr('id');
	var title = $(this).attr('title');
 	$('#formContentModal .modal-body input[name="id"]').val(id);
  	$('#formContentModal .modal-body input[name="title"]').val(title);
  	$('#formContentModal').modal('show');
});

$(document).on("click", ".delete-title", function(e) {
	e.preventDefault();
	var id = $(this).attr('id');
	
	$.jAlert({
    'type': 'confirm',
    'confirmQuestion': 'Are you sure to delete this one?',
    'onConfirm': function(e, btn){
      e.preventDefault();

     	$.post(site_url+'admin/contents/delete_title', {id: id})
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


