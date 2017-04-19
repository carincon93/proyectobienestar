<?php
	require '../config/app.php';
	require '../config/database.php';
	if ($_GET) {
		$id = $_GET['id'];
		$id = eliminarSolicitud($con, $id);
	}