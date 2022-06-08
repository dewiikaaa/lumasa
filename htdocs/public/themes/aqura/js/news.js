$(function () {
	$('#viewModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var title = button.data('title');
		var content = button.data('content');
		var modal = $(this);
	
		modal.find('#title-view').html('').html(title);
		modal.find('#content-view').html('').html(content);
	});

	$('#formModal').on('show.bs.modal', function (event) {
		var modal = $(this);
		var button = $(event.relatedTarget);	
		var id = button.data('id');

		if (typeof id != 'undefined') {
			var title = button.data('title');
			var content = button.data('content');
		
			modal.find('#id').val(id);
			modal.find('#title').val(title);
			modal.find('#content').val(content);
		}
		else {
			modal.find('#id').val('');
			modal.find('#title').val('');
			modal.find('#content').val('');
		}
	});

	$('.deleteBtn').on('click', function () {
		var id = $(this).data('id');
		var title = $(this).data('title');

		bootbox.confirm('Do you really want to delete this news (' + title + ')?', function (yes) {
			if (yes) {
				$.post(site_url + 'news/delete', { id: id }, function (res) {
					if (res.success) {
						window.location.reload(true);
					}
				}, 'json');
			}
		});
	});
});