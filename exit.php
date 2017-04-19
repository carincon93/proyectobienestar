<?php
	session_start();
	unset($_SESSION['uid']);
	unset($_SESSION['unombres']);
	unset($_SESSION['urol']);

	session_destroy();
	header("location:index.php");
