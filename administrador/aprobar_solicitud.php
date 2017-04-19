<?php 
   	require '../config/app.php';
	require '../config/database.php';
	require '../config/security.php';
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		
		aprobarSolicitud($con, $id);
	}