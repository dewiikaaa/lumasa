$('.datepicker, .gc-input-date').datepicker({
	weekStart: 1,
	format: 'yyyy-mm-dd',
	autoclose: true,
	orientation: 'bottom',
	language: 'ja',
});

$('.trigger-datepicker').on('click', function () {
	$(this).parent().parent().find('.datepicker').focus();
});