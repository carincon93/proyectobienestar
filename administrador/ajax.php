<?php 
	// sleep(1);
	require '../config/app.php';
	require '../config/database.php';

	if (isset($_POST['search'])) {
		$search = $_POST['search'];

		$data = ajaxConsultar($con, $search);
	}

?>
	<?php if ($search != ''): ?>
		<?php foreach ($data as $key => $r): ?>
			<?php if ($r['cod_aprendiz'] != ''): ?>
				<li>
					<a class="results text-capitalize" href="consultar_aprendiz.php?cod_aprendiz=<?= $r['cod_aprendiz']?>"><?= $r['nombre_completo'] ?></a>
				</li>
				<?php else: ?>
					<li>
						<a class="results text-capitalize" href="consultar_aprendiz.php?cod_aprendiz=<?= $r['cod_aprendiz']?>"><?= $r['nombre_completo'] ?> <i class="material-icons"  data-toggle="tooltip" title="El aprendiz no tiene un código definido!">error_outline</i></a>
					</li>
			<?php endif ?>
		<?php endforeach ?>		
	<?php endif ?>