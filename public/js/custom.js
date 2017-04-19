$(document).ready(function() {
	// $.validate({
 //      form: '#frm',
 //      language: es
 //    });
	// $('.file-img').click(function(event) {
	// 	$('#upload-bd').click();
	// });
	// $('#upload-bd').change(function() {
	// 	$filename = $('#upload-bd').val();
	// 	$('.filename').text($filename);
	// });
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
    $('#modalConfirm').on('shown.bs.modal', function(e) {
    	$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    $('#modalCancel').on('shown.bs.modal', function(e) {
    	$(this).find('.btn-cancel').attr('href', $(e.relatedTarget).data('href'));
    });
    
	$('.check-cs').click(function() {
		setTimeout(function() {
			$('.btn-submit').click();
		},1800);
	});

	
	$('#example').DataTable();
	$('#example_wrapper').children().children().next().children().children().children().removeClass('form-control').addClass('input-table');
	$('#example_wrapper').children().next().first().children().addClass('table-fluid');
	// $('#example_wrapper').children().next().next().children().removeClass('col-sm-5 col-sm-7').addClass('col-sm-4 col-sm-offset-4').children().addClass('text-center');
		

	$('#example_wrapper').children().first().addClass('data-table-header');
	// $('#example_wrapper').children().children().children().children().children().removeAttr('class');

	$('#myModal').on('shown.bs.modal', function() {
	  	$(this).find('[autofocus]').focus();
	  	$('.modal-content').click(function(event) {
	  		$(this).find('[autofocus]').focus();	  
	  	});
	});

	$('.eliminar-usuario').click(function(event) {
      	if (confirm('Realmente desea eliminar esta solicitud?')) {
        	$id = $(this).attr('data-id');
        	window.location.replace('eliminar_solicitud.php?id='+$id);
      	}
    });

    //Ajax
    $('#search').on('keyup keypress', function(e) {
	  var keyCode = e.keyCode || e.which;
	  if (keyCode === 13) { 
	    e.preventDefault();
	    return false;
	  }

	  var envio = $('#search').val();
		$.ajax({
			type: 'POST',
			url: 'ajax.php',
			data: ('search='+envio),
			success: function(resp) {
				if (resp != '') {
					$('#resultSearch').html(resp);
				}
			}
		})
	});

	

});