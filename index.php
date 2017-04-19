<?php 
require 'config/app.php';
require 'config/database.php';
require 'config/redirect.php';
include 'templates/header.inc';
?>
    <h1>Hello, world!</h1>
    <form method="POST">
    	<input type="email" name="correo" placeholder="Correo Electrónico">
    	<input type="password" name="contrasena" placeholder="Digíte su contraseña">
    	<button type="submit">Ingresar</button>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
    	<?php 
    	$correo 	= $_POST['correo'];
    	$contrasena = $_POST['contrasena'];
    	if(login($con, $correo, $contrasena)) {
			header("location:administrador/index.php");
			exit();
		}
		$con = null;
    	?>
    <?php endif ?>

<?php include 'templates/footer.inc'; ?>