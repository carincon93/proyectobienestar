<?php 
require '../config/app.php';
require '../config/database.php';
require '../config/security.php';
include '../templates/header.inc';
include '../templates/navbar.inc';
?>
<?php 
$id_aprendiz 	= $_GET['id_aprendiz'];
$data 	= verSolicitud($con, $id_aprendiz);
?>
<main>
	<ol class="breadcrumb">
		<li><a href="index.php">Inicio</a></li>
		<li class="active">Modificar solicitud</li>
	</ol>
	<div class="container-fluid dashboard">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<a class="btn btn-default" href="index.php">Volver</a>
				<?php if (isset($_SESSION['message_action'])): ?>
		            <h2><b>:( </b><?= $_SESSION['message_action'] ?></h2>
		            <?php unset($_SESSION['message_action']); ?>
		        <?php endif ?>
				
				<!-- ------ -->
				<?php if ($data): ?>
				<?php foreach ($data as $key => $aprendiz): ?>
				<form method="POST" id="frm">
					<div class="row">
						<h3 class="col-md-12">Información personal</h3>
						<div class="col-md-4 form-group">
							<label for="nombre_completo">Nombre completo</label>
							<input type="text" name="nombre_completo" class="form-control" value="<?= $aprendiz['nombre_completo']  ?>">		
						</div>
						<div class="col-md-4 form-group">
							<label for="tipo_documento">Tipo de documento</label>
							<select name="tipo_documento" class="form-control">
								<option value="">Seleccione un tipo de documento</option>
								<option value="cc" <?php if ($aprendiz['tipo_documento'] == 'cc') echo 'selected' ?>>Cédula</option>
								<option value="ti" <?php if ($aprendiz['tipo_documento'] == 'ti') echo 'selected' ?>>Tarjeta de Identidad</option>
							</select>		
						</div>
						<div class="col-md-4 form-group">
							<label for="numero_documento">Número de documento</label>
							<input type="number" name="numero_documento" class="form-control" value="<?= $aprendiz['numero_documento'] ?>">		
						</div>						
					</div>
					<div class="row">
						<div class="col-md-6 form-group">
							<label for="direccion">Dirección de residencia</label>
							<input type="text" name="direccion" class="form-control" value="<?= $aprendiz['direccion'] ?>">	
						</div>
						<div class="col-md-6 form-group">
							<label for="barrio">Barrio</label>
							<input type="text" name="barrio" class="form-control" value="<?= $aprendiz['barrio']  ?>">		
						</div>						
					</div>
					<div class="row">
						<div class="col-md-6 form-group">
							<label for="estrato">Estrato</label>
							<input type="number" name="estrato" class="form-control" value="<?= $aprendiz['estrato']  ?>">		
						</div>
						<div class="col-md-6 form-group">
							<label for="telefono">Teléfono</label>
							<input type="number" name="telefono" class="form-control" value="<?= $aprendiz['telefono'] ?>">	
						</div>						
					</div>
					<div class="form-group">
						<label for="email">Correo electrónico</label>
						<input type="email" name="email" class="form-control" value="<?= $aprendiz['email']  ?>">	
					</div>
					<div class="row">
						<h3 class="col-md-12">Información académica</h3>
						<div class="col-md-4 form-group">
							<label for="programa_formacion">Programa de formación</label>
							<input type="text" name="programa_formacion" class="form-control" value="<?= $aprendiz['programa_formacion']  ?>">	
						</div>
						<div class="col-md-4 form-group">
							<label for="numero_ficha">Número de ficha</label>
							<input type="number" name="numero_ficha" class="form-control" value="<?= $aprendiz['numero_ficha'] ?>">		
						</div>						
						<div class="col-md-4 form-group">
							<label for="jornada">Jornada</label>
							<input type="text" name="jornada" class="form-control" value="<?= $aprendiz['jornada'] ?>">	
						</div>
					</div>
					<h3>Información solicitud</h3>
					<div class="form-group">
						<label for="pregunta1">De quién depende usted?</label>
						<input type="text" name="pregunta1" class="form-control" value="<?= $aprendiz['pregunta1'] ?>">	
					</div>
					<div class="form-group">
						<label for="pregunta2">Oficio que realiza de quien depende</label>
						<input type="text" name="pregunta2" class="form-control" value="<?= $aprendiz['pregunta2'] ?>">		
					</div>
					<div class="form-group">
						<label for="pregunta3">Tiene personas que dependan de usted?</label>
						<input type="text" name="pregunta3" class="form-control" value="<?= $aprendiz['pregunta3'] ?>">		
					</div>
					<div class="form-group">
						<label for="otro_apoyo">Es usted beneficiario de algún tipo de apoyo</label>
						<select name="otro_apoyo" class="form-control">
							<option value="">Seleccione una opción</option>
							<option value="monitoria" <?php if($aprendiz['otro_apoyo'] == 'monitoria') echo 'selected' ?>>MONITORÍA</option>
							<option value="fic" <?php if($aprendiz['otro_apoyo'] == 'fic') echo 'selected' ?>>FIC</option>
							<option value="apoyo de sostenimiento" <?php if($aprendiz['otro_apoyo'] == 'apoyo de sostenimiento') echo 'selected' ?>>APOYO DE SOSTENIMIENTO</option>
							<option value="dps" <?php if($aprendiz['otro_apoyo'] == 'dps') echo 'selected' ?>>DPS</option>
							<option value="patrocinio" <?php if($aprendiz['otro_apoyo'] == 'patrocinio') echo 'selected' ?>>PATROCINIO</option>
							<option value="vinculo laboral" <?php if($aprendiz['otro_apoyo'] == 'vinculo laboral') echo 'selected' ?>>VÍNCULO LABORAL</option>
							<option value="auxilio almuerzo" <?php if($aprendiz['otro_apoyo'] == 'auxilio almuerzo') echo 'selected' ?>>AUXILIO ALMUERZO</option>
							<option value="ninguno" <?php if($aprendiz['otro_apoyo'] == 'ninguno') echo 'selected' ?>>NINGUNO</option>
						</select>
					</div>

					<div class="checkbox">
						<label>
							<input type="checkbox" name="compromiso_informar" value="si" <?php if($aprendiz['compromiso_informar'] == 'si') echo 'checked' ?>>
							Se compromete a informar en la oficina de Bienestar al Aprendiz el momento en que usted reciba contrato de aprendizaje, consiguió empleo, o cualquier otro beneficio del Gobierno o del SENA (Monitorias, FIC, Apoyos de sostenimiento, entre otros).
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" name="compromiso_normas" value="si" <?php if($aprendiz['compromiso_normas'] == 'si') echo 'checked' ?>>
							Se compromete acatar las normas sobre el manejo adecuado del suplemento.
						</label>
					</div>

					<div class="form-group">
						<label for="justificacion_suplemento">Explíque a profundidad por que requiere el suplemento</label>
						<input type="text" name="justificacion_suplemento" class="form-control" value="<?= $aprendiz['justificacion_suplemento']  ?>">
					</div>
					<div class="form-group">
						<label for="cod_aprendiz">Código del aprendiz</label>
						<input type="text" name="cod_aprendiz" class="form-control" value="<?= $aprendiz['cod_aprendiz']  ?>">	
					</div>
					<button type="submit">Enviar</button>
				</form>
				<?php endforeach ?>
				<?php 
					if ($_POST) {
						$nombre_completo 	= $_POST['nombre_completo'];
						$tipo_documento		= $_POST['tipo_documento'];
						$numero_documento 	= $_POST['numero_documento'];
						$direccion 			= $_POST['direccion'];
						$barrio 			= $_POST['barrio'];
						$estrato 			= $_POST['estrato'];
						$telefono 			= $_POST['telefono'];
						$email 				= $_POST['email'];
						$programa_formacion = $_POST['programa_formacion'];
						$numero_ficha 		= $_POST['numero_ficha'];
						$jornada 			= $_POST['jornada'];
						$pregunta1 			= $_POST['pregunta1'];
						$pregunta2 			= $_POST['pregunta2'];
						$pregunta3 			= $_POST['pregunta3'];
						$otro_apoyo 		= $_POST['otro_apoyo'];
						$compromiso_informar= isset($_POST['compromiso_informar']) ? $_POST['compromiso_informar'] : 'no';
						$compromiso_normas	= isset($_POST['compromiso_normas']) ? $_POST['compromiso_normas'] : 'no';
						$justificacion_suplemento = $_POST['justificacion_suplemento'];
						$cod_aprendiz 		= $_POST['cod_aprendiz'];

						modificarSolicitud($con, $id_aprendiz, $nombre_completo, $tipo_documento, $numero_documento, $direccion, $barrio, $estrato, $telefono, $email, $programa_formacion, $numero_ficha, $jornada, $pregunta1, $pregunta2, $pregunta3, $otro_apoyo, $compromiso_informar, $compromiso_normas, $justificacion_suplemento, $cod_aprendiz);
							
					}
				?>
				<!-- ------ -->
			</div>
		</div>
	</div>
</main>
<?php endif ?>
<?php include '../templates/footer.inc'; ?>