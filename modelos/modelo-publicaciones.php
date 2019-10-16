<?php 

require_once("conexion.php");

Class Publicaciones{

	static public function getPublicaciones(){
	 //Obtiene todo los datos  de la tabla publicacion, ademas de nombre_usuario y el tipo_servicio de sus respectivas tablas
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT p.*, u.nombre_usuario, t.tipo_servicio  FROM publicacion p, usuario u, tipo_servicio t WHERE p.id_usuario = u.id_usuario and p.id_tipo_servicio = t.id_tipo_servicio");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC); 

	}

		
}

 ?>