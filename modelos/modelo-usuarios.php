<?php 

require_once("conexion.php");

Class Usuarios{

	static public function getUsuarios(){

		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT * FROM usuario");
		$sql->execute();
		return $sql->fecthAll(PDO::FECTH_ASSOC);

	}

		
}

 ?>