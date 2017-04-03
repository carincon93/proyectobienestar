<?php 
	require 'conexion.php';
	$correo = $_POST['correo'];
	$clave = $_POST['clave'];
 	$sql = "SELECT nombre, apellido FROM administrador WHERE correo = '$correo' AND clave = '$clave'";
 	
	$query = mysqli_query($con, $sql);
 	if(mysqli_num_rows($query) > 0){
 		$row = mysqli_fetch_array($query);
 		$_SESSION['nombre'] = $row['nombre']." ".$row['apellido']; 		
 		header("location: ../administrador/index.php");		
 	}else {
 		echo "<script>
 			alert('Correo o Contraseña Incorrectos');
 			window.location.replace('../index.php');
 		</script>";
	}
 ?>