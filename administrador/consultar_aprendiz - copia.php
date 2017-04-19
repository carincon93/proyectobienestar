<?php 
	require '../config/app.php';
	require '../config/database.php';
	require '../config/security.php';
	include '../templates/header.inc';
	include '../templates/navbar.inc';
	$current_date = date('Y-m-d');
?>
<main>
	<ol class="breadcrumb">
		<li><a href="index.php">Inicio</a></li>
		<li class="active">Consultar aprendiz</li>
	</ol>
	<?php if ($_GET): ?>
		<?php $cod_aprendiz	= $_GET['cod_aprendiz']; ?>
		<?php $data 		= consultarAprendiz($con, $cod_aprendiz); ?>
		<?php $restriccion	= restringirApoyo($con, $cod_aprendiz, $current_date); ?>
		
		
		<div class="container-fluid dashboard">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<a class="btn btn-default" href="index.php">Volver</a>
					<?php if (isset($_SESSION['message_action'])): ?>				
					<div class="alert alert-danger">
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
					
					<?php if ($data): ?>
					<?php foreach ($data as $key => $aprendiz): ?>
						<?php if ($aprendiz['estado'] == 1): ?>							
						
						<div class="row">
							<div class="col-md-6">					
								<h2 class="text-capitalize custom-h2"><?= $aprendiz['nombre_completo'] ?> - <span class="text-uppercase">(<?= $aprendiz['programa_formacion'] ?>)</span></h2>
							</div>
							<div class="col-md-6">
								<?php if ($restriccion['fecha_actual'] == $current_date ): ?>
									<div class="popover right animated shake"> 
										<div class="arrow"></div> 
										<div class="popover-content"> 
										<?php $data = ultimoHistorial($con, $cod_aprendiz) ?>
										<?php foreach ($data as $key => $d): ?>											
											<b>Alerta:</b> El aprendiz ya recibió el suplemento alimenticio. <strong>La fecha y hora de entrega <?= $d['fecha'] ?></strong>
										<?php endforeach ?>
										</div> 
									</div>						
								<?php endif ?>						
							</div>					
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo doloremque, impedit dignissimos porro in, illum. Beatae libero id repellendus ab, eaque nisi, officia ipsum officiis quasi itaque vel ea corporis earum voluptatum nulla voluptates laborum aperiam, vero! Repudiandae, quo, rerum!</p>
						<hr>
						<div class="panel panel-default">
							<!-- Default panel contents -->
							<div>				
								<form method="POST">
									<div>
										<div class="alert-icon col-md-1">
											<i class="material-icons">info_outline</i>
										 </div>
										 <div class="checkbox">
											<label class="col-md-11 refreshment">									
												<p>Marca esta casilla una vez el aprendiz haya recibido el suplemento alimenticio!</p>
												<input type="checkbox" class="check-cs" name="estado" value="1" <?php if ($restriccion['fecha_actual'] == $current_date && $restriccion['estado'] != 0) echo "checked disabled" ?> >
												Ha recibido el suplemento?
                                    			<button type="button" class="btn btn-historial" data-toggle="modal" data-target="#historial">Ver historial</button>

											</label>										 	
										 </div>
									</div>
									<div class="table-container">									
										<input type="date" name="date" value="<?= $current_date; ?>"  class="hidden">										
										<input type="hidden" value="<?= $aprendiz['cod_aprendiz'] ?>" name="cod_aprendiz">
										<h3>Historial</h3>
										<ol>
										<?php foreach ($dataHistorial as $key => $historial): ?>
											<li><?= $historial['fecha'] ?></li>
										<?php endforeach ?>
										</ol>
										<button type="submit" class="btn btn-submit" <?php if ($restriccion['fecha_actual'] == $current_date && $restriccion['estado'] != 0) echo "disabled" ?>>Guardar</button>
									</div>
								</form>
								<?php if ($_POST): ?>
									<?php 
									$estado 			= $_POST['estado'];
									$cod_aprendiz 		= $_POST['cod_aprendiz'];
									$date 				= $_POST['date'];
									adicionarHistorial($con, $estado, $cod_aprendiz, $date);
									?>
								<?php endif ?>

								<!-- Modal Historial -->
		                        <div class="modal fade" id="historial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		                            <div class="modal-dialog">
		                                <div class="modal-content">
		                                    <div class="modal-header">
		                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class='material-icons'>clear</i></button>
		                                        <h4 class="modal-title" id="myModalLabel">Historial - <?= $row['nombre_completo'] ?></h4>
		                                    </div>
		                                    <div class="modal-body">
		                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum obcaecati voluptas eum tempora, inventore fuga magni beatae excepturi numquam amet!</p>
		                                        <ol>
		                                            <li>Fechas en las que el aprendiz ha recibido el suplemento:</li>
		                                            <?php $count = 0; ?>
		                                            <?php foreach ($data as $key => $historial): ?>                                            
		                                            <li><strong><?= ++$count ?></strong>&nbsp<?= $historial['fecha'] ?></li>
		                                            <?php endforeach ?>
		                                        </ol>
		                                        <div class="modal-footer">
		                                            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cerrar</button>
		                                            <button type="button" class="btn btn-info btn-simple" data-dismiss="modal">Confirmar</button>
		                                        </div>
		                                    </div>                                          
		                                </div>
		                            </div>
		                        </div>

							</div>
						</div>
							<?php else: ?>
							<div class="alert alert-danger">
							    <div class="container-fluid">
								  <div class="alert-icon">
									<i class="material-icons">check</i>
								  </div>
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><i class="material-icons">clear</i></span>
								  </button>
							      <b>Aviso: </b>El usuario no ha sido aceptado aún!
							    </div>
							</div>
						<?php endif ?>
					<?php endforeach ?>							
					<?php endif ?>
				</div>
			</div>
		</div>
		
		
	<?php endif ?>
</main>
 <?php include '../templates/footer.inc'; ?>