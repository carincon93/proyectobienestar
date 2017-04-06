<?php
include "../config/conexion.php";
if ($_GET) {
	$id = $_GET['id'];
	$row = mysqli_query($con, "DELETE FROM aprendices WHERE id_aprendices = $id");
	if ($row) {
	echo "<script>
		alert('user delete succesfull...');
		window.location.replace('index.php');
	</script>";
	}
}
?>