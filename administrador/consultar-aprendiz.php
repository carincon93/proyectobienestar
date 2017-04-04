<?php 
	require '../config/app.php';
	require '../config/conexion.php';
	include '../templates/header.inc';
	include '../templates/navbar.inc';


	if ($_GET) {
		$cod_aprendiz = $_GET['cod_aprendiz'];

		$query 	= mysqli_query($con, "SELECT * FROM aprendices WHERE cod_aprendiz = '$cod_aprendiz'");
		$query2 = mysqli_query($con, "SELECT * FROM historial WHERE aprendiz_cod = '$cod_aprendiz' ORDER BY id DESC");

		$row	= mysqli_fetch_array($query);
	}
	if ($_POST) {
		$nombres = $_POST['nombres'];
		$apellidos = $_POST['apellidos'];
		$especialidad = $_POST['especialidad'];
		$option = $_POST['option'];
		$cod_aprendiz = $_POST['cod_aprendiz'];
		$date = $_POST['date'];
		


		$query= mysqli_query($con, "INSERT INTO historial VALUES (DEFAULT, '$nombres', '$apellidos', '$especialidad', '$option', '$cod_aprendiz', DEFAULT, '$date')");
		header("location: index.php");
	}
 ?>
<main>
	<ol class="breadcrumb">
		<li><a href="index.php">Inicio</a></li>
		<li class="active">Consultar aprendiz</li>

	</ol>
	<div class="container-fluid dashboard">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h2 class="text-capitalize"><?= $row['nombres'].' '.$row['apellidos'] ?> - <span class="text-uppercase">(<?= $row['especialidad'] ?>)</span></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo doloremque, impedit dignissimos porro in, illum. Beatae libero id repellendus ab, eaque nisi, officia ipsum officiis quasi itaque vel ea corporis earum voluptatum nulla voluptates laborum aperiam, vero! Repudiandae, quo, rerum!</p>
				<hr>
				<a class="btn btn-primary" href="index.php">Volver</a>
				<div class="panel panel-default">
					<!-- Default panel contents -->
					<div class="panel-heading">Panel heading</div>
					<div class="panel-body">
						<p>Lista de aprendices beneficiados.</p>
					</div>

					<!-- Table -->
					<div class="table-container">
						<form method="POST">
							<div class="checkbox">
								<label>
									<?php $row2 = mysqli_fetch_array($query2); ?>
									<input type="checkbox" name="option" value="1" <?php if ($row2['date'] == date('Y-m-d') && $row2['estado'] != 0) echo "disabled" ?> >
									Ha recibido el suplemento?
								</label>
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Nombres</label>
								<input type="text" value="<?= $row['nombres'] ?>" class="form-control" name="nombres">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Apellidos</label>
								<input type="text" value="<?= $row['apellidos'] ?>" class="form-control" name="apellidos">
							</div>
							<div class="form-group label-floating">
								<label class="control-label">Especialidad</label>
								<input type="text" value="<?= $row['especialidad'] ?>" class="form-control" name="especialidad">
							</div>
							<input type="text" name="date" value="<?= date('Y-m-d'); ?>" >
							
							<input type="hidden" value="<?= $row['cod_aprendiz'] ?>" name="cod_aprendiz">
							<h3>Historial</h3>
							<ol>
								<?php foreach ($query2 as $key => $row2): ?>
								<li><?php echo $row2['fecha'] ?></li>
								<?php endforeach ?>
							</ol>
							<button type="submit">Guardar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
 <?php include '../templates/footer.inc'; ?>