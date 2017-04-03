<?php 
		try {

			$con = new PDO("mysql:host=$host;dbname=$ndb",$user,$pass);
			$con->exec('set names utf8');
			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	// loguin 

	function login($con, $correo, $contrasena){

		try {

			$stm = $con->prepare("SELECT * FROM usuarios WHERE correo = :correo AND contrasena = :contrasena LIMIT 1");
			$stm->bindparam(':correo', $correo);
			$stm->bindparam(':contrasena', $contrasena);
			$stm->execute();

			if ($stm->rowCount() > 0){

				$urow = $stm->fetch(PDO::FETCH_ASSOC);
				$_SESSION['uid'] 		= $urow['id'];
				$_SESSION['unombres'] 	= $urow['nombres'];
				$_SESSION['urol'] 		= $urow['rol'];


				return true;
			} else {
				return false;
			}
			
		} catch (PDOException $e) {
			echo $e->getMessage();	
		}
		
		

	}