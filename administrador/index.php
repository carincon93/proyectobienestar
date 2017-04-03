<?php
	require '../config/app.php';
	require '../config/conexion.php';
	include '../templates/header.inc';
	include '../templates/navbar.inc';

	$query = mysqli_query($con, "SELECT * FROM aprendices");
?>

<div class="container-fluid dashboard">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h2>Lista de aprendices</h2>
			<hr>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Programa de formación</th>
						<th>Ficha de programa</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_array($query)): ?>
					<tr>
						<td><?= $row['id_aprendices'] ?></td>
						<td><?= $row['nombre'] ?></td>
						<td><?= $row['apellido'] ?></td>
						<td></td>
						<td class="especialidad"><?= $row['especialidad'] ?></td>
						<td>
							<a href="consultar.php?id=<?= $row['id_aprendices'] ?>">C</a>
							<a href="editar.php?id=<?= $row['id_aprendices'] ?>">M</a>
						</td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, hic sapiente officiis voluptatum dicta a, quis quam minima cum quisquam tempore beatae veniam ea corrupti, repellendus fugit. Perspiciatis praesentium ut eum nobis nihil tenetur quis magnam nemo placeat inventore quasi quos quibusdam omnis reiciendis, officiis tempore porro sunt vel aspernatur perferendis nisi architecto illum neque illo excepturi! Facilis iusto eum dolores voluptates impedit distinctio enim, quo mollitia excepturi blanditiis molestiae dolor officiis, asperiores voluptatum tempora nam quos laudantium quam fuga, eius modi assumenda expedita praesentium. Eveniet, ullam dolor! Ratione illo harum maiores iusto nostrum exercitationem, ducimus voluptatibus alias nihil nesciunt.
			</p>
		</div>
	</div>
</div>

<?php include '../templates/footer.inc'; ?>