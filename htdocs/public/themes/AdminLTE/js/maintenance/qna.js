$(document).on("click", ".add-qna-group", function(e) {
		e.preventDefault();
		$("#parent-qna-group").find('.qna-group').find('.qna-up').prop('disabled', false);
		$("#parent-qna-group").find('.qna-group').find('.qna-down').prop('disabled', false);

	    var $cloneGroup = $("#parent-qna-group").find(".qna-group:first").clone();
	    var $questionNumber = ($(".qna-group").length+1);
	    

	    $("#parent-qna-group").append($cloneGroup);
	    $("#parent-qna-group").find('textarea.question:last').val('');
	    $("#parent-qna-group").find('textarea.answer:last').val('');

	    $("#parent-qna-group").find('.qna-group:last').find('.question-number').html($questionNumber);
	    $("#parent-qna-group").find('.qna-group:last').find('input[name="question_number"]').val($questionNumber);
	   	$("#parent-qna-group").find(".qna-group:last .add-qna-group")
	   		.addClass('delete-qna-group').removeClass('add-qna-group')
	   		.addClass('btn-danger').removeClass('btn-info')
	   		.html('<i class="fa fa-trash"></i>');

	   	$("#parent-qna-group").find('.qna-group:last').find('.answer-block').html('<textarea name="answer[]" class="form-control editor answer"  placeholder=""></textarea>');
	    
	    $("#parent-qna-group").find('.qna-group:last').find('.company_url_check').prop('checked', false);
	    $("#parent-qna-group").find('.qna-group:last').find('.company_url_check').attr('name', 'company_url_check_'+$questionNumber)

	    $("#parent-qna-group").find('.qna-group:last').find('.order_form_check').prop('checked', false);
	    $("#parent-qna-group").find('.qna-group:last').find('.order_form_check').attr('name', 'order_form_check_'+$questionNumber)

	    $("#parent-qna-group").find('.qna-group:last').find('.phone_check').prop('checked', false);
	    $("#parent-qna-group").find('.qna-group:last').find('.phone_check').attr('name', 'phone_check_'+$questionNumber)


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

	$selected_company_url_check = $(this).parent().parent().find('.checkbox-group .company_url_check').is(":checked");
	$selected_order_form_check = $(this).parent().parent().find('.checkbox-group .order_form_check').is(":checked");
	$selected_phone_check = $(this).parent().parent().find('.checkbox-group .phone_check').is(":checked");

	$prev_company_url_check = $(this).parent().parent().prev().find('.checkbox-group .company_url_check').is(":checked");
	$prev_order_form_check = $(this).parent().parent().prev().find('.checkbox-group .order_form_check').is(":checked");
	$prev_phone_check = $(this).parent().parent().prev().find('.checkbox-group .phone_check').is(":checked");

	$selectedBlockQuestion = $(this).parent().parent().find('.qna-group-content textarea.question').val();
	$selectedBlockAnswer = $(this).parent().parent().find('.qna-group-content textarea.answer').val();

	$previousBlockQuestion = $(this).parent().parent().prev().find('.qna-group-content textarea.question').val();
	$previousBlockAnswer = $(this).parent().parent().prev().find('.qna-group-content textarea.answer').val();

	$(this).parent().parent().find('.qna-group-content textarea.question').val($previousBlockQuestion);
	$(this).parent().parent().find('.qna-group-content textarea.answer').val($previousBlockAnswer);

	$(this).parent().parent().prev().find('.qna-group-content textarea.question').val($selectedBlockQuestion);
	$(this).parent().parent().prev().find('.qna-group-content textarea.answer').val($selectedBlockAnswer);

	$(this).parent().parent().find('.checkbox-group .company_url_check').prop('checked',$prev_company_url_check);
	$(this).parent().parent().find('.checkbox-group .order_form_check').prop('checked',$prev_order_form_check);
	$(this).parent().parent().find('.checkbox-group .phone_check').prop('checked',$prev_phone_check);

	$(this).parent().parent().prev().find('.checkbox-group .company_url_check').prop('checked',$selected_company_url_check);
	$(this).parent().parent().prev().find('.checkbox-group .order_form_check').prop('checked',$selected_order_form_check);
	$(this).parent().parent().prev().find('.checkbox-group .phone_check').prop('checked',$selected_phone_check);
});

$(document).on("click", ".qna-down", function(e) {
	e.preventDefault();
	var $totalBlock = $(".qna-group").length;
	var $selectedBlockIndex = $(this).parent().parent().find('input[name="question_number"]').val();
	var $nextBlockIndex = ($selectedBlockIndex+1);


	$selected_company_url_check = $(this).parent().parent().find('.checkbox-group .company_url_check').is(":checked");
	$selected_order_form_check = $(this).parent().parent().find('.checkbox-group .order_form_check').is(":checked");
	$selected_phone_check = $(this).parent().parent().find('.checkbox-group .phone_check').is(":checked");

	$next_company_url_check = $(this).parent().parent().next().find('.checkbox-group .company_url_check').is(":checked");
	$next_order_form_check = $(this).parent().parent().next().find('.checkbox-group .order_form_check').is(":checked");
	$next_phone_check = $(this).parent().parent().next().find('.checkbox-group .phone_check').is(":checked");

	$selectedBlockQuestion = $(this).parent().parent().find('.qna-group-content textarea.question').val();
	$selectedBlockAnswer = $(this).parent().parent().find('.qna-group-content textarea.answer').val();

	$nextBlockQuestion = $(this).parent().parent().next().find('.qna-group-content textarea.question').val();
	$nextBlockAnswer = $(this).parent().parent().next().find('.qna-group-content textarea.answer').val();

	$(this).parent().parent().find('.qna-group-content textarea.question').val($nextBlockQuestion);
	$(this).parent().parent().find('.qna-group-content textarea.answer').val($nextBlockAnswer);

	$(this).parent().parent().next().find('.qna-group-content textarea.question').val($selectedBlockQuestion);
	$(this).parent().parent().next().find('.qna-group-content textarea.answer').val($selectedBlockAnswer);

	$(this).parent().parent().find('.checkbox-group .company_url_check').prop('checked',$next_company_url_check);
	$(this).parent().parent().find('.checkbox-group .order_form_check').prop('checked',$next_order_form_check);
	$(this).parent().parent().find('.checkbox-group .phone_check').prop('checked',$next_phone_check);

	$(this).parent().parent().next().find('.checkbox-group .company_url_check').prop('checked',$selected_company_url_check);
	$(this).parent().parent().next().find('.checkbox-group .order_form_check').prop('checked',$selected_order_form_check);
	$(this).parent().parent().next().find('.checkbox-group .phone_check').prop('checked',$selected_phone_check);
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

	     	$.post(site_url+'admin/maintenance/delete_image', {id: id})
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