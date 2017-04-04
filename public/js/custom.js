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
});