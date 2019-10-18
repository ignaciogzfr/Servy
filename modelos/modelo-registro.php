<?php 

require_once 'conexion.php';
$tipo = $_POST["tipo-registro"];
$nombre = $_POST["nombre-registro"];
$direccion = $_POST["dir-registro"];
$mail = $_POST["mail-registro"];
$pass = $_POST["pass-registro"];
$fono = $_POST["fono-registro"];
$fp = $_POST["fp-registro"];
$con = Conexion::conectar();


ECHO 'Registrando nueva cuenta, espere un momento...';
if ($tipo == "Cliente") {

$sql = $con->prepare("INSERT INTO 
	usuario(email_usuario,nombre_usuario,
	fono_usuario,pass_usuario,foto_perfil,
	tipo_usuario,comuna,direccion_usuario,estado_usuario)
	 VALUES
	 (:mail,:nombre,:fono,
	 :pass,:fp,:tipo,
	 1,:direccion, 'ACTIVO')"
	);



$sql->bindParam(":mail",$mail,PDO::PARAM_STR);
$sql->bindParam(":nombre",$nombre,PDO::PARAM_STR);
$sql->bindParam(":fono",$fono,PDO::PARAM_STR);
$sql->bindParam(":pass",$pass,PDO::PARAM_STR);
$sql->bindParam(":fp",$fp,PDO::PARAM_STR);
$sql->bindParam(":tipo",$tipo,PDO::PARAM_STR);
$sql->bindParam(":direccion",$direccion,PDO::PARAM_STR);

$sql->execute();

$id = $con->lastInsertId();
$sql = $con->prepare("SELECT * FROM usuario WHERE email_usuario = :mail");
$sql->bindParam(":mail",$mail,PDO::PARAM_STR);
$sql->execute();
$datos = $sql->fetchALL(PDO::FETCH_ASSOC);

var_dump($datos);
echo $id;

}elseif ($tipo == "Maestro") {
$sql = $con->prepare("INSERT INTO 
	usuario(email_usuario,nombre_usuario,
	fono_usuario,pass_usuario,foto_perfil,
	tipo_usuario,comuna,direccion_usuario,estado_usuario)
	 VALUES
	 (:mail,:nombre,:fono,
	 :pass,:fp,:tipo,
	 1,:direccion, 'ACTIVO')"
	);



$sql->bindParam(":mail",$mail,PDO::PARAM_STR);
$sql->bindParam(":nombre",$nombre,PDO::PARAM_STR);
$sql->bindParam(":fono",$fono,PDO::PARAM_STR);
$sql->bindParam(":pass",$pass,PDO::PARAM_STR);
$sql->bindParam(":fp",$fp,PDO::PARAM_STR);
$sql->bindParam(":tipo",$tipo,PDO::PARAM_STR);
$sql->bindParam(":direccion",$direccion,PDO::PARAM_STR);

$sql->execute();

$id = $con->lastInsertId();


}


 ?>