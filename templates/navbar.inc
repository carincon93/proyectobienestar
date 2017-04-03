<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="<?= $base_url; ?>" class="navbar-brand">Inicio</a>
	</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav navbar-right">
			<li class="active">
				<a href="" class="text-capitalize">
					<?= $_SESSION['urol'] ?>
				</a>
			</li>
			<li class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<?= $_SESSION['unombres'] ?>
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="#">Mis datos</a></li>
					<li><a href="#">Mis compras</a></li>
					<li><a href="exit.php">Cerrar sesión</a></li>
				</ul>			
			</li>

		</ul>
	</div>
</div>