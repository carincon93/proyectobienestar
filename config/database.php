<?php
try {
	$con = new PDO("mysql:host=$host;dbname=$ndb",$user,$pass);
	$con->exec('set names utf8');

} catch (PDOException $e) {
	echo $e->getMessage();
}

//Login
function login($con, $correo, $contrasena){
	try {
		$stm = $con->prepare("SELECT * FROM administrador WHERE correo = :correo AND contrasena = :contrasena LIMIT 1");
		$stm->bindparam(':correo', $correo);
		$stm->bindparam(':contrasena', $contrasena);
		if ($stm->execute()) {
			if ($stm->rowCount() > 0){

				$urow = $stm->fetch(PDO::FETCH_ASSOC);
				$_SESSION['uid'] 		= $urow['id'];
				$_SESSION['unombres'] 	= $urow['nombres'];
				$_SESSION['uapellidos'] = $urow['apellidos'];
				$_SESSION['urol'] 		= $urow['rol'];
				
				return true;
			} else {
				return false;
			}
		} else {
			print_r($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = null;
		$con = null;
	} catch (Exception $e) {
		echo $e->getMessage();	
	}
}

//---------------------- Módulo de seleccion de aprendices ---------------------- 
function index($con) {
	try {
		$stm = $con->prepare("SELECT * FROM aprendices");
		if ($stm->execute()) {
			$numero = $stm->rowCount();
			echo $numero;
			return $stm->fetchAll();
		} else {
			print_r($stm->errorInfo());			
		}
		$stm->closeCursor();
		$stm = null;
		$con = null;		
	} catch (Exception $e) {
		echo $e->getMessage();	
	}
}
function adicionarSolicitud($con, $nombre_completo, $tipo_documento, $numero_documento, $direccion, $barrio, $estrato, $telefono, $email, $programa_formacion, $numero_ficha, $jornada, $pregunta1, $pregunta2, $pregunta3, $otro_apoyo, $compromiso_informar, $compromiso_normas, $justificacion_suplemento, $cod_aprendiz)
{
	try {
		$sql = "INSERT INTO aprendices VALUES (DEFAULT, :nombre_completo, :tipo_documento, :numero_documento, :direccion, :barrio, :estrato, :telefono, :email, :programa_formacion, :numero_ficha, :jornada, :pregunta1, :pregunta2, :pregunta3, :otro_apoyo, :compromiso_informar, :compromiso_normas, :justificacion_suplemento, :cod_aprendiz, DEFAULT)";
		$stm = $con->prepare($sql);
		$stm->bindparam(':nombre_completo', $nombre_completo);
		$stm->bindparam(':tipo_documento', $tipo_documento);
		$stm->bindparam(':numero_documento', $numero_documento);
		$stm->bindparam(':direccion', $direccion);
		$stm->bindparam(':barrio', $barrio);
		$stm->bindparam(':estrato', $estrato);
		$stm->bindparam(':telefono', $telefono);
		$stm->bindparam(':email', $email);
		$stm->bindparam(':programa_formacion', $programa_formacion);
		$stm->bindparam(':numero_ficha', $numero_ficha);
		$stm->bindparam(':jornada', $jornada);
		$stm->bindparam(':pregunta1', $pregunta1);
		$stm->bindparam(':pregunta2', $pregunta2);
		$stm->bindparam(':pregunta3', $pregunta3);
		$stm->bindparam(':otro_apoyo', $otro_apoyo);
		$stm->bindparam(':compromiso_informar', $compromiso_informar);
		$stm->bindparam(':compromiso_normas', $compromiso_normas);
		$stm->bindparam(':justificacion_suplemento', $justificacion_suplemento);
		$stm->bindparam(':cod_aprendiz', $cod_aprendiz);

		if ($stm->execute()) {
			$_SESSION['message_action'] = 'La solicitud se añadió con éxito!';
			echo "<script>window.location.replace('index.php');</script>";
		} else {
			print_r($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = null;
		$con = null;
	} catch (Exception $e) {
		echo $e->getMessage();	
	}
}

function verSolicitud($con, $id_aprendiz) {
	try {
		$stm = $con->prepare("SELECT * FROM aprendices WHERE id_aprendiz = :id_aprendiz LIMIT 1");
		$stm->bindparam(':id_aprendiz', $id_aprendiz);
		if ($stm->execute()) {
			if ($stm-> rowCount() > 0) {
				return $stm->fetchAll();
			} else {
				$_SESSION['message_action'] = 'Upss! No se encontró el registro!';
			}
		} else {
			print_r($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = null;
		$con = null;
	} catch (Exception $e) {
		echo $e->getMessage();	
	}
}

function modificarSolicitud($con, $id_aprendiz, $nombre_completo, $tipo_documento, $numero_documento, $direccion, $barrio, $estrato, $telefono, $email, $programa_formacion, $numero_ficha, $jornada, $pregunta1, $pregunta2, $pregunta3, $otro_apoyo, $compromiso_informar, $compromiso_normas, $justificacion_suplemento, $cod_aprendiz)
{
	try {
		$sql = "UPDATE aprendices SET nombre_completo = :nombre_completo, tipo_documento = :tipo_documento, numero_documento = :numero_documento, direccion = :direccion, barrio = :barrio, estrato = :estrato, telefono = :telefono, email = :email, programa_formacion = :programa_formacion, numero_ficha = :numero_ficha, jornada = :jornada, pregunta1 = :pregunta1, pregunta2 = :pregunta2, pregunta3 = :pregunta3, otro_apoyo = :otro_apoyo, compromiso_informar = :compromiso_informar, compromiso_normas = :compromiso_normas, justificacion_suplemento = :justificacion_suplemento, cod_aprendiz = :cod_aprendiz WHERE id_aprendiz = $id_aprendiz";
		$stm = $con->prepare($sql);
		$stm->bindparam(':nombre_completo', $nombre_completo);
		$stm->bindparam(':tipo_documento', $tipo_documento);
		$stm->bindparam(':numero_documento', $numero_documento);
		$stm->bindparam(':direccion', $direccion);
		$stm->bindparam(':barrio', $barrio);
		$stm->bindparam(':estrato', $estrato);
		$stm->bindparam(':telefono', $telefono);
		$stm->bindparam(':email', $email);
		$stm->bindparam(':programa_formacion', $programa_formacion);
		$stm->bindparam(':numero_ficha', $numero_ficha);
		$stm->bindparam(':jornada', $jornada);
		$stm->bindparam(':pregunta1', $pregunta1);
		$stm->bindparam(':pregunta2', $pregunta2);
		$stm->bindparam(':pregunta3', $pregunta3);
		$stm->bindparam(':otro_apoyo', $otro_apoyo);
		$stm->bindparam(':compromiso_informar', $compromiso_informar);
		$stm->bindparam(':compromiso_normas', $compromiso_normas);
		$stm->bindparam(':justificacion_suplemento', $justificacion_suplemento);
		$stm->bindparam(':cod_aprendiz', $cod_aprendiz);

		if ($stm->execute()) {
			$_SESSION['message_action'] = 'La solicitud se modificó con éxito!';
			echo "<script>window.location.replace('index.php');</script>";
		} else {
			print_r($stm->errorInfo());				
		}
		$stm->closeCursor();
		$stm = null;
		$con = null;
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}
function eliminarSolicitud($con, $id)
{
	try {
		$stm = $con->prepare("DELETE FROM aprendices WHERE id_aprendiz = :id");
		$stm->bindparam(':id', $id);
		if ($stm->execute()) {
			$_SESSION['message_action'] = 'La solicitud se eliminó con éxito!';
			echo "<script>window.location.replace('index.php');</script>";
			$stm->closeCursor();
			$stm = null;
			$con = null;
		}		
	} catch (Exception $e) {
		echo $e->getMessage();	
	}
}
function aprobarSolicitud($con, $id)
{
	try {
		$stm = $con->prepare("UPDATE aprendices SET estado = 1 WHERE id_aprendiz = $id");
		if ($stm->execute()) {
			$_SESSION['message_action'] = 'El aprendiz ha sido seleccionado para recibir el suplemento!';
			echo "<script>window.location.replace('index.php');</script>";
		} else {
			print_r($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = null;
		$con = null;
	} catch (PDOException $e) {
		echo $e->getMessage();	
	}
}
function reprobarSolicitud($con, $id)
{
	try {
		$stm = $con->prepare("DELETE FROM aprendices WHERE id_aprendiz = $id");
		if ($stm->execute()) {
			$_SESSION['message_action'] = 'La solicitud se ha eliminado con éxito!';
			echo "<script>window.location.replace('index.php');</script>";
		} else {
			print_r($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = null;
		$con = null;
	} catch (Exception $e) {
		echo $e->getMessage();	
	}
}

//---------------------- Sistema de restricción de apoyo ---------------------- 
function consultarAprendiz($con, $cod_aprendiz)
{
	try {
		$stm = $con->prepare("SELECT * FROM aprendices WHERE cod_aprendiz = '$cod_aprendiz'");
		if ($stm->execute()) {
			if ($stm->rowCount() > 0) {
				return $stm->fetchAll();
			} else {
				$_SESSION['message_action'] = 'Upps! No se encontró el registro!';
			}
		} else {
			print_r($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = null;
		$con = null;
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}
function restringirApoyo($con, $cod_aprendiz, $current_date)
{
	try {
		$sql = "SELECT fecha_actual FROM historial WHERE aprendiz_cod = '$cod_aprendiz' ORDER BY fecha DESC";
		if ($sql) {
			foreach ($con->query($sql) as $row) {
		        return $row['fecha_actual'];
    		}
		} else {
			print_r($sql->errorInfo());	
		}
		$sql = null;
		$con = null;
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}



//---------------------- Historial ---------------------- 
// function dataHistorial($con, $cod_aprendiz)
// {
// 	try {
// 		$stm = $con->prepare("SELECT fecha FROM historial WHERE aprendiz_cod = '$cod_aprendiz'");
// 		if ($stm->execute()) {
//     		return $stm->fetchAll(PDO::FETCH_ASSOC);
// 		} else {
// 			print_r($stm->errorInfo());
// 		}
// 		$stm->closeCursor();
// 		$stm = null;
// 		$con = null;
// 	} catch (Exception $e) {
// 		echo $e->getMessage();	
// 	}
// }
function adicionarHistorial($con, $estado, $cod_aprendiz, $current_date)
{
	try {
		$sql = "INSERT INTO historial VALUES (DEFAULT, :estado, :cod_aprendiz, DEFAULT, '$current_date')";
		$stm = $con->prepare($sql);
		$stm->bindparam(':estado', $estado);
		$stm->bindparam(':cod_aprendiz', $cod_aprendiz);
		if ($stm->execute()) {
			$_SESSION['message_action'] = 'El aprendiz ha recibido el suplemento alimenticio!';
			echo "<script>window.location.replace('index.php');</script>";
			$stm->closeCursor();
			$stm = null;
			$con = null;
		} else {
			print_r($stm->errorInfo());
		}
		
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}
function listarHistorial($con, $cod_aprendiz)
{
	try {
		$stm = $con->prepare("SELECT fecha FROM historial WHERE aprendiz_cod = '$cod_aprendiz' ORDER BY fecha DESC");
		if ($stm->execute()) {
			if ($stm->rowCount() > 0) {
				return $stm->fetchAll();
			}
		} else {
			print_r($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = null;
		$con = null;
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

// function ultimoHistorial($con, $cod_aprendiz)
// {
// 	try {
// 		$stm = $con->prepare("SELECT fecha FROM historial WHERE aprendiz_cod = '$cod_aprendiz' ORDER BY fecha DESC LIMIT 1");
// 		if ($stm->execute()) {
// 			if ($stm->rowCount() > 0) {
// 				return $stm->fetchAll();
// 			} else {
// 				$_SESSION['message_action'] = 'Upps! No se encontró el registro!';
// 			}
// 		} else {
// 			print_r($stm->errorInfo());
// 		}
// 		$stm->closeCursor();
// 		$stm = null;
// 		$con = null;
// 	} catch (Exception $e) {
// 		echo $e->getMessage();
// 	}
// }

function ajaxConsultar($con, $search)
{
	try {
		$stm = $con->prepare("SELECT * FROM aprendices WHERE numero_documento LIKE '%".$search."%'");
		if ($stm->execute()) {
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		} else {
			print_r($stm->errorInfo());
		}
		$stm->closeCursor();
		$stm = null;
		$con = null;

	} catch (Exception $e) {
		echo $e->getMessage();
	}
}
function importarbd($con, $c, $file, $handle)
{
	try {
			while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
			{
				if ($c > 1) {
					$nombre_completo 	= $filesop[0];
					$tipo_documento 	= $filesop[1];
					$numero_documento 	= $filesop[2];
					$direccion 			= $filesop[3];
					$barrio 			= $filesop[4];
					$estrato 			= $filesop[5];
					$telefono 			= $filesop[6];
					$email 				= $filesop[7];
					$programa_formacion = $filesop[8];
					$numero_ficha 		= $filesop[9];
					$jornada 			= $filesop[10];
					$pregunta1 			= $filesop[11];
					$pregunta2 			= $filesop[12];
					$pregunta3 			= $filesop[13];
					$otro_apoyo 		= $filesop[14];
					$compromiso_informar= $filesop[15];
					$compromiso_normas 	= $filesop[16];
					$justificacion_suplemento = $filesop[17];
					$sql = "INSERT INTO aprendices (nombre_completo, tipo_documento, numero_documento, direccion, barrio, estrato, telefono, email, programa_formacion, numero_ficha, jornada, pregunta1, pregunta2, pregunta3, otro_apoyo, compromiso_informar, compromiso_normas, justificacion_suplemento) VALUES ('$nombre_completo', '$tipo_documento', '$numero_documento', '$direccion', '$barrio', '$estrato', '$telefono', '$email', '$programa_formacion', '$numero_ficha', '$jornada', '$pregunta1', '$pregunta2', '$pregunta3', '$otro_apoyo', '$compromiso_informar', '$compromiso_normas', '$justificacion_suplemento')";
					$stm = $con->prepare($sql);
					if ($stm->execute()) {
						$_SESSION['message_action'] = 'La base de datos ha sido importada exitosamente!';					
					} else {
					 	print_r($stm->errorInfo());
					}
				} 
				// else {
				// 	echo "Sorry! There is some problem.";
				// }
			$c = $c + 1;
			}	
			fclose($handle);
			$stm->closeCursor();
			$stm = null;
			$con = null;
		
	} catch (Exception $e) {
		echo $e->getMessage();		
	}
}

//---------------------- Estadísticas ---------------------- 
function numeroSolicitudes($con){
	try {
		$stm = $con->prepare("SELECT * FROM aprendices WHERE estado = 1");
		$stm->execute();
		$numero = $stm->rowCount();
		echo $numero;

		$stm = null;
		$con = null;

	} catch (Exception $e) {
		echo $e->getMessage();	
	}
}
function numeroHistorial($con){
	try {
		$stm = $con->prepare("SELECT * FROM historial");
		$stm->execute();
		$numero = $stm->rowCount();
		echo $numero;

		$stm = null;
		$con = null;

	} catch (Exception $e) {
		echo $e->getMessage();	
	}
}
function numeroEntregasHoy($con, $fecha_actual){
	try {
		$stm = $con->prepare("SELECT * FROM historial WHERE fecha_actual = '$fecha_actual' ");
		$stm->execute();
		$numero = $stm->rowCount();
		echo $numero;

		$stm = null;
		$con = null;

	} catch (Exception $e) {
		echo $e->getMessage();	
	}
}
