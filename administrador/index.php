<?php
	require '../config/app.php';
	include '../templates/header.inc';
	include '../templates/navbar.inc';
?>

<div class="container-fluid dashboard">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>Bienvenido <?= $_SESSION['unombres'] ?></h1>
			<hr>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, hic sapiente officiis voluptatum dicta a, quis quam minima cum quisquam tempore beatae veniam ea corrupti, repellendus fugit. Perspiciatis praesentium ut eum nobis nihil tenetur quis magnam nemo placeat inventore quasi quos quibusdam omnis reiciendis, officiis tempore porro sunt vel aspernatur perferendis nisi architecto illum neque illo excepturi! Facilis iusto eum dolores voluptates impedit distinctio enim, quo mollitia excepturi blanditiis molestiae dolor officiis, asperiores voluptatum tempora nam quos laudantium quam fuga, eius modi assumenda expedita praesentium. Eveniet, ullam dolor! Ratione illo harum maiores iusto nostrum exercitationem, ducimus voluptatibus alias nihil nesciunt.
			</p>
		</div>
	</div>
</div>

<?php include 'templates/footer.inc'; ?>