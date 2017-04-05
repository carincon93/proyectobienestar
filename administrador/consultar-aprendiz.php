<?php 
	require '../config/app.php';
	require '../config/conexion.php';
	include '../templates/header.inc';
	include '../templates/navbar.inc';


	if ($_GET) {
		$cod_aprendiz = $_GET['cod_aprendiz'];

		$query 	= mysqli_query($con, "SELECT * FROM aprendices WHERE cod_aprendiz = '$cod_aprendiz'");
		$query_historial = mysqli_query($con, "SELECT * FROM historial WHERE aprendiz_cod = '$cod_aprendiz' ORDER BY id DESC");

		$row	= mysqli_fetch_array($query);
		$row_historial = mysqli_fetch_array($query_historial);

	}
	if ($_POST) {
		$nombre_completo = $_POST['nombre_completo'];
		$programa_formacion = $_POST['programa_formacion'];
		$estado = $_POST['estado'];
		$cod_aprendiz = $_POST['cod_aprendiz'];
		$date = $_POST['date'];
		


		$query = mysqli_query($con, "INSERT INTO historial VALUES (DEFAULT, '$nombre_completo', '$programa_formacion', '$estado', '$cod_aprendiz', DEFAULT, '$date')");
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
				<a class="btn btn-primary" href="index.php">Volver</a>
				<h2 class="text-capitalize"><?= $row['nombre_completo'] ?> - <span class="text-uppercase">(<?= $row['programa_formacion'] ?>)</span></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo doloremque, impedit dignissimos porro in, illum. Beatae libero id repellendus ab, eaque nisi, officia ipsum officiis quasi itaque vel ea corporis earum voluptatum nulla voluptates laborum aperiam, vero! Repudiandae, quo, rerum!</p>
				<hr>
				<div class="panel panel-default">
					<!-- Default panel contents -->
					
					<?php if ($row_historial['date'] == date('Y-m-d') && $row_historial['estado'] != 0): ?>
					<div class="alert alert-success">
						<div class="container-fluid">
							<div class="alert-icon">
								<i class="material-icons">check</i>
							</div>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							</button>
							<b>Alerta:</b> El aprendiz ya recibió el suplemento alimenticio. <strong>La fecha y hora de entrega <?= $row_historial['fecha'] ?></strong>
						</div>
					</div>
					<?php endif ?>
					

					<!-- Table -->
					<div class="">
						<form method="POST">
							<div class="checkbox">
								<div class="alert-icon col-md-1">
									<i class="material-icons">info_outline</i>
								 </div>
								<label class="col-md-11">									
									<p>Marca esta casilla una vez el aprendiz haya recibido el suplemento alimenticio!</p>								
									<input type="checkbox" name="estado" value="1" <?php if ($row_historial['date'] == date('Y-m-d') && $row_historial['estado'] != 0) echo "checked disabled" ?> >
									Ha recibido el suplemento?
								</label>
							</div>
							<div class="table-container">
								
								
								<div class="form-group label-floating">
									<label class="control-label">Nombre completo</label>
									<input type="text" value="<?= $row['nombre_completo'] ?>" class="form-control" name="nombre_completo">
								</div>
								<div class="form-group label-floating">
									<label class="control-label">Programa de formación</label>
									<input type="text" value="<?= $row['programa_formacion'] ?>" class="form-control" name="programa_formacion">
								</div>
								<div class="form-group label-floating">
									<label class="control-label">Número de ficha</label>
									<input type="text" value="<?= $row['numero_ficha'] ?>" class="form-control" name="numero_ficha">
								</div>
								<input type="date" name="date" value="<?= date('Y-m-d'); ?>"  class="hidden">
								
								<input type="hidden" value="<?= $row['cod_aprendiz'] ?>" name="cod_aprendiz">
								<h3>Historial</h3>
								<ol>
									<?php foreach ($query_historial as $key => $row_historial): ?>
									<li><?= $row_historial['fecha'] ?></li>
									<?php endforeach; ?>
								</ol>
								<button type="submit" class="btn" <?php if ($row_historial['date'] == date('Y-m-d') && $row_historial['estado'] != 0) echo "disabled" ?>>Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
 <?php include '../templates/footer.inc'; ?>