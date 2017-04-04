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

    $('.si').click(function(event) {
        if(confirm('El aprendiz recibira apoyo?')){
            $id = $(this).attr('data-id');
            window.location.replace('../administrador/seleccion.php?id='+$id);
        }else{
        	alert('Proceso Cancelado');
        }
    });
     $('.no').click(function(event) {
        if(confirm('El aprendiz no recibira el apoyo?')){
            $id = $(this).attr('data-id');
            window.location.replace('../administrador/selno.php?id='+$id);
        }else{
        	alert('Proceso Cancelado');
        }
    });

});