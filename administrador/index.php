<?php
	require '../config/app.php';
	require '../config/conexion.php';
	include '../templates/header.inc';
	include '../templates/navbar.inc';

	$query = mysqli_query($con, "SELECT * FROM aprendices");
?>
<main>
	<ol class="breadcrumb">
		<li class="active">Inicio</li>
	</ol>
	<div class="container-fluid dashboard">

		<div class="row">
			<div class="col-md-10 col-md-offset-1">			
				
				<!-- Modal Core -->
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
				      </div>
				      
				    </div>
				  </div>
				</div>
				<h2>Lista de aprendices</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo doloremque, impedit dignissimos porro in, illum. Beatae libero id repellendus ab, eaque nisi, officia ipsum officiis quasi itaque vel ea corporis earum voluptatum nulla voluptates laborum aperiam, vero! Repudiandae, quo, rerum!</p>
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
							<?php $count = 0; ?>
							<?php while ($row = mysqli_fetch_array($query)): ?>
							<tr>
								<td><?= ++$count ?></td>
								<td><?= $row['nombre_completo'] ?></td>
								<td class="text-uppercase"><?= $row['programa_formacion'] ?></td>
								<td><?= $row['numero_ficha'] ?></td>
								<td>
									<a href="ver_solicitud.php?id=<?= $row['id_aprendices'] ?>"><i class="fa fa-file-text"></i>&nbsp Ver solicitud</a>
									<a href="editar.php?id=<?= $row['id_aprendices'] ?>">M</a>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>

<?php include '../templates/footer.inc'; ?>