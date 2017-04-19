<?php 
require '../config/app.php';
require '../config/database.php'; 
include '../templates/header.inc';
include '../templates/navbar.inc';
$cod_aprendiz = $_GET['cod_aprendiz'];
?>
<main>
    <ol class="breadcrumb">
        <li class=><a href="index.php"></a>Inicio</li>
        <li class="active">--</li>
    </ol>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-default" href="index.php">Volver</a>

                <?php $data = consultarAprendiz($con, $cod_aprendiz) ?>
                	<?php if (!empty($data)): ?>
	                	<?php foreach ($data as $key => $value): ?>
	                		<?php if ($value['estado'] == 1): ?>
		                		<h1><?= $value['nombre_completo'] ?></h1>
		                		<div class="row">
		                			<div class="col-md-4"></div>
		                			<div class="col-md-8">
		                				<h2>¿El aprendiz ha recibido el suplemento alimenticio?</h2>
				                		<?php $dHistorial = restringirApoyoCodigo($con, $cod_aprendiz, $current_date = date('Y-m-d'))?>
					                	
				                		<form method="POST">
					                		<div class="checkbox">
					                			<label>
					         
					                				<input type="checkbox" value="1" name="estado" class="check-cs" <?php if($dHistorial == date('Y-m-d')) echo "checked disabled"; ?>>
					                				<button type="submit" class="hidden btn-submit"></button>
					                			</label>
					                		</div>
				                		</form>			                		
					                	
					                	<?php if (!empty(listarHistorial($con, $cod_aprendiz, $numero_documento = null))): ?>
						                	<button class="btn btn-danger" data-toggle="modal" data-target="#modalHistorial">Ver historial</button>					                		
					                	<?php endif ?>

		                                <!-- Modal Historial -->
		                                <div class="modal fade" id="modalHistorial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		                                    <div class="modal-dialog">
		                                        <div class="modal-content">
		                                            <div class="modal-header">
		                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class='material-icons'>clear</i></button>
		                                                <h4 class="modal-title" id="myModalLabel">Historial</h4>
		                                            </div>
		                                            <div class="modal-body">
		                                                <p>Estas son las fechas en las que el aprendiz ha recibido el suplemento</p>
		                                                <ol>
		                                                    <?php $cod_aprendiz = $value['cod_aprendiz'] ?>
		                                                    <?php $dHistorial = listarHistorial($con, $cod_aprendiz, $numero_documento = null); ?>
		                                                    <?php if ($dHistorial): ?>
		                                                        <?php foreach ($dHistorial as $key => $hValue): ?>
		                                                            <li><?= $hValue['fecha']?></li>
		                                                        <?php endforeach ?>                                                    
		                                                    <?php endif ?>
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
		                		<?php if ($_POST): ?>
		                			<?php $estado = $_POST['estado'] ?>
		                			<?php adicionarHistorial($con, $estado, $cod_aprendiz, $current_date = date('Y-m-d')) ?>
		                		<?php endif ?>
		                		<?php else: ?>
		                			<?php if ($value['cod_aprendiz'] != ''): ?>
			                			<div class="alert alert-danger">
										    <div class="container-fluid">
											  	<div class="alert-icon">
													<i class="material-icons">error_outline</i>
											  	</div>
											  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true"><i class="material-icons">clear</i></span>
											  	</button>
										      	<b>Aviso: </b>El aprendiz <strong><?= $value['nombre_completo'] ?></strong> aún no ha sido seleccionado <a class="ver-solicitud" href="ver_solicitud.php?id_aprendiz=<?=$value['id_aprendiz'] ?>">Ver solicitud</a>
										    </div>
										</div>
		                				
		                			<?php endif ?>
	                		<?php endif ?>
	                		



	                	<?php endforeach ?>                		
                	<?php endif ?>

				<?php if (isset($_SESSION['message_action'])): ?>
	              <h2><b>:( </b><?= $_SESSION['message_action'] ?></h2>
	              <?php unset($_SESSION['message_action']); ?>
	            <?php endif ?>
            </div>
		</div>
	</div>
</main>

<?php include '../templates/footer.inc'; ?>