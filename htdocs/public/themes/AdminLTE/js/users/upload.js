$(function () {
	$(".file-upload").on('click', function () {
		var file = $(this).data('field-name');
		$("input[name=" + file + "]").click();
	});

	$('.prev-image').each(function () {
		var src = $(this).data('src');
		$(this).alertOnClick({
			'image': src,
			'imageWidth': '100%',
			'size': 'lg',
			'noPadContent':true
		});
	});
});

$(document).on('change', '.berkas-scan', function () {

	var fieldname = $(this).prop('name');
	var berkas    = document.getElementsByName(fieldname)[0].files[0];
	var form_data = new FormData();
	var oFReader  = new FileReader();
	
	oFReader.onload = function (e) {
		rawImg = e.target.result;
		$('#img-' + fieldname).prop('src', rawImg).removeClass('d-none');
	}

	oFReader.readAsDataURL(berkas);

	form_data.append(fieldname, berkas);
	form_data.append('id', $(this).data('id'));

	$.ajax({
		url: "/admin/users/uploadFiles",
		method: "POST",
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		dataType: 'JSON',
		beforeSend: function () {
			//
		},
		success: function (res) {
			$('.has-upload-' + fieldname).removeClass('d-none');
			$('#filename-' + fieldname).html('').html(res.message);
			$('#' + fieldname).val(res.filename);
		}
	});
});