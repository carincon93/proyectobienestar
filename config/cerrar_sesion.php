<?php 
	session_start();
	 
	/* comprobamos que un usuario registrado es el que accede al archivo, 
	sino no tendría sentido que pasara por este archivo */
	if (!isset($_SESSION[administrador])) 
	{
	    header("location:../index.php"); 
	}
	session_destroy();
	 
	//volvemos a la página principal
	header("location:../index.php"); 
?>