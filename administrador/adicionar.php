<?php 
	require '../config/conexion.php';
	require '../config/app.php';
	include '../templates/header.inc';
	include '../templates/navbar.inc';

 ?>
	<div class="container-fluid dashboard">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
		      	<h4 class="text-uppercase">Adicionar Artículo</h4>
		      	<hr>
		      	<form method="POST" id="add" enctype="multipart/form-data">
			        <div>
			          <label>Nombre completo</label>
			          <input type="text" name="nombre_completo" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Tipo de documento</label>
			          <select name="tipo_documento" class="form-control" data-validation="required">
			            <option value>Seleccione..</option>
			            <option value="Cedula">Cedula</option>
			            <option value="T.I">T.I</option>
			          </select> 
			        </div>
			        <div>
			          <label>Numero de documento</label>
			          <input type="number" name="numero_documento" class="form-control" data-validation="required">
			        </div>  
			        <div>
			          <label>Direccion</label>
			          <input type="adress" name="direccion" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Barrio</label>
			          <input type="text" name="barrio" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Estrato</label>
			          <input type="number" name="estrato" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Telefono</label>
			          <input type="number" name="telefono" class="form-control" data-validation="required">   
			        </div>
			        <div>
			          <label>Email</label>
			          <input type="email" name="email" class="form-control" data-validation="email">
			        </div>
			        <div>
			          <label>Programa de formacion</label>
			          <input type="text" name="programa_formacion" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>N° de ficha</label>
			          <input type="text" name="numero_ficha" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Jornada</label>
			          <input type="text" name="jornada" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>De quien depende usted</label>
			          <input type="text" name="dep1" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Oficio que realiza de quien depende</label>
			          <input type="text" name="dep2" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Tiene personas que dependan de usted</label>
			          <input type="text" name="dep3" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Es usted beneficiario de algun tipo de apoyo</label>
			          <select name="apoyo" class="form-control" data-validation="required">
			            <option value>Seleccione..</option>
			            <option value="MONITORIA">MONITORIA</option>
			            <option value="FIC">FIC</option>
			            <option value="APOYO DE SOSTENIMIENTO">APOYO DE SOSTENIMIENTO</option>
			            <option value="DPS">DPS</option>
			            <option value="PATROCINIO">PATROCINIO</option>
			            <option value="VINCULO LABORAL">VINCULO LABORAL</option>
			            <option value="AUXILIO ALMUERZO">AUXILIO ALMUERZO</option>
			            <option value="NINGUNO">NINGUNO</option>
			          </select>
			        </div>
			        <div>
			          <label>compromiso del aprendiz</label>
			          <br><br>
			          <input type="checkbox" name="compromiso" value="Se compromete a informar en la oficina de Bienestar al Aprendiz el momento en que usted reciba contrato de aprendizaje, consiguió empleo, o cualquier otro beneficio del Gobierno o del SENA (Monitorias, FIC, Apoyos de sostenimiento, entre otros).">Se compromete a informar en la oficina de Bienestar al Aprendiz el momento en que usted reciba contrato de aprendizaje, consiguió empleo, o cualquier otro beneficio del Gobierno o del SENA (Monitorias, FIC, Apoyos de sostenimiento, entre otros).
			          <br><br>
			          <input type="checkbox" name="compromiso" value="Se compromete acatar las normas sobre el manejo adecuado del suplemento.">Se compromete acatar las normas sobre el manejo adecuado del suplemento.
			        </div>
			        <br>
			        <div>
			          <label>Explique a profundidad por que requiere el suplemento</label>
			          <input type="text" name="especificacion_suplemento" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>codigo del aprendiz</label>
			          <input type="text" name="cod_aprendiz" class="form-control" data-validation="required">
			        </div>
			        <br>
			        <button type="submit" class="btn btn-success">Enviar</button>
			        <button type="reset" class="btn btn-info">Borrar</button>
			        <a class="btn btn-primary" href="index.php">Volver</a>
			      </form>
		    </div>
		</div>
	</div>
<?php 
	if ($_POST) {
	    $nombre_completo =$_POST["nombre_completo"];
	    $tipo_documento = $_POST["tipo_documento"];
	    $numero_documento = $_POST["numero_documento"];
	    $direccion = $_POST["direccion"];
	    $barrio = $_POST["barrio"];
	    $estrato = $_POST["estrato"];
	    $telefono = $_POST["telefono"];
	    $email = $_POST["email"];
	    $programa_formacion = $_POST["programa_formacion"];
	    $numero_ficha = $_POST["numero_ficha"];
	    $jornada = $_POST["jornada"];
	    $dep1 = $_POST["dep1"];
	    $dep2 = $_POST["dep2"];
	    $dep3 = $_POST["dep3"];
	    $apoyo = $_POST["apoyo"];
	    $compromiso = $_POST["compromiso"];
	    $especificacion_suplemento = $_POST["especificacion_suplemento"];
	    $cod_aprendiz = $_POST["cod_aprendiz"];



	    if ($nombre_completo != '' && $tipo_documento != '' && $numero_documento != '' && $direccion != '' && $barrio != '' && $estrato != '' && $telefono != '' && $email != '' && $programa_formacion != '' && $numero_ficha != '' && $jornada != '' && $dep1 != '' && $dep2 != '' && $dep3 != '' && $apoyo != '' && $compromiso != '' && $especificacion_suplemento != '' && $cod_aprendiz != '') {
	    
	      $sql = "INSERT INTO aprendices VALUES ('',
	      '$nombre_completo', 
	      '$tipo_documento', 
	      '$numero_documento', 
	      '$direccion', 
	      '$barrio', 
	      '$estrato', 
	      '$telefono', 
	      '$email', 
	      '$programa_formacion', 
	      '$numero_ficha', 
	      '$jornada', 
	      '$dep1', 
	      '$dep2', 
	      '$dep3', 
	      '$apoyo', 
	      '$compromiso', 
	      '$especificacion_suplemento', 
	      '$cod_aprendiz',default)";

	      $row=mysqli_query($con,$sql);
                if ($row) {
                    echo "<script>alert('User registered successfully....');</script>";
                

            } else {
	          echo "<script>alert('Error al realizar la consulta!');</script>";
	      	}
	    }
	}
?>



<?php include '../templates/footer.inc';?>

