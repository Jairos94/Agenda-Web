<?php 
session_start();
 include_once('conexion.php');
if (isset($_GET['id'])) {
	$database = new ConectarBD();
	$db = $database->open();
	try {
		
		$sql = "DELETE FROM personas WHERE idPersona='".$_GET['id']."'";
			// declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Contacto eliminado correctamente' : 'Ocurrió un error. No se pudo eliminar al Contacto';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccione miembro para eliminar';
	}

	header('location: index.php');
?>