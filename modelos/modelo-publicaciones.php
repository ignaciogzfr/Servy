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

	static public function getDenunciasPublicacion($id){

		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT * FROM denuncias_publicacion WHERE publicacion = :id");
		$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	

	static public function getDenuncias($id){

		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT d.*, u.nombre_usuario, t.tipo_denuncia FROM denuncias_publicacion d, usuario u, tipos_denuncia t 	WHERE publicacion = :id and d.denunciante = u.id_usuario and d.tipo_denuncia = t.id_tipo_denuncia");
		$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);

	}
	static public function getPublicacionesDemanda(){
	// 
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT p.*, u.nombre_usuario, t.tipo_servicio FROM publicacion p, usuario u, tipo_servicio t WHERE p.id_usuario = u.id_usuario AND p.id_tipo_servicio = t.id_tipo_servicio AND p.tipo_publicacion = 'demanda' ORDER BY fecha_hora_publicacion DESC");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function getPublicacionesOferta(){
	// 
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT p.*, u.nombre_usuario, t.tipo_servicio FROM publicacion p, usuario u, tipo_servicio t WHERE p.id_usuario = u.id_usuario AND p.id_tipo_servicio = t.id_tipo_servicio AND p.tipo_publicacion = 'oferta' ORDER BY fecha_hora_publicacion DESC");
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

	static public function getDenunciasPublicacion($id){
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT d.* FROM denuncias_publicacion d, publicacion p, usuario u WHERE d.publicacion = p.id_publicacion AND d.denunciante = u.id_usuario AND p.id_publicacion = :id");
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

	
	static public function publicarServicio($idus,$tipopu,$titulo,$direccion,$tiposerv,$detalle){

	


			$con = Conexion::conectar();
			$sql = $con->prepare("INSERT INTO publicacion(
				id_usuario,
				tipo_publicacion,
				titulo_publicacion,
				direccion_publicacion,
				id_tipo_servicio,
				detalle_publicacion,
				fecha_hora_publicacion,
				estado_publicacion) VALUES (:idus,:tipopu,:direccion,:direccion,:tiposerv,:detalle,NOW(),'Pendiente')");
			$sql->bindParam(":idus",$idus,PDO::PARAM_INT);
			$sql->bindParam(":tipopu",$tipopu,PDO::PARAM_INT);
			$sql->bindParam(":titulo",$direccion,PDO::PARAM_STR);
			$sql->bindParam(":direccion",$direccion,PDO::PARAM_STR);
			$sql->bindParam(":tiposerv",$tiposerv,PDO::PARAM_INT);
			$sql->bindParam(":detalle",$detalle,PDO::PARAM_STR);
			if($sql->execute()){
			return "ok";
		}else{
			return "error";
		}

	}

	}
		


 ?>
