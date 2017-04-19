<?php
	$base_url = 'http://localhost/proyectobienestar2/';
	if (isset($_SESSION['urol']) != 'administrador') {
		header("location:".$base_url."index.php");
	}