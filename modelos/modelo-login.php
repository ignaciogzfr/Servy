<?php 
require_once 'conexion.php';
	/**
	 * Esta clase sirve para verificar si los datos entregados por el usuario, e-mail y contraseña existen el la base de datos, lo que redireccionara  su perfil en caso de existir, en caso opuesto se activara aun error a traves del metodo GET.
	 * 
	 * @author Ignacio Gonzales.
	 * @since 1.0 08-10-2019 20:27.
	 * @version 1.5 20-11-2019 14:33 verción estable.
	 * 
	 * @param $mail dato obtenido en el imput mail del formulario login.
	 * @param $pass dato obtenido en el imput pass del formulario login.
	 * @global $_SESSION esta variable se inicia cuando existe un usuario registrado en la base de datos y se asigna su contenido a este objeto.
	 * @return $id identificador del usuario que realizo un ingreso a la página. 
	 * 
	 * */
	if(isset($_POST['mail']) && isset($_POST['pass'])){
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	}elseif(isset($_POST['id'])){	
	$id = $_POST['id'];	
	}
	
	$con = Conexion::conectar();
	if(isset($mail) && isset($pass) && !isset($id)){
	$sql = $con->prepare("SELECT * FROM usuario WHERE email_usuario = :mail AND pass_usuario = :pass");
	$sql->bindParam(":mail",$mail,PDO::PARAM_STR);
	$sql->bindParam(":pass",$pass,PDO::PARAM_STR);
	$sql->execute();
	$datos = $sql->fetchAll(PDO::FETCH_ASSOC);
	if (count($datos) == 1) {
		session_start();
		$_SESSION['id'] = $datos[0]['id_usuario'];
		$_SESSION['tipo'] = $datos[0]['tipo_usuario'];
		$_SESSION['nombre'] = $datos[0]['nombre_usuario'];
		$_SESSION['fono'] = $datos[0]['fono_usuario'];
		$_SESSION['fp'] = $datos[0]['foto_perfil'];
		$_SESSION['estado'] = $datos[0]['estado_usuario'];
		$_SESSION['direccion'] = $datos[0]['direccion_usuario'];
		echo('<script> location.href="../perfil.php?id='.$datos[0]['id_usuario'].'"</script>');
	}
	else{
		echo('<script> location.href="../login.php?error=1"</script>');
	}

	}elseif(isset($_POST['id'])){
	$sql = $con->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
	$sql->bindParam(":id",$id,PDO::PARAM_INT);

	$sql->execute();
	$datos = $sql->fetchAll(PDO::FETCH_ASSOC);
	if (count($datos) == 1) {

		session_start();
		$_SESSION['id'] = $datos[0]['id_usuario'];
		$_SESSION['tipo'] = $datos[0]['tipo_usuario'];
		$_SESSION['nombre'] = $datos[0]['nombre_usuario'];
		$_SESSION['fono'] = $datos[0]['fono_usuario'];
		$_SESSION['fp'] = $datos[0]['foto_perfil'];
		$_SESSION['estado'] = $datos[0]['estado_usuario'];
		$_SESSION['direccion'] = $datos[0]['direccion_usuario'];

		echo('<script> location.href="../perfil.php?id='.$datos[0]['id_usuario'].'"</script>');

	}
	else{
		echo('<script> location.href="../login.php?error=1"</script>');
	}
	}
	
 ?>
