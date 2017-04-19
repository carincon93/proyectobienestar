<?php 
	if (isset($_SESSION['urol'])) {
		if ($_SESSION['urol'] == 'administrador') {
			header("location:administrador/index.php");
		}
	}