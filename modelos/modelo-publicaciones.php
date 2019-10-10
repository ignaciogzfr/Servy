<?php 

require_once("conexion.php");

Class publicaciones{

	static public function getPublicaciones(){

		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT * FROM publicacion");
		$sql->execute();
		return $sql->fecthAll(PDO::FECTH_ASSOC);

	}

		
}

 ?>