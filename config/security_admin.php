<?php 
	if (!isset($_SESSION['urol'])) {
		echo "<script>
				alert('Acceso denegado!');
				window.location.replace('index.php');
			</script>";
	} else {
		if ($_SESSION['urol'] == 'cliente') {
			echo "<script>alert('Acceso Denegado!');
					window.location.replace('index.php');
				</script>";
		}
	}