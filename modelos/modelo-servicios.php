<?php 

require_once("conexion.php");


Class Servicios{

	static public function getServicios(){
		//obtiene todos los datos de la tabla tipo_servicio
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT * FROM tipo_servicio");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC);

	}

}

 ?>