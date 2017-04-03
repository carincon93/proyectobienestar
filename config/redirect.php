<?php 
	if (isset($_SESSION['urol'])) {
		if ($_SESSION['urol'] == 'administrador') {
			header("location:administrador.php");
		} else if ($_SESSION['urol'] == 'cliente') {
			header("location:cliente.php");
		}
	}