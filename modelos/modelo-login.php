<?php 
require_once 'conexion.php';
	/*se almacenan los datos obtenidos a traves de el metodo POST en varialbles locales*/
	$mail = $_POST["mail"];
	$pass = $_POST["pass"];
	if(isset($_POST['id'])){
	$id = $_POST['id'];	
	}
	

	/*se crea un obeto en donde se almacenara el objeto de coneccion*/
	$con = Conexion::conectar();
	//con el objeto de conexxion se pueden prepara consultas en las cuales se define los parametros quese utilizaran el la base dedatos
	if(isset($mail) && isset($pass) && !isset($id)){
	$sql = $con->prepare("SELECT * FROM usuario WHERE email_usuario = :mail AND pass_usuario = :pass");
	//se asignan las variables locales a la consulta y se define su tipo
	$sql->bindParam(":mail",$mail,PDO::PARAM_STR);
	$sql->bindParam(":pass",$pass,PDO::PARAM_STR);
	//se ejecuta la consulta 
	$sql->execute();
	//se capturan los datos de la consulta ejecutada y se asignan una matriz de datos
	$datos = $sql->fetchAll(PDO::FETCH_ASSOC);
	if (count($datos) == 1) {
		// si los datos existen la consulta nos entregara al usuario por lo cual se iniciara una sesion
		session_start();
		//se asignaran los datos a la super variable para que puedan ser ocupadas en los componentes y paginas del proyecto
		$_SESSION['id'] = $datos[0]['id_usuario'];
		$_SESSION['tipo'] = $datos[0]['tipo_usuario'];
		$_SESSION['nombre'] = $datos[0]['nombre_usuario'];
		$_SESSION['fono'] = $datos[0]['fono_usuario'];
		$_SESSION['fp'] = $datos[0]['foto_perfil'];
		$_SESSION['estado'] = $datos[0]['estado_usuario'];
		$_SESSION['direccion'] = $datos[0]['direccion_usuario'];
		//se carga el componente de perfil con el id de usuario obentido de el paquete de datos
		echo('<script> location.href="../perfil.php?id='.$datos[0]['id_usuario'].'"</script>');


	}
	else{
		//en caso de que no obtener datos se envia un error a traves del metodo get
		echo('<script> location.href="../login.php?error=1"</script>');
	}

	}else{
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

		return 'Sesion actualizada';


	}
	else{
		echo('<script> location.href="../login.php?error=1"</script>');
	}
	}
	
 ?>
