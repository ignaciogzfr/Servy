<?php 

require_once("conexion.php");
/**
 * Consultas relacionadas con la obtencion modificacion de datos de las publicaciones realizadas por los clientes y los moderadores.
 * 
 * @author Igancio Gonzales.
 * @author Johan Hernandez.
 * @since  1.1 16-10-2019 17:56.
 * @version 1.5 22-11-2019 16:41. version estable
 * 
 * */
Class Publicaciones{
	/**
	 * Con este metodo se obtiene las publicaciones de los usuarios.
	 * 
	 * @return $sql Tabla con los resultados de la consulta.
	 * @var $sql objeto de manejo de consultas.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
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
	 * @return $sql matriz de datos que contienen los resultados de la consulta de publicaciones tipo demanda.
	 * @var $sql objeto de manejo de consultas.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
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
	 * @return $sql matriz de datos que contienen los resultados de la consulta de publicaciones tipo oferta.
	 * @var $sql objeto de manejo de consultas.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * 
	 * */
	static public function getPublicacionesOferta(){
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT p.*, u.nombre_usuario, t.tipo_servicio FROM publicacion p, usuario u, tipo_servicio t WHERE p.id_usuario = u.id_usuario AND p.id_tipo_servicio = t.id_tipo_servicio AND p.tipo_publicacion = 'oferta' and p.estado_publicacion = 'Aprobada'  ORDER BY fecha_hora_publicacion DESC");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	
	/**
	 * Con esta funcion se obtienen los tipos de denuncias de todas la publicaciones.
	 * 
	 * @return $sql matriz de datos que contienen los resultados de la consulta, de latabla tipos_denuncia.
	 * @var $sql objeto de manejo de consultas.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * 
	 * */
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
	 * @return $sql Matriz de datos que contiene los resultados de la consulta recien ejecutada.
	 * @var $sql objeto de manejo de consultas.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * 
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
	 * @return $sql Matriz de datos que contiene los resultado de la consulta como el nro de denuncias de una publicacion.
	 * @var $sql objeto de manejo de consultas.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
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
	 * 
	 * @var $sql objeto de manejo de consultas.
	 * @param $id identificador de una publicacion obtenido del boton sancionar en moderacion-publicaciones.php.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @return ok mensaje si la funcion se ejecuto correctamente. 
	 * @return error mensaje si no se pudo ejecutar la consulta.
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
	 * 
	 * @param $id identificadr de una publicacion obtenido del boton sanconar en moderacion-publicaciones.php.
	 * @var $sql objeto de manejo de consultas.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @return ok mensaje si la funcion se ejecuto correctamente. 
	 * @return error mensaje si no se pudo ejecutar la consulta.
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
	 * Al llamar a esta funcion se requieren los parametros de entrada que componen el formulario de publicacion de oferta/demanda/demanda invitado, a la publicacion se le asignara el estado de pendiente, por que solo un moderador podra cambiar el estadoa  verificada y poder ser visualizada en la tabla de vista de servicios demanda/oferta.
	 * 
	 * @param $idus identificador del usuario que realizo una publicación oferta/demanda.
	 * @param $tipopu tipo de publicación, pude ser "demanda" o "oferta" es cargado desde un selector.
	 * @param $titulo parámetro de titulo principal de la publicación.
	 * @param $direccion ubicacion de donde se realizo al publicación.
	 * @param $tiposerv tipo de servicio al que cubre el maestro y su publicación.
	 * @param $detalle Cuadro de texto donde el maestro o cliente recita la descripcion de su publicación.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @var $sql objeto de manejo de consultas.
	 * @return ok mensaje si la funcion se ejecuto correctamente. 
	 * @return error mensaje si no se pudo ejecutar la consulta.
	 * 
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

	/**
	 * Esta funcion sirve para que se pueda denunciar una publicacion, los datos seran tomados a traves del metodo post y contendra los datos basicos para una denuncia.
	 * 
	 * @param $publicacion es el numero identifcador de la publicacion que esta siendo denunciada, sacada de la vista de publicaciones al ser un usuario registrado.
	 * @param $tipo tipo de denuncia que se sacara del selector y que son de tipos de denuncia permitidas a ciertos tipos de usuarios o publicaciones.
	 * @param $detalle de tipo string, es un cuadro de texto que el denunciante cree que describe la razon por la que la publicacion fue denunciada.
	 * @param $denunciante de tipo integer, identificador del denunciante que permite visualizar quien tubo relacion con la denuncia
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @var $sql objeto de manejo de consultas.
	 * @return ok mensaje si la funcion se ejecuto correctamente. 
	 * */
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
