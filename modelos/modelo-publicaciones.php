<?php 

require_once("conexion.php");
/**
 * @author Igancio Gonzales.
 * @author Johan Hernandez.
 * @since  1.1 16-10-2019 17:56.
 * @version 1.5 22-11-2019 16:41. version estable
 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php
 * @var $sql objeto de consulta que requiere del objeto de conexion y una consulta o un string que contenga una. 
 * 
 * */
Class Publicaciones{
	/**
	 * Con este metodo se obtiene las publicaciones de los usuarios.
	 * @return Tabla con los resultados de la consulta 
	 * 
	 * */
	static public function getPublicaciones(){
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT p.*, u.nombre_usuario, t.tipo_servicio  FROM publicacion p, usuario u, tipo_servicio t WHERE p.id_usuario = u.id_usuario and p.id_tipo_servicio = t.id_tipo_servicio");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC); 
	}

	/**
	 * Con este metodo se obtiene las publicaciones que sean de tipo demanda de los usaurios de tipo cliente y invitado
	 * @return matriz de datos que contienen los resultados de la consulta de publicaciones tipo demanda.
	 * */
	static public function getPublicacionesDemanda(){
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT p.*, u.nombre_usuario, t.tipo_servicio FROM publicacion p, usuario u, tipo_servicio t WHERE p.id_usuario = u.id_usuario AND p.id_tipo_servicio = t.id_tipo_servicio AND p.tipo_publicacion = 'demanda' and p.estado_publicacion = 'Aprobada' ORDER BY fecha_hora_publicacion DESC");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	/**
	 * Con este metodo se obtienen las publicaciones que sena de tipo oferta de los usuarios de tipo maestro.
	 * 
	 * @return matriz de datos que contienen los resultados de la consulta de publicaciones tipo oferta.
	 * 
	 * */
	static public function getPublicacionesOferta(){
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT p.*, u.nombre_usuario, t.tipo_servicio FROM publicacion p, usuario u, tipo_servicio t WHERE p.id_usuario = u.id_usuario AND p.id_tipo_servicio = t.id_tipo_servicio AND p.tipo_publicacion = 'oferta' and p.estado_publicacion = 'Aprobada'  ORDER BY fecha_hora_publicacion DESC");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	

	static public function getTiposDenunciaP(){
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT * FROM tipos_denuncia WHERE entidades_admitidas = 'Publicacion' OR entidades_admitidas = 'Ambos' ");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	
	/**
	 * Este metodo permite obtener de la base de datos los datos de una publicacion en especifico segun el id de la publicacion.
	 * 
	 * @param $id id de la publicacion obtenido a traves del formulario de dende se llama.
	 * @return Matriz de datos que contiene los resultados de la consulta recien ejecutada.
	 * 
	 * */
	static public function verPublicacion($id){
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT  p.*, u.nombre_usuario, t.tipo_servicio  FROM publicacion p, usuario u, tipo_servicio t WHERE p.id_usuario = u.id_usuario and p.id_tipo_servicio = t.id_tipo_servicio and id_publicacion = :id");
			$sql->bindParam(":id",$id,PDO::PARAM_INT);
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	/**
	 * Con esta funcion se obtienen el numero de denuncias de una publicacion y el usuario al que esta relacionado.
	 * 
	 * @param $id identificador de la base de datos de una publicacion especifica ya sea oferta o demanda.
	 * @return Matriz de datos que contiene los resultado de la consulta como el nro de denuncias de una publicacion.
	 * 
	 * */
	static public function getDenunciasPublicacion($id){
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT d.* FROM denuncias_publicacion d, publicacion p, usuario u WHERE d.publicacion = p.id_publicacion AND d.denunciante = u.id_usuario AND p.id_publicacion = :id");
		$sql->bindParam(":id",$id,PDO::PARAM_INT);
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * Cuando de llama a esta funcion se pide el nro del identificador de una publicacion desde el formulario de moderacion, este es usado para cambiar el estado dela columan sancion en la tabla de sancion_publicaciones al estado Sancionada.
	 * @param $id identificador de una publicacion obtenido del boton sancionar en moderacion-publicaciones.php.
	 * @return Si la consulta se ejecuto corretamente retornara la "ok" en caso opuesto retornara "error"
	 * */
	static public function sancionarPublicacion($id){
		$con = Conexion::conectar();
		$sql = $con->prepare("UPDATE publicacion SET estado_publicacion = 'Sancionada' WHERE id_publicacion = :id");
		$sql->bindParam(":id",$id,PDO::PARAM_INT);
		if($sql->execute()){
			return "ok";
		}else{
			return "error";
		}
	}
	/**
	 * Cuando de llama a esta funcion se pide el nro del identificador de una publicacion desde el formulario de moderacion, este es usado para cambiar el estado dela columna sancion en la tabla de sancion_publicaciones al estado  "verificada".
	 * @param $id identificadr de una publicacion obtenido del boton sanconar en moderacion-publicaciones.php.
	 
	 * 
	 * */
	static public function quitarSancionPublicacion($id){
		$con = Conexion::conectar();
		$sql = $con->prepare("UPDATE publicacion SET estado_publicacion = 'Aprobada' WHERE id_publicacion = :id");
		$sql->bindParam(":id",$id,PDO::PARAM_INT);
		if($sql->execute()){
			return "ok";
		}else{
			return "error";
		}
	}

	/**
	 * Al llamar a esta funcion se requieren los parametros de entrada que componen el formualrio de publicacion de oferta/demanda/demanda index que son los 
	 * @param $idus identificador del usuario que realizo una publicación oferta/demanda.
	 * @param $tipopu tipo de publicación, pude ser "demanda" o "oferta" es cargado desde un selector.
	 * @param $titulo parámetro de titulo principal de la publicación.
	 * @param $direccion ubicacion de donde se realizo al publicación.
	 * @param $tiposerv tipo de servicio al que cubre el maestro y su publicación.
	 * @param $detalle Cuadro de texto donde el maestro o cliente recita la descripcion de su publicación.
	 * @return Si la consulta se ejecuto corretamente retornara la "ok" en caso opuesto retornara "error"
	 * 
	 * */	
	static public function publicarServicio($idus,$tipopu,$titulo,$direccion,$tiposerv,$detalle,$lat,$lng){
			$con = Conexion::conectar();
			$sql = $con->prepare("INSERT INTO publicacion(
				id_usuario,
				tipo_publicacion,
				titulo_publicacion,
				direccion_publicacion,
				id_tipo_servicio,
				detalle_publicacion,
				fecha_hora_publicacion,
				estado_publicacion,
				lat_publicacion,
				lng_publicacion) VALUES (:idus,:tipopu,:titulo,:direccion,:tiposerv,:detalle,NOW(),'Pendiente',:lat,:lng)");
			$sql->bindParam(":idus",$idus,PDO::PARAM_INT);
			$sql->bindParam(":tipopu",$tipopu,PDO::PARAM_INT);
			$sql->bindParam(":titulo",$titulo,PDO::PARAM_STR);
			$sql->bindParam(":direccion",$direccion,PDO::PARAM_STR);
			$sql->bindParam(":tiposerv",$tiposerv,PDO::PARAM_INT);
			$sql->bindParam(":detalle",$detalle,PDO::PARAM_STR);
			$sql->bindParam(":lat",$lat,PDO::PARAM_STR);
			$sql->bindParam(":lng",$lng,PDO::PARAM_STR);


			if($sql->execute()){
			return "ok";
		}else{
			return "error";
		}

	}
	static public function denunciarP($publicacion,$tipo,$detalle,$denunciante){
		$con = Conexion::conectar();
		$sql = $con->prepare("INSERT INTO denuncias_publicacion(publicacion,denunciante,tipo_denuncia,comentarios_denuncia) VALUES (:publicacion,:denunciante,:tipo,:detalle)");
		$sql->bindParam(":publicacion",$publicacion,PDO::PARAM_INT);
		$sql->bindParam(":denunciante",$denunciante,PDO::PARAM_INT);
		$sql->bindParam(":tipo",$tipo,PDO::PARAM_INT);
		$sql->bindParam(":detalle",$detalle,PDO::PARAM_STR);
		$sql->execute();
		return 'ok';
	}
	}
		




 ?>
