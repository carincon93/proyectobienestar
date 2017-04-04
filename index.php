<?php
	require 'config/app.php';
	include 'templates/header.inc';
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1 class="text-center">Suplemento Alimenticio</h1>
			<hr>
			<div class="panel panel-default">
			  <div class="panel-heading"></div>
			  <div class="panel-body">
			  	<div class="row">
			  		<div class="col-md-8 col-md-offset-2">
					    <form method="POST" action="config/login.php">
					    	<div class="form-group" >
					    		<input type="text" class="form-control" name="correo" placeholder="Correo Electrónico" data->
					    	</div>
					    	<div class="form-group">
					    		<input type="password" class="form-control" name="clave" placeholder="Digite su contraseña">
					    	</div>
					    	<div class="form-group">
					    		<input type="submit" value="Ingresar" class="btn btn-primary">
					    	</div>
				    	</form>
			    	</div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
</div>

<?php include 'templates/footer.inc';?>