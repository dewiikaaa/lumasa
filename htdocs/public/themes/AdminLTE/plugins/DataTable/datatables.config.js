// uncomment this to extend custom display and custom language

$.extend( true, $.fn.dataTable.defaults, {
    "dom" : "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
			"<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-2 text-left'i><'col-sm-10 text-right'p>>",
   "language": {
        "url": theme_url + "/plugins/DataTable/ja-JP.json"
    }
});

$(function () {
    $('.datatable-grid').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'stateSave'   : true
  });
});
