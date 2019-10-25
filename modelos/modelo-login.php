<?php 
session_start();
require_once 'conexion.php';

	$mail = $_POST["mail"];
	$pass = $_POST["pass"];

	$con = Conexion::conectar();

	$sql = $con->prepare("SELECT * FROM usuario WHERE email_usuario = :mail AND pass_usuario = :pass");
	$sql->bindParam(":mail",$mail,PDO::PARAM_STR);
	$sql->bindParam(":pass",$pass,PDO::PARAM_STR);

	$sql->execute();
	$datos = $sql->fetchAll(PDO::FETCH_ASSOC);
	if (count($datos) == 1) {

		@session_start();
		$_SESSION['id'] = $datos[0]['id_usuario'];
		$_SESSION['tipo'] = $datos[0]['tipo_usuario'];
		$_SESSION['nombre'] = $datos[0]['nombre_usuario'];
		$_SESSION['fono'] = $datos[0]['fono_usuario'];
		$_SESSION['fp'] = $datos[0]['foto_perfil'];
		$_SESSION['estado'] = $datos[0]['estado_usuario'];
		$_SESSION['direccion'] = $datos[0]['direccion_usuario'];

		echo('<script> location.href="../perfil.php?id="'.$datos[0]['id_usuario'].'</script>');


	}
	else{
		echo('<script> location.href="../login.php?error=1"</script>');
	}
	
	
 ?>