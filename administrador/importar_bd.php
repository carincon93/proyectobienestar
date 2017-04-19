<?php 
	require '../config/app.php';
	require '../config/database.php';
	require '../config/security.php';
	include '../templates/header.inc';
	include '../templates/navbar.inc';
	$page = 'importar_solicitud';



	if (isset($_POST['import-bd'])) {
		
		$file = $_FILES['file']['tmp_name'];
		if (file_exists($file)) {
			$handle = fopen($file, "r");
			$c = 1;

			importarbd($con, $c, $file, $handle);	
		}
			
	}
						

?>
<ol class="breadcrumb">
	<li><a href="index.php">Inicio</a></li>
	<li class="active">Importar solicitudes</li>
</ol>
<main>
    <div class="container">
        <div class="row">
			<?php include '../templates/asidenav.inc'; ?>
            <div class="col-md-10">
            	<?php if (isset($_SESSION['message_action'])): ?>				
					<div class="alert alert-success">
					    <div class="container-fluid">
						  <div class="alert-icon">
							<i class="material-icons">check</i>
						  </div>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true"><i class="material-icons">clear</i></span>
						  </button>
					      <b>Aviso: </b><?= $_SESSION['message_action'] ?>
					    </div>
					</div>
						<?php unset($_SESSION['message_action']); ?>
				<?php endif ?>

            	<h3><i class="fa fa-file"></i> Importar solicitudes</h3>
				<p>Lorem ipsum dolor sit.</p>
				<hr>
				
				<div class="col-md-7">
					<h5 class="title-boxes">Instrucciones para importar solicitudes</h5>
					<ol>
						<li class="reset-li">En tu hoja de cálculo de Google dirígete a la opción 'Archivo' ubicada en la  esquina superior izquierda.</li>
						<li class="reset-li">Luego da clic a la opción 'Descargar como'.</li>
						<li class="reset-li">Por último elige la opción 'Valores separados por comas (.csv hoja actual)'.</li>
						<li class="reset-li">Echa un vistazo al pantallazo dando clic en el icono <figure class="picture-container"><i class="fa fa-picture-o"></i></figure></li>
					</ol>								
				</div>
				<div class="col-md-5 import-section">
					<i class="fa fa-upload"></i>
					<form enctype="multipart/form-data" method="POST" name="import" action="../administrador/importar_bd.php">
						<input type="file" id="upload-bd" accept=".csv" name="file">
						<button type="submit" name="import-bd" class="btn-upload">Importar</button>
						<!-- <span class="filename"></span> -->
					</form>

				</div>
				
			</div>
		</div>
	</div>
</main>

<?php include '../templates/footer.inc'; ?>
