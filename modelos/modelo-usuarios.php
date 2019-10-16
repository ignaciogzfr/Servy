<?php 

require_once("conexion.php");

Class Usuarios{

	static public function getUsuarios(){
				//obtiene todos los datos de la  tabla usuario
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT * FROM usuario");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC); 

	}

		
}

 ?>