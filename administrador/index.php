<?php
	require '../config/app.php';
	require '../config/database.php';
	require '../config/security.php';
	include '../templates/header.inc';
	include '../templates/navbar.inc';
	$page = 'inicio'

?>
<ol class="breadcrumb">
	<li class="active">Inicio</li>
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
				
				<h3><i class="material-icons">list</i>Lista de solicitudes</h3>
				<p>Tabla con todas las solicitudes registradas en el sistema. </p>
				<hr>
				<div class="table-container">
					<table class="table" id="example">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre completo <i class="fa fa-sort-amount-asc"></i></th>
								<th>Programa de formación <i class="fa fa-sort-amount-asc"></i></th>
								<th>Ficha de programa <i class="fa fa-sort-amount-asc"></i></th>
								<th>Acciones <i class="fa fa-sort-amount-asc"></i></th>
							</tr>
						</thead>
						<tbody>
							<span class="hidden"><?php $data = index($con); ?></span>
							<?php $count = 0; ?>
							<?php foreach ($data as $key => $solicitud): ?>
								<tr>
									<td><?= ++$count ?></td>
									<td><?= $solicitud['nombre_completo'] ?></td>
									<td class="text-uppercase"><?= $solicitud['programa_formacion'] ?></td>
									<td><?= $solicitud['numero_ficha'] ?></td>
									<td>
										<a href="ver_solicitud.php?id_aprendiz=<?= $solicitud['id_aprendiz'] ?>"><i class="fa fa-eye actions"></i></a>
										<a href="modificar_solicitud.php?id_aprendiz=<?= $solicitud['id_aprendiz'] ?>"><i class="fa fa-pencil actions"></i></a>
										<a href='javascript:;' class="eliminar-usuario" data-id="<?= $solicitud['id_aprendiz'] ?>"><i class="fa fa-trash actions"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<hr>
				</div>
			</div>



		<!-- <div class="row">
			<h3>Datos estadísticos</h3>
			<article class="col-md-3">
				<h2 class="text-center"><?php numeroSolicitudes($con); ?></h2>
				<p class="text-center">Número de aprendices seleccionados</p>
			</article>
			<article class="col-md-3">
				<h2 class="text-center"><?php index($con); ?></h2>
				<p class="text-center">Número de solicitudes</p>
			</article>
			<article class="col-md-3">
				<h2 class="text-center"><?php numeroHistorial($con); ?></h2>
				<p class="text-center">Número total de entregas de suplementos</p>
			</article>
			<article class="col-md-3">
				<?php  $fecha_actual = date('Y-m-d');?>
				<h2 class="text-center"><?php numeroEntregasHoy($con, $fecha_actual); ?></h2>
				<p class="text-center">Número de entregas de suplementos hoy <?= date('Y-m-d'); ?></p>
			</article>
		</div> -->

				<!-- Modal Código de barras -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class='material-icons'>clear</i></button>
				        <h4 class="modal-title" id="myModalLabel">Lectura de código de barras</h4>
				      </div>
				      <div class="modal-body">
				        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam asperiores eligendi libero fuga dolorem voluptatibus laboriosam neque voluptates dicta quod!</p>
				        <i class="fa fa-barcode"></i>
				        <form action="consultar_aprendiz.php" method="GET">
							<input type="text" class="form-control" placeholder="Código de barras" name="cod_aprendiz" autofocus="">
							<div class="modal-footer">
						        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cerrar</button>
						        <button type="submit" class="btn btn-info btn-simple">Buscar</button>
						    </div>
						</form>	
						<div class="modal-footer"></div>
				      </div>
				      
				    </div>
				  </div>
				</div>
		
		</div>		
	</div>
</main>

<?php include '../templates/footer.inc'; ?>