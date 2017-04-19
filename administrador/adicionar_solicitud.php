<?php 
require '../config/app.php';
require '../config/database.php';
require '../config/security.php';
include '../templates/header.inc';
include '../templates/navbar.inc';
$page = 'adicionar_solicitud'
?>
<ol class="breadcrumb">
	<li><a href="index.php">Inicio</a></li>
	<li class="active">Adicionar solicitud</li>
</ol>
<main>
	<div class="container">
		<div class="row">
					<?php include '../templates/asidenav.inc'; ?>
					<div class="col-md-10">
						<h3><i class="material-icons">subject</i>Formulario para adicionar una solicitud</h3>
						<p>Lorem ipsum dolor sit.</p>
						<hr>
						<a class="" href="index.php"><i class="fa fa-arrow-left"></i></a>
						<form method="POST" id="frm">
							<h3 class="form-title">Información personal</h3>
							<hr>
								<div class="row">
									<div class="col-md-4 form-group">
										<label for="nombre_completo">Nombre completo</label>
										<input type="text" name="nombre_completo" class="form-control" data-validation="required">		
									</div>
									<div class="col-md-4 form-group">
										<label for="tipo_documento">Tipo de documento</label>
										<select name="tipo_documento" class="form-control" data-validation="required">
											<option value="">Seleccione un tipo de documento</option>
											<option value="cc">Cédula</option>
											<option value="ti">Tarjeta de Identidad</option>
										</select>		
									</div>
									<div class="col-md-4 form-group">
										<label for="numero_documento">Número de documento</label>
										<input type="number" name="numero_documento" class="form-control" data-validation="required">		
									</div>						
								</div>
								<div class="row">
									<div class="col-md-6 form-group">
										<label for="direccion">Dirección de residencia</label>
										<input type="text" name="direccion" class="form-control" data-validation="required">		
									</div>
									<div class="col-md-6 form-group">
										<label for="barrio">Barrio</label>
										<input type="text" name="barrio" class="form-control" data-validation="required">		
									</div>						
								</div>
								<div class="row">
									<div class="col-md-6 form-group">
										<label for="estrato">Estrato</label>
										<input type="number" name="estrato" class="form-control" data-validation="required">		
									</div>
									<div class="col-md-6 form-group">
										<label for="telefono">Teléfono</label>
										<input type="number" name="telefono" class="form-control" data-validation="required">		
									</div>	
								</div>
								<div class="form-group">
									<label for="email">Correo electrónico</label>
									<input type="email" name="email" class="form-control" data-validation="required">		
								</div>
					
							
								<h3 class="form-title">Información académica</h3>
								<div class="row">
									<div class="col-md-4 form-group">
										<label for="programa_formacion">Programa de formación</label>
										<input type="text" name="programa_formacion" class="form-control" data-validation="required">		
									</div>
									<div class="col-md-4 form-group">
										<label for="numero_ficha">Número de ficha</label>
										<input type="number" name="numero_ficha" class="form-control" data-validation="required">		
									</div>						
									<div class="col-md-4 form-group">
										<label for="jornada">Jornada</label>
										<input type="text" name="jornada" class="form-control" data-validation="required">		
									</div>
								</div>								
							<h3 class="form-title">Información solicitud</h3>
							<div class="form-group">
								<label for="pregunta1">De quién depende usted?</label>
								<input type="text" name="pregunta1" class="form-control" data-validation="required">		
							</div>
							<div class="form-group">
								<label for="pregunta2">Oficio que realiza de quien depende</label>
								<input type="text" name="pregunta2" class="form-control" data-validation="required">		
							</div>
							<div class="form-group">
								<label for="pregunta3">Tiene personas que dependan de usted?</label>
								<input type="text" name="pregunta3" class="form-control" data-validation="required">		
							</div>
							<div class="form-group">
								<label for="otro_apoyo">Es usted beneficiario de algún tipo de apoyo</label>
								<select name="otro_apoyo" class="form-control" data-validation="required">
									<option value="">Seleccione una opción</option>
									<option value="monitoria">MONITORÍA</option>
									<option value="fic">FIC</option>
									<option value="apoyo de sostenimiento">APOYO DE SOSTENIMIENTO</option>
									<option value="dps">DPS</option>
									<option value="patrocinio">PATROCINIO</option>
									<option value="vinculo laboral">VÍNCULO LABORAL</option>
									<option value="auxilio almuerzo">AUXILIO ALMUERZO</option>
									<option value="ninguno">NINGUNO</option>
								</select>		
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" name="compromiso_informar" value="si">
									Se compromete a informar en la oficina de Bienestar al Aprendiz el momento en que usted reciba contrato de aprendizaje, consiguió empleo, o cualquier otro beneficio del Gobierno o del SENA (Monitorias, FIC, Apoyos de sostenimiento, entre otros).
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="compromiso_normas" value="si">
									Se compromete acatar las normas sobre el manejo adecuado del suplemento.
								</label>
							</div>

							<div class="form-group">
								<label for="justificacion_suplemento">Explíque a profundidad por que requiere el suplemento</label>
								<input type="text" name="justificacion_suplemento" class="form-control" data-validation="required">		
							</div>
							<div class="form-group">
								<label for="cod_aprendiz">Código del aprendiz</label>
								<input type="text" name="cod_aprendiz" class="form-control" data-validation="required">		
							</div>
							<button type="submit">Enviar</button>
						</form>
						<?php 
							if ($_POST) {
								$nombre_completo	= strtolower($_POST['nombre_completo']);
								$tipo_documento		= strtolower($_POST['tipo_documento']);
								$numero_documento 	= strtolower($_POST['numero_documento']);
								$direccion 			= strtolower($_POST['direccion']);
								$barrio 			= strtolower($_POST['barrio']);
								$estrato 			= strtolower($_POST['estrato']);
								$telefono 			= strtolower($_POST['telefono']);
								$email 				= strtolower($_POST['email']);
								$programa_formacion = strtolower($_POST['programa_formacion']);
								$numero_ficha 		= strtolower($_POST['numero_ficha']);
								$jornada 			= strtolower($_POST['jornada']);
								$pregunta1 			= strtolower($_POST['pregunta1']);
								$pregunta2 			= strtolower($_POST['pregunta2']);
								$pregunta3 			= strtolower($_POST['pregunta3']);
								$otro_apoyo 		= strtolower($_POST['otro_apoyo']);
								$compromiso_informar= isset($_POST['compromiso_informar']) ? $_POST['compromiso_informar'] : '';
								$compromiso_normas 	= isset($_POST['compromiso_normas']) ? $_POST['compromiso_normas'] : '';
								$justificacion_suplemento = strtolower($_POST['justificacion_suplemento']);
								$cod_aprendiz 		= strtolower($_POST['cod_aprendiz']);

								adicionarSolicitud($con, $nombre_completo, $tipo_documento, $numero_documento, $direccion, $barrio, $estrato, $telefono, $email, $programa_formacion, $numero_ficha, $jornada, $pregunta1, $pregunta2, $pregunta3, $otro_apoyo, $compromiso_informar, $compromiso_normas, $justificacion_suplemento, $cod_aprendiz);
									
							}
						?>
					</div>

			
		</div>
	</div>
</main>

<?php include '../templates/footer.inc'; ?>