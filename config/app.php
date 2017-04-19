<?php
session_start();
$base_url 	= "http://localhost/proyectobienestar2/";
$assets_css = $base_url."public/css/";
$assets_js 	= $base_url."public/js/";
$assets_imgs= $base_url."public/imgs/";

date_default_timezone_set('America/Bogota');

$host = "localhost";
$user = "root";
$pass = "";
$ndb  = "proyecto_bienestar_bd";
$con  = null;

$stm  = null;