<div class="navbar navbar-inverse navbar-fixed-top">
	<!-- Button trigger modal -->
	<button class="btn btn-primary search" data-toggle="modal" data-target="#myModal">
	 	Buscar aprendiz por código de barras
	</button>
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
<aside class="aside-nav">
	<ul>
		<li class="aside-links">
			<a href="../administrador/importar.php"><i class="fa fa-database"></i>&nbspImportar base de datos</a>
		</li>
	</ul>
</aside>