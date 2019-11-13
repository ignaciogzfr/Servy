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


	static public function verPublicacion($id){

		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT  p.*, u.nombre_usuario, t.tipo_servicio  FROM publicacion p, usuario u, tipo_servicio t WHERE p.id_usuario = u.id_usuario and p.id_tipo_servicio = t.id_tipo_servicio and id_publicacion = :id");
			$sql->bindParam(":id",$id,PDO::PARAM_INT);
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_ASSOC);
	}



	static public function sancionarPublicacion($id){
			//actualiza el estado de la publicacion
		$con = Conexion::conectar();
		$sql = $con->prepare("UPDATE publicacion SET estado_publicacion = 'Sancionada' WHERE id_publicacion = :id");
		$sql->bindParam(":id",$id,PDO::PARAM_INT);
		if($sql->execute()){
			return "ok";
		}else{
			return "error";
		}

	}

	static public function quitarSancionPublicacion($id){
			//actualiza el estado de la publicacion
		$con = Conexion::conectar();
		$sql = $con->prepare("UPDATE publicacion SET estado_publicacion = 'Verificada' WHERE id_publicacion = :id");
		$sql->bindParam(":id",$id,PDO::PARAM_INT);
		if($sql->execute()){
			return "ok";
		}else{
			return "error";
		}

	}

	
	// static public function publicarServicio($idus,$tipopu,$titulo,$direccion,$tiposerv,$detalle){

	// 	try{


	// 		$con = Conexion::conectar();
	// 		$sql = $con->prepare("INSERT INTO publicacion(
	// 			id_usuario,
	// 			tipo_publicacion,
	// 			titulo_publicacion,
	// 			direccion_publicacio,
	// 			id_tipo_servicio,
	// 			detalle_publicacion,
	// 			fecha_hora_publicacion,
	// 			estado_publicacion) VALUES (:id,:tp,:tit,:dir,:idtp,:det,NOW(),'Pendiente')");
	// 		$sql->bindParam(":id",$id,PDO::PARAM_INT);
	// 		$sql->bindParam(":tp",$id,PDO::PARAM_INT);
	// 		$sql->bindParam(":tit",$id,PDO::PARAM_STR);
	// 		$sql->bindParam(":dir",$id,PDO::PARAM_STR);
	// 		$sql->bindParam(":idtp",$id,PDO::PARAM_INT);
	// 		$sql->bindParam(":det",$id,PDO::PARAM_STR);
	// 		if($sql->execute()){
	// 		return "ok";
	// 	}else{
	// 		return "error";
	// 	}
			

	// 	}




	// }

	}
		


 ?>