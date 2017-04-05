<?php 
    require "../config/conexion.php";
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "UPDATE aprendices SET estado = 1 WHERE id_aprendices = $id";
		if(mysqli_query($con, $sql)){
			echo "<script>window.location.replace('index.php');</script>";
		}else{
			echo "No se pudo realizar la acción!";
		}
		mysqli_close($con);
	}
 ?>