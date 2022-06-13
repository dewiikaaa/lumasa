$(document).on("click", ".add-question-group", function(e) {
		e.preventDefault();
		$("#parent-question-group").find('.question-group').find('.question-up').prop('disabled', false);
		$("#parent-question-group").find('.question-group').find('.question-down').prop('disabled', false);

	    var $cloneGroup = $("#parent-question-group").find(".question-group:first").clone();
	    var $questionNumber = ($(".question-group").length+1);


	    $("#parent-question-group").append($cloneGroup);
	    $("#parent-question-group").find('textarea.question:last').val('');

	    $("#parent-question-group").find('.question-group:last').find('.question-number').html($questionNumber);
	    $("#parent-question-group").find('.question-group:last').find('input[name="question_number"]').val($questionNumber);
	   	$("#parent-question-group").find(".question-group:last .add-question-group")
	   		.addClass('delete-question-group').removeClass('add-question-group')
	   		.addClass('btn-danger').removeClass('btn-info')
	   		.html('<i class="fa fa-trash"></i>');

			$("#parent-question-group").find('.question-group:last').find('.have-choice-radio').attr('name', 'have_choice_' + $questionNumber);
	   	$("#parent-question-group").find('.question-group:last').find('.choice-block').empty();
	   	$("#parent-question-group").find('.question-group:last').find('div[id^=cke_editor_]').remove();
		$("#parent-question-group").find('.question-group:last').find('textarea.question').prop('id', 'editor_' + $questionNumber);
		CKEDITOR.replace('editor_' + $questionNumber);
	   //	$("#parent-question-group").find('.question-group:last').find('.question-block').html('<textarea name="question[]" class="form-control editor question"  placeholder=""></textarea>');
	    //$('.editor').ckeditor();

	    $("#parent-question-group").find('.question-group:first').find('.question-up').prop('disabled', true);
		$("#parent-question-group").find('.question-group:last').find('.question-down').prop('disabled', true);

});

$(document).on("click", ".have-choice-radio", function(e) {
	var hvchoice = $(this).parent().parent().find('input.have-choice-radio:checked').val();
	if(hvchoice==0){
		 $(this).parent().parent().parent().parent().find('.have-choice').hide();
	}else{
		$(this).parent().parent().parent().parent().find('.have-choice').show();
	}
});

 $(document).on("click", ".delete-question-group", function(e) {
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

$(document).on("click", ".question-up", function(e) {
	e.preventDefault();
	var $totalBlock = $(".question-group").length;
	var $selectedBlockIndex = $(this).parent().parent().find('input[name="question_number"]').val();
	$selectedBlock = $(this).parent().parent().find('.question-group-content').clone().prop('innerHTML');
	$previousBlock = $(this).parent().parent().prev().find('.question-group-content').clone().prop('innerHTML');

	$selectedBlockQuestion = $(this).parent().parent().find('.question-group-content textarea.question').val();

	$previousBlockQuestion = $(this).parent().parent().prev().find('.question-group-content textarea.question').val();

	$(this).parent().parent().find('.question-group-content textarea.question').val($previousBlockQuestion);

	$(this).parent().parent().prev().find('.question-group-content textarea.question').val($selectedBlockQuestion);

});

$(document).on("click", ".question-down", function(e) {
	e.preventDefault();
	var $totalBlock = $(".question-group").length;
	var $selectedBlockIndex = $(this).parent().parent().find('input[name="question_number"]').val();
	$selectedBlock = $(this).parent().parent().find('.question-group-content').clone().prop('innerHTML');
	$nextBlock = $(this).parent().parent().next().find('.question-group-content').clone().prop('innerHTML');

	$selectedBlockQuestion = $(this).parent().parent().find('.question-group-content textarea.question').val();

	$nextBlockQuestion = $(this).parent().parent().next().find('.question-group-content textarea.question').val();

	$(this).parent().parent().find('.question-group-content textarea.question').val($nextBlockQuestion);

	$(this).parent().parent().next().find('.question-group-content textarea.question').val($selectedBlockQuestion);
});

$(document).on("click", ".add-choice", function() {
	var $choiceText = $(this).parent().parent().find('input.input-choice').val();
  	var $questionNumber = $(this).parent().parent().parent().parent().parent().parent().find('input[name="question_number"]').val();
 	//$questionNumber = '';
  if($choiceText==""){
  	alert('先に選択肢を入力してからこのボタンをクリックしてください');
  }else{
  	var $choiceLength = $(this).parent().parent().parent().parent().find('tr').length;
    var $choiceBlock = '<tr class="choice">'+
    					'<input type="hidden" name="choice_'+$questionNumber+'[]" value="'+$choiceText+'"/>'+
			            '<td class="choice-number">'+($choiceLength+1)+'. '+$choiceText+'</td>'+
			            '<td><button type="button" class="btn btn-sm btn-outline-danger delete-choice">'+
			            	'<i class="fas fa-times fa-fw"></i>削除'+
			            '</button></td>'+
			       '</tr>';
		$(this).parent().parent().parent().parent().find('.choice-block').append($choiceBlock);
		$(this).parent().parent().find('input').val("");
  }
});

$(document).on("click", ".delete-choice", function() {
    var id = $(this).data('id');
    var $this = $(this);
    $.jAlert({
	    'type': 'confirm',
	    'confirmQuestion': 'この選択肢を削除しますか？',
	    'confirmBtnText': 'はい',
	  	'denyBtnText': 'いいえ',
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
