	<aside class="col-md-2">
		<ul class="nav nav-pills nav-pills-primary">
			<li class="<?php if ($page == 'inicio') echo 'active'?>">
				<a href="<?= $base_url?>administrador/index.php">
					<i class="material-icons">home</i>
					Inicio
				</a>
			</li>
			<li class="<?php if ($page == 'adicionar_solicitud') echo 'active'?>">
				<a href="adicionar_solicitud.php">
					<i class="material-icons">note_add</i>
					Adicionar solicitud
				</a>
			</li>
			<li class="<?php if ($page == 'importar_solicitud') echo 'active'?>">
				<a href="importar_bd.php">
					<i class="fa fa-file-text-o"></i>
					Importar solicitudes
				</a>
			</li>
			<li class="<?php if ($page == 'historial') echo 'active'?>">
				<a href="#tasks" role="tab" data-toggle="tab">
					<i class="material-icons">date_range</i>
					Búsqueda por fechas
				</a>
			</li>
		</ul>
	</aside>