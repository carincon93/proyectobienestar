<?php 
	require '../config/conexion.php';
	require '../config/app.php';
	include '../templates/header.inc';
	include '../templates/navbar.inc';

 ?>
 <?php 
if ($_GET) {
        $id   = $_GET['id'];
        $sql  = mysqli_query($con,"SELECT * FROM aprendices WHERE id_aprendices = $id");
        $row  = mysqli_fetch_array($sql);
    }
?>
	<div class="container-fluid dashboard">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
		      	<h4 class="text-uppercase">Editar aprendiz</h4>
		      	<hr>
		      	<form method="POST" id="add" enctype="multipart/form-data">
			        <div>
			          <label>Nombre completo</label>
			          <input type="text" name="nombre_completo" class="form-control" value="<?php echo $row['nombre_completo']; ?>" data-validation="required">
			        </div>
			        <div>
			          <label>Tipo de documento</label>
			          <select name="tipo_documento" class="form-control" value="<?php echo $row['tipo_documento']; ?> data-validation="required">
			            <option <?php if ($row['tipo_documento'] == "Cedula") echo "selected"; ?> value="Cedula">Cedula</option>
			            <option <?php if ($row['tipo_documento'] == "T.I") echo "selected"; ?> value="T.I">T.I</option>
			          </select> 
			        </div>
			        <div>
			          <label>Numero de documento</label>
			          <input type="number" name="numero_documento" value="<?php echo $row['numero_documento']; ?>" class="form-control" data-validation="required">
			        </div>  
			        <div>
			          <label>Direccion</label>
			          <input type="adress" name="direccion" value="<?php echo $row['direccion']; ?>" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Barrio</label>
			          <input type="text" name="barrio" value="<?php echo $row['barrio']; ?>" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Estrato</label>
			          <input type="number" name="estrato" value="<?php echo $row['estrato']; ?>" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Telefono</label>
			          <input type="number" name="telefono" value="<?php echo $row['telefono']; ?>" class="form-control" data-validation="required">   
			        </div>
			        <div>
			          <label>Email</label>
			          <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" data-validation="email">
			        </div>
			        <div>
			          <label>Programa de formacion</label>
			          <input type="text" name="programa_formacion" value="<?php echo $row['programa_formacion']; ?>" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>N° de ficha</label>
			          <input type="text" name="numero_ficha" value="<?php echo $row['numero_ficha']; ?>" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Jornada</label>
			          <input type="text" name="jornada" value="<?php echo $row['jornada']; ?>" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>De quien depende usted</label>
			          <input type="text" name="dep1" value="<?php echo $row['dep1']; ?>" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Oficio que realiza de quien depende</label>
			          <input type="text" name="dep2" value="<?php echo $row['dep2']; ?>" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Tiene personas que dependan de usted</label>
			          <input type="text" name="dep3" value="<?php echo $row['dep3']; ?>" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>Es usted beneficiario de algun tipo de apoyo</label>
			          <select name="apoyo" class="form-control" data-validation="required">
			            <option <?php if ($row['apoyo'] == "MONITORIA") echo "selected"; ?> value="MONITORIA">MONITORIA</option>
			            <option <?php if ($row['apoyo'] == "FIC") echo "selected"; ?> value="FIC">FIC</option>
			            <option <?php if ($row['apoyo'] == "APOYO DE SOSTENIMIENTO") echo "selected"; ?> value="APOYO DE SOSTENIMIENTO">APOYO DE SOSTENIMIENTO</option>
			            <option <?php if ($row['apoyo'] == "DPS") echo "selected"; ?> value="DPS">DPS</option>
			            <option <?php if ($row['apoyo'] == "PATROCINIO") echo "selected"; ?> value="PATROCINIO">PATROCINIO</option>
			            <option <?php if ($row['apoyo'] == "VINCULO LABORAL") echo "selected"; ?> value="VINCULO LABORAL">VINCULO LABORAL</option>
			            <option <?php if ($row['apoyo'] == "AUXILIO ALMUERZO") echo "selected"; ?> value="AUXILIO ALMUERZO">AUXILIO ALMUERZO</option>
			            <option <?php if ($row['apoyo'] == "NINGUNO") echo "selected"; ?> value="NINGUNO">NINGUNO</option>
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
			          <input type="text" name="especificacion_suplemento" value="<?php echo $row['especificacion_suplemento']; ?>" class="form-control" data-validation="required">
			        </div>
			        <div>
			          <label>codigo del aprendiz</label>
			          <input type="text" name="cod_aprendiz" value="<?php echo $row['cod_aprendiz']; ?>" class="form-control" data-validation="required">
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