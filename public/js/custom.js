$(document).ready(function() {
	$(document).resize(function(event) {
		/* Act on the event */
	});
	$('.file-img').click(function(event) {
		$('#upload-bd').click();
	});
	$('#upload-bd').change(function() {
		$filename = $('#upload-bd').val();
		$('.filename').text($filename);
	});

    $('#myModal').on('shown.bs.modal', function(e) {
    	$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
    $('#modalCancel').on('shown.bs.modal', function(e) {
    	$(this).find('.btn-cancel').attr('href', $(e.relatedTarget).data('href'));
    });

});