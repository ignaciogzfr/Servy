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
		echo('<script> location.href="../perfil.php"</script>');	}
	else{
		echo('<script> location.href="../login.php?error=1"</script>');
	}
	
	
 ?>