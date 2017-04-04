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
				<!-- Button trigger modal -->
				<button class="btn btn-primary search" data-toggle="modal" data-target="#myModal">
				 	Buscar aprendiz por código de barras
				</button>

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
				        <form action="consultar-aprendiz.php" method="GET">
							<input type="text" class="form-control" placeholder="Código de barras" name="cod_aprendiz">
							<div class="modal-footer">
						        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
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
				<div class="table-container table-fluid">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre completo</th>
								<th>Programa de formación</th>
								<th>Ficha de programa</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = mysqli_fetch_array($query)): ?>
							<tr>
								<td><?= $row['id_aprendices'] ?></td>
								<td><?= $row['nombre_completo'] ?></td>
								<td class="programa_formacion"><?= $row['programa_formacion'] ?></td>
								<td><?= $row['numero_ficha'] ?></td>
								<td>
									<a href="consultar.php?id=<?= $row['id_aprendices'] ?>">C</a>
									<a href="editar.php?id=<?= $row['id_aprendices'] ?>">M</a>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<nav aria-label="Page navigation">
					<ul class="pagination">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li>
							<a href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</main>

<?php include '../templates/footer.inc'; ?>