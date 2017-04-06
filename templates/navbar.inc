<div class="navbar navbar-inverse navbar-fixed-top">
	<!-- Button trigger modal -->
	<div class="row nav-container">
		<div class="col-md-4">
			<button class="btn btn-default search" data-toggle="modal" data-target="#myModal">
			 	Buscar aprendiz por código de barras
			</button>			
		</div>
		<div class="col-md-4">
			<form action="consultar_aprendiz.php" method="GET">
				<input type="text" name="">
				<button type="submit" class="" name="nombre_aprendiz"></button>
			</form>			
		</div>
		<div class="col-md-4">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<?= $_SESSION['nombre'] ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
						</ul>			
					</li>
				</ul>
			</div>
			
		</div>
		
	</div>
</div>