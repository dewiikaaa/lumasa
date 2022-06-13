$(document).on("click", ".delete-product", function(e) {
 e.preventDefault();
 var url = $(this).attr('href');
 var $this = $(this);
 $.jAlert({
     'type': 'confirm',
     'confirmQuestion': 'Are you sure to delete this one?',
     'onConfirm': function(e, btn){
      window.location.href = url;
     },
     'onDeny': function(e, btn){
       e.preventDefault();
       //do something here
       btn.parents('.jAlert').closeAlert();
       return false;
     }
 });
});
