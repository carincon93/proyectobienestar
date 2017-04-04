<?php 
	require '../config/app.php';
	require '../config/conexion.php';
	include '../templates/header.inc';
	include '../templates/navbar.inc';

	// if ($_FILES) {
 //        $filename = $_FILES['bd']['name'];
 //        $extension 	= pathinfo($filename, PATHINFO_EXTENSION);
 //        $file 	=  '../files/'.$filename;

 //        move_uploaded_file($_FILES['bd']['tmp_name'], $file);

 //        echo "<script>
	// 			alert('".$file."');
 //        	</script>";
	// 	$sql = mysqli_query($con, "LOAD DATA LOCAL INFILE '$file' INTO TABLE aprendices FIELDS TERMINATED BY ','");

	// }
	if(isset($_POST["submit"]))
	{
		$file = $_FILES['file']['tmp_name'];
		$handle = fopen($file, "r");
		$c = 1;

		while(($filesop = fgetcsv($handle, 1000, ";")) !== false)
		{
			if ($c > 1) {
				$nombres = $filesop[1];
				$apellidos = $filesop[2];
				$tipo_documento = $filesop[3];
				$numero_documento = $filesop[4];
				$especialidad = $filesop[5];
				$ficha = $filesop[6];
				$sql = mysqli_query($con, "INSERT INTO aprendices (id_aprendices, nombres, apellidos, tipo_documento, numero_documento, especialidad, ficha) VALUES (default, '$nombres', '$apellidos', '$tipo_documento', '$numero_documento', '$especialidad', '$ficha')");
				if($sql){
				echo "You database has imported successfully. You have inserted ". $c ." recoreds";
				}else{
					echo "Sorry! There is some problem.";
				}
			}
			
				$c = $c + 1;
			
		}
		

	}

?>

<main>
	<ol class="breadcrumb">
		<li><a href="index.php">Inicio</a></li>
		<li class="active">Importar base de datos</li>
	</ol>
	<div class="content dashboard">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-md-10 col-md-offset-1">
	            	<h2>Importar base de datos</h2>
		            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae cum dolorem, adipisci autem inventore incidunt dolores, non magnam laboriosam temporibus perspiciatis voluptate optio libero voluptatibus.</p>
					<hr>
					<!-- <form enctype="multipart/form-data" method="POST">
						<figure class="file-img">
							<i class="fa fa-upload"></i>
						</figure>
						<span class="filename"></span>
						<input type="file" id="upload-bd" accept=".csv" name="bd">
						<button type="submit">Importar</button>
					</form> -->
					<form name="import" method="post" enctype="multipart/form-data">
				    	<input type="file" name="file" /><br />
				        <input type="submit" name="submit" value="Submit" />
				    </form>
				</div>
			</div>
		</div>
	</div>
</main>


<?php include '../templates/footer.inc'; ?>
