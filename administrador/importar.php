<?php 
	require '../config/app.php';
	require '../config/conexion.php';
	include '../templates/header.inc';
	include '../templates/navbar.inc';

	if ($_FILES) {
        $filename = $_FILES['bd']['name'];
        $extension 	= pathinfo($filename, PATHINFO_EXTENSION);
        $file 	=  '../files/'.$filename;

        move_uploaded_file($_FILES['bd']['tmp_name'], $file);

        echo "<script>
				alert('".$file."');
        	</script>";
		$sql = mysqli_query($con, "LOAD DATA LOCAL INFILE '$file' INTO TABLE aprendices FIELDS TERMINATED BY ','");

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
					<form enctype="multipart/form-data" method="POST">
						<figure class="file-img">
							<i class="fa fa-upload"></i>
						</figure>
						<span class="filename"></span>
						<input type="file" id="upload-bd" accept=".csv" name="bd">
						<button type="submit">Importar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>


<?php include '../templates/footer.inc'; ?>
