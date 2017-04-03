<?php
	//Sessions
	session_start();

	//Assets Publics
 	$base_url     = "http://localhost/adsi1132816/pdo/";
 	$assets_css   = $base_url."public/css/";
 	$assets_js    = $base_url."public/js/";
 	$assets_imgs  = $base_url."public/imgs/";

 	// Data Base
 	$host = "localhost";
 	$user = "root";
 	$pass = "";
 	$ndb  = "adsi1132816";
 	$con  = null;

 	$stm  = null;