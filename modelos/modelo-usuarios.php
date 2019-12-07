<?php 

require_once("conexion.php");
/**
 * Esta clase  maneja las consultas relacionadas con la obtención y manipulación de información en cuando a usuarios se refiere.
 * 
 * @author Ignacio Gonzales
 * @author Johan Hernandez
 * @since 1.0 08-10-2019 20:27 inicio de actividades de tipo programación
 * @version 1.5 23-11-2019 09:19 cambio de metodo en la semana 5.
 * 
 * 
 * 
 * */
Class Usuarios{
	/**
	 * Con esta funcion se obtiene una tabla con todos los datos de la tabla de usuario.
	 * 
	 * @return $sql devuelve una tabla de datos con todos los usario registrados desde la base de datos remota.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * 
	 * */
	static public function getUsuarios(){
		$con = Conexion::conectar();
		$sql = $con->prepare('SELECT * FROM usuario WHERE tipo_usuario = "Maestro" or tipo_usuario = "Cliente" ');
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC); 
	}

	/**
	 * Con esta funcion se pueden obtener las publicaciones de un usuario especifico, que se encuentre registrado.
	 * @param $id de tipo integer, identificador del usuario al que se le requiere obtener sus publicaciones
	 * 
	 * @var $sql objeto de manejo de consultas.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * 
	 * @return $sql  matriz de datos, que almacena la respuesta de la base de datos en forma de tabla
	 * 
	 * */
	static public function getMisPublicaciones($id){
	$con = Conexion::conectar();
	$sql = $con->prepare('SELECT p.*, t.tipo_servicio FROM publicacion p, tipo_servicio t  WHERE p.id_usuario = :id and p.id_tipo_servicio = t.id_tipo_servicio ');
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}


	/**
	 * Esta funcion llama a las publicaciones de un usuario registrado ,mas especificamente que sean de tipo demanda, tipicamente usado para los clientes y los maestro, ya que ambos pueden ingresar este tipo de publicacion.
	 * 
	 * @param $id de tipo integer, identificador del usuario registrado que require sus publicaciones.
	 * 
	 * @var $sql objeto de manejo de consultas.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * 
	 * @return $sql matriz de datos que contiene los resultados obtenidos por la consulta de la base de datos.
	 * 
	 * */
	static public function getMisPublicacionesDemanda($id){
	$con = Conexion::conectar();
	$sql = $con->prepare('SELECT p.*, t.tipo_servicio FROM publicacion p, tipo_servicio t  WHERE p.id_usuario = :id and p.id_tipo_servicio = t.id_tipo_servicio AND p.tipo_publicacion = "Demanda" ');
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}


	/**
	 * Obtiene las publicaciones relacionadas a un usuario de tipo Maestro segun su identificador de tipo integer, los resultados se entregaran en forma de una matriz que contiene las publicaciones de tipo oferta.
	 * 
	 * @param $id de tipo integer, identificador de un Cliente al cual se le queire obtener sus publicaciones
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @return $sql devuelve una tabla de datos con todas las publicaciones registradas bajo el tipo "oferta" desde la base de datos remota.
	 * */
	static public function getMisPublicacionesOferta($id){
	$con = Conexion::conectar();
	$sql = $con->prepare('SELECT  p.*, t.tipo_servicio FROM publicacion p, tipo_servicio t WHERE p.id_usuario = :id AND p.id_tipo_servicio = t.id_tipo_servicio AND p.tipo_publicacion = "Oferta" ');
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * Con esta funcion se obtienen los parametros para rellenar el formulario de perfil, para esto se utilizara un identificador del usuario, usualmente obtenido a traves del metodo GET en los formularios de registro o login
	 * 
	 * @param $id de tipo integer, identificador de un usaurio registrado sea "Cliente" o "Maestro".
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @return $sql devuelve una tabla de datos con los parametros necesarios para rellenar con información el formulaio perfil.php. 
	 * */
	static public function getPerfilUsuario($id){
	$con = Conexion::conectar();
	$sql = $con->prepare('SELECT * FROM usuario WHERE id_usuario = :id');
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
 	 * Con esta funcion se obtienen los servicios al que el Maestro puede realizar, segun su registro siempre y cuando su estado este "Activo"
 	 * 
 	 * @param $id de tipo integer, identificador del Maestro.
 	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
 	 * @return $sql debuelve una tabla de datos que contiene los resultados de los servicios del maestro que se encuentran en estado "Activo".
	 * */
	static public function getServiciosMaestro($id){
	$con = Conexion::conectar();
	$sql = $con->prepare('SELECT t.tipo_servicio, t.id_tipo_servicio FROM usuario u, servicios_maestro s, tipo_servicio t WHERE u.id_usuario = :id AND s.id_usuario = u.id_usuario AND s.id_tipo_servicio = t.id_tipo_servicio AND s.estado_servicio_maestro = "Activo"');
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * Con esta funcion se obtienen las experiencias de un maestro, es un cuadro de texto que relata sus experiencias en trabajos realizados, se carga en el perfil y ve visualiza en vista-maestro por los clientes
	 * @param $id de tipo integer, identificador del maestro.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @return $sql que es un vector de datos que contiene el texto de una experiencia que tubo el usuario.
	 * */
	static public function getExperienciaMaestro($id){
	$con = Conexion::conectar();
	$sql = $con->prepare('SELECT e.detalle_experiencia FROM usuario u, experiencias_maestro e WHERE u.id_usuario = :id AND u.id_usuario = e.id_usuario');
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}


	/**
	 * Funcion que obtiene los certificados del maestro registrado, se pide un identificador del maestro.
	 * @param $id de tipo integer, identificador del maestro.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @return $sql que es una matriz de datos que contiene los certificados pertenecientes al usuario registrado de tipo "Maestro".
	 * */
	static public function getCertificadosMaestro($id){
	$con = Conexion::conectar();
	$sql = $con->prepare('SELECT c.id_certificado, c.nombre_certificado FROM usuario u, certificados_maestro c WHERE u.id_usuario = :id AND c.id_usuario = u.id_usuario');
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * Funcion que permite obtener todas las denuncias relacionadas de un usuario mestro o cliente y de que tipo son.
	 * @param $id de tipo integer, identificador del usuario.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @return $sql matriz de datos que contiene las denuncias hacia un usuario en especifico.
	 * */
	static public function getDenunciasUsuario($id){
		$con = Conexion::conectar();
	$sql = $con->prepare("SELECT d.*, u.nombre_usuario, t.tipo_denuncia FROM denuncias_usuario d, usuario u, tipos_denuncia t WHERE id_denunciado = :id and d.id_denunciante = u.id_usuario and d.id_tipo_denuncia = t.id_tipo_denuncia");
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}


	/**
	 * Con esta funcion se obtienen todos los datos de la tabla tipo de denuncia de los usuarios.
	 * 
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @return $sql matriz de datos que contiene los tipos de denuncia permitidos par los usuarios
	 * 
	 * */
	static public function getTiposDenunciaU(){
	$con = Conexion::conectar();
	$sql = $con->prepare("SELECT * FROM tipos_denuncia WHERE entidades_admitidas = 'Usuarios' OR entidades_admitidas = 'Ambos' ");
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	



// FIN CONSULTAS GET




// CONSULTAS RESPECTO A SANCIONES



	/**
	 * esta funcion captura datos necesarios para hacer una denuncia del controlador y als inserta en la base de datos apra ello se necesitara un denunciante, un denunciado, que tipo de denucnia se esta haciendo y un rezonamiento por la denuncia.
	 * 
	 * @param $denunciante de tipo integer, identificador del denunciante.
	 * @param $denunciado de tipo integer, identificador del usuario denunciado.
	 * @param $tipo de tipo integer, valor de id de la tabla tipo de denuncia, para clasificar una denuncia.
	 * @param $detalle de tipo string, razonamiento de la denuncia.
	 * 
	 * @var $sql objeto de consulta,sirve para almacenar la consulta y ejecutarla.
	 * @var $con obejto de conexion, objeto de conexion obtenido de conexion.php.
	 * 
	 * @return mensaje mensaje "denuncaido papu" que significa que la consulta fue realizada.
	 * 
	 * */
	static public function denunciarUsuario($denunciante,$denunciado,$tipo,$detalle){
	$con = Conexion::conectar();
	$sql = $con->prepare("INSERT INTO denuncias_usuario(id_denunciante,id_denunciado,id_tipo_denuncia,fecha_hora,comentarios_denuncia) VALUES (:denunciante, :denunciado, :tipo, NOW(), :detalle)");
	$sql->bindParam(":denunciante",$denunciante,PDO::PARAM_INT);
	$sql->bindParam(":denunciado",$denunciado,PDO::PARAM_INT);
	$sql->bindParam(":tipo",$tipo,PDO::PARAM_INT);
	$sql->bindParam(":detalle",$detalle,PDO::PARAM_STR);
	$sql->execute();
	return 'Denunciado papu';
	}




	/**
	 * Funcion que permite sancionar a una usuario utilizando su identificador del usuario en cuestion cambiando su estado a "Sancionado".
	 * 
	 * @param $id de tipo integer, identificador de el usuario que va a ser sancionado por un administrador.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @var $sql objeto de manejo de consultas.
	 * @return ok si la funcion se ejecuto correctamente. 
	 * @return error si no se pudo ejecutar la consulta.
	 * */
	static public function sancionarUsuario($id){
		$con = Conexion::conectar();
		$sql = $con->prepare("UPDATE usuario SET estado_usuario = 'Sancionado' WHERE id_usuario = :id");
		$sql->bindParam(":id",$id,PDO::PARAM_INT);
		if($sql->execute()){
			return "ok";
		}else{
			return "error";
		}

	}

	/**
	 * Funcion que permite sancionar a una usuario utilizando su identificador del usuario en cuestion cambiando sus estad a "Activo".
	 * 
	 * @param $id de tipo integer, identificador de el usuario que va a ser sancionado por un administrador.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @var $sql objeto de manejo de consultas.
	 * @return ok si la funcion se ejecuto correctamente. 
	 * @return error si no se pudo ejecutar la consulta.
	 * */
	static public function quitarSancionUsuario($id){
		$con = Conexion::conectar();
		$sql = $con->prepare("UPDATE usuario SET estado_usuario = 'Activo' WHERE id_usuario = :id");
		$sql->bindParam(":id",$id,PDO::PARAM_INT);
		if($sql->execute()){
			return "ok";

		}else{
			return "error";
		
		}

	}

// FIN CONSULTAS SANCIONES


// CONSULTAS INSERT/REGISTRO
	/**
	 * ingreso de una nueva subscricion a la base de datos, captura los datos proporcionados por la apy de paylap que devuelve una id de transaccion y el id del client eque realizao el pago, ademas se almacena el id del usuario que se encontraa registrado en el momento de que pasa la transaccion
	 * 
	 * @param $id de tipo integer, identificador del usuario que clickeo en el boton subscribirse.
	 * @param $idtran de tipo varchar, indetificador de la transaccion que se obtiene cuando el usuario realiza un pago.
	 * @param $idcliente de tipo varchar, identificador del cliente que realizao el pago, que proporciona la api de paypal.
	 * 
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @var $sql objeto de manejo de consultas.
	 * 
	 * @return ok si la funcion se ejecuto correctamente. 
	 * @return error si no se pudo ejecutar la consulta.
	 * 
	 * */
	static public function setSuscripcion($id,$idtran,$idcliente){
		$con = conexion::conectar();
		$sql = $con->prepare("INSERT INTO suscripcion_usuario(id_usuario,nro_transaccion,nro_cliente) values (:id,:idtran,:idcliente)
			");

		$sql->bindParam(":id",$id,PDO::PARAM_INT);
		$sql->bindParam(":idtran",$idtran,PDO::PARAM_STR);
		$sql->bindParam(":idcliente",$idcliente,PDO::PARAM_STR);
		if($sql->execute()){
			return "ok";
		}else{
			return "error";
		}
	}


	/**
	 * Esta funcion sirve para verificar si el dato de correo existe en la base de datos, usado para la validacion en registro e usuarios nuevos
	 * 
	 * @param $mail de tipo string, mail del usuario sin registrar que sirve apra realizar la comparacion en la base de datos.
	 * 
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @var $sql objeto de manejo de consultas.
	 * 
	 * @return numero, numero de cuantas coincidencias se encontraron con el correo ingresado.
	 * 
	 * */
	static public function verificarMail($mail){
	$con = Conexion::conectar();
	$sql = $con->prepare("SELECT * FROM usuario WHERE email_usuario = :mail");
	$sql->bindParam(":mail",$mail,PDO::PARAM_STR);
	$sql->execute();
	return count($sql->fetchAll(PDO::FETCH_ASSOC));
	}

	/**
	 * Funcion de registro para tipo cliente que al ser llamada se crea una consulta, se le asigan los parametros correspondientes para su ejecución y si tubo exito al ejecutar la consulta crea una variable de tipo global que almacenara los datos del usaurio recien registrado.
	 * 
	 * @param $mail de tipo string, correo de un usuario no registrado.
	 * @param $pass de tipo string, contraseña de un usuario no registrado.
	 * @param $nombre de tipo string, nombre de un usuario no registrado.
	 * @param $fono de tipo string, numero telefonico de 8 digitos.
	 * @param $fp de tipo string, ruta en donde se encuentra la foto de perfil de un usuario.
	 * @param $dir de tipo string, direccion porporiconada por ele usuario no registrado.
	 * @param $tipo de tipo string, tipo de usuario que desea hacer un registro.
	 * 
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * @var $sql objeto de manejo de consultas.
	 * 
	 * @global $_SESSION variable global que almacena una matriz de datos con los parametros del usuario recien creado. 
	 * 
	 * @return $id el identificador del ultimo usuario registrado en la pagina, el usuario actual.
	 * 
	 * @return ERROR mensaje de error en caso de que falle la consulta.
	 * 
	 * */
	static public function registrarCliente($mail,$pass,$nombre,$fono,$fp,$dir,$tipo){


	$con = Conexion::conectar();

		$sql = $con->prepare("INSERT INTO 
			usuario(email_usuario,nombre_usuario,
			fono_usuario,pass_usuario,foto_perfil,
			tipo_usuario,comuna,direccion_usuario,estado_usuario)
			VALUES
			(:mail,:nombre,:fono,
			:pass,:fp,:tipo,
			1,:direccion, 'Activo')"
		);

		$sql->bindParam(":mail",$mail,PDO::PARAM_STR);
		$sql->bindParam(":nombre",$nombre,PDO::PARAM_STR);
		$sql->bindParam(":fono",$fono,PDO::PARAM_STR);
		$sql->bindParam(":pass",$pass,PDO::PARAM_STR);
		$sql->bindParam(":fp",$fp,PDO::PARAM_STR);
		$sql->bindParam(":tipo",$tipo,PDO::PARAM_STR);
		$sql->bindParam(":direccion",$dir,PDO::PARAM_STR);

		if($sql->execute()){
		$id = $con->lastInsertId();

		@session_start();
		$_SESSION['sub'] = 0;
		$_SESSION['id'] = $id;
		$_SESSION['tipo'] = $tipo;
		$_SESSION['nombre'] = $nombre;
		$_SESSION['fono'] = $fono;
		$_SESSION['fp'] = $fp;
		$_SESSION['estado'] = 'Activo';
		$_SESSION['direccion'] = $dir;
		return $id;
		}else{
		return 'ERROR';
		}
		}


	/**
	 * Funcion de registro para tipo cliente que al ser llamada se crea una consulta, se le asigan los parametros correspondientes para su ejecución en caso de los certificados y servicios, se ingresa cada uno de ellos en bucle individualmente a la base de datos, si tubo exito al ejecutar la consulta crea una variable de tipo global que almacenara los datos del usaurio recien registrado.
	 * 
	 * @param $mail de tipo string, correo de un usuario no registrado.
	 * @param $pass de tipo string, contraseña de un usuario no registrado.
	 * @param $nombre de tipo string, nombre de un usuario no registrado.
	 * @param $fono de tipo string, numero telefonico de 8 digitos.
	 * @param $fp de tipo string, ruta en donde se encuentra la foto de perfil de un usuario.
	 * @param $dir de tipo string, direccion porporiconada por ele usuario no registrado.
	 * @param $tipo de tipo string, tipo de usuario que desea hacer un registro.
	 * @param $servicios vector con los datos para ingresar mas de un servicio.
	 * @param $certificados vector de datos que contiene los datos con los certificados proporcionados por el maestro.
	 * @param $experiencias de tipo string, texto que relata las experiencias del maestro.
	 * 
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * 
	 * @var $sql objeto de manejo de consultas.
	 * 
	 * @global $_SESSION variable global que almacena una matriz de datos con los parametros del usuario recien creado. 
	 * 
	 * @return $e de tipo string, almacena el error arrojado por el metodo try catch, una excepcion PDOexception. 
	 * 
	 * @return $id el identificador del ultimo usuario registrado en la pagina, el usuario actual
	 * 
	 * */
	static public function registrarMaestro($mail,$pass,$nombre,$fono,$fp,$dir,$tipo,$servicios,$certificados,$exp){

		try {
			$con = Conexion::conectar();
			$con->beginTransaction();
			$sql = $con->prepare("INSERT INTO 
				usuario(email_usuario,nombre_usuario,
				fono_usuario,pass_usuario,foto_perfil,
				tipo_usuario,comuna,direccion_usuario,estado_usuario)
				VALUES
				(:mail,:nombre,:fono,
				:pass,:fp,:tipo,
				1,:direccion, 'Activo')"
			);

			$sql->bindParam(":mail",$mail,PDO::PARAM_STR);
			$sql->bindParam(":nombre",$nombre,PDO::PARAM_STR);
			$sql->bindParam(":fono",$fono,PDO::PARAM_STR);
			$sql->bindParam(":pass",$pass,PDO::PARAM_STR);
			$sql->bindParam(":fp",$fp,PDO::PARAM_STR);
			$sql->bindParam(":tipo",$tipo,PDO::PARAM_STR);
			$sql->bindParam(":direccion",$dir,PDO::PARAM_STR);

			$sql->execute();
			$id = $con->lastInsertId();



			$sql = $con->prepare("INSERT INTO experiencias_maestro(id_usuario,detalle_experiencia) VALUES(:id,:exp)");
			$sql->bindParam(":id",$id,PDO::PARAM_INT);
			$sql->bindParam(":exp",$exp,PDO::PARAM_STR);
			$sql->execute();



			for ($i=0; $i <count($servicios); $i++) { 
			$sql = $con->prepare("INSERT INTO servicios_maestro(id_usuario,id_tipo_servicio,estado_servicio_maestro) 
				VALUES(:id,:servicio,'Activo')");
			$sql->bindParam(":id",$id,PDO::PARAM_INT);
			$sql->bindParam(":servicio",$servicios[$i],PDO::PARAM_INT);
			$sql->execute();
			}


			for ($i=0; $i <count($certificados); $i++) { 
			$sql = $con->prepare("INSERT INTO certificados_maestro(id_usuario,nombre_certificado) VALUES(:id,:certificado)");
			$sql->bindParam(":id",$id,PDO::PARAM_INT);
			$sql->bindParam(":certificado",$certificados[$i],PDO::PARAM_STR); 
			$sql->execute();
			}


			$con->commit();
			session_start();
			$_SESSION['id'] = $id;
			$_SESSION['tipo'] = $tipo;
			$_SESSION['nombre'] = $nombre;
			$_SESSION['fono'] = $fono;
			$_SESSION['fp'] = $fp;
			$_SESSION['estado'] = 'Activo';
			$_SESSION['direccion'] = $dir;
			return $id;
			} catch (PDOException $e) {
				$con->rollBack();
				return $e;
			}
	}
// FIN CONSULTAS REGISTRO


// CONSULTAS UPDATE/EDITAR


	/**
	 * Con esta función se pueden editar el perfil basico de un usuario de tipo cliente ya sea su nombre, correo, nro de telefono, dirección.
	 * 
	 * @param $id de tipo integer, identificador de un usuario de tipo cliente.
	 * @param $nombre de tipo string, nombre del cliente en tabla usaurio.
	 * @param $fono de tipo string, numero telefonico del usuario registrado de tipo cliente.
	 * @param $dir de tipo string, ubicación del usuario registrado.
	 * 
	 * @var $sql objeto de manejo de consultas.
	 * 
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * 
	 * @return OK mensaje si se ejecuta la consulta correctamente.
	 * 
	 * */
	static public function editarPerfilBasicoC($id,$nombre,$fono,$dir){
	$con = Conexion::conectar();
	$sql = $con->prepare('UPDATE usuario SET nombre_usuario = :nombre, fono_usuario = :fono, direccion_usuario = :dir WHERE id_usuario = :id');
	$sql->bindParam(':id',$id,PDO::PARAM_INT);
	$sql->bindParam(':nombre',$nombre,PDO::PARAM_STR);
	$sql->bindParam(':fono',$fono,PDO::PARAM_STR);
	$sql->bindParam(':dir',$dir,PDO::PARAM_STR);
	$sql->execute();
	return 'OK';
	}




	/**
	 * Con esta función se pueden editar el perfil basico de un usuario de tipo cliente ya sea su nombre, correo, nro de telefono, dirección.
	 * 
	 * @param $id de tipo integer, identificador de un usuario de tipo cliente.
	 * @param $nombre de tipo string, nombre del cliente en tabla usaurio.
	 * @param $fono de tipo string, numero telefonico del usuario registrado de tipo cliente.
	 * @param $dir de tipo string, ubicación del usuario registrado.
	 * @param $exp de tipo string, texto que describe una experiencia por parte del maestro.
	 * @var $sql objeto de manejo de consultas.
	 * 
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * 
	 * @return $e de tipo string, almacena el error arrojado por el metodo try catch, una excepcion PDOexception.
	 * 
	 * @return OK mensaje si se ejecuta la consulta correctamente.
	 * 
	 * */
	static public function editarPerfilBasicoM($id,$nombre,$fono,$dir,$exp){
	$con = Conexion::conectar();
	try{
	$con->beginTransaction();
	$sql = $con->prepare('UPDATE usuario SET nombre_usuario = :nombre, fono_usuario = :fono, direccion_usuario = :dir WHERE id_usuario = :id');
	$sql->bindParam(':id',$id,PDO::PARAM_INT);
	$sql->bindParam(':nombre',$nombre,PDO::PARAM_STR);
	$sql->bindParam(':fono',$fono,PDO::PARAM_STR);
	$sql->bindParam(':dir',$dir,PDO::PARAM_STR);
	$sql->execute();

	$sql1 = $con->prepare('UPDATE experiencias_maestro SET detalle_experiencia = :exp WHERE id_usuario = :id');
	$sql1->bindParam(':id',$id,PDO::PARAM_INT);
	$sql1->bindParam(':exp',$exp,PDO::PARAM_STR);
	$sql1->execute();
	$con->commit();
	return 'OK';
	}
	catch(PDOException $e){
	$con->rollBack();
	return $e;
	}
	}

	/**
	 * Funcion que permite editar una ruta de la foto de perfil de una usaurio registrado.
	 * 
	 * 
	 * @param $id de tipo integer, identificador del usaurio registrado.
	 * @param $fp de tipo  string, que contiene la ruta de la ubicacion de la imagen de portade de un usuario.
	 * @var $sql objeto de manejo de consultas.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * 
	 * @return $e de tipo string, almacena el error arrojado por el metodo try catch, una excepcion PDOexception. 
	 * 
	 * @return OK mensaje si se ejecuta la consulta correctamente.
	 * */
	static public function editarPerfilFP($id,$fp){
	$con = Conexion::conectar();
	$sql = $con->prepare('UPDATE usuario SET foto_perfil = :fp WHERE id_usuario = :id');
	$sql->bindParam(':id',$id,PDO::PARAM_INT);
	$sql->bindParam(':fp',$fp,PDO::PARAM_STR);
	$sql->execute();
	return 'OK';
	}


	/**
	 * Esta funcion permite editar los servicios relacionados con un usuario de tipo maestro para esto requiere un identificador de usuario y un vector con los servicios que contenga la modificacion.
	 * 
	 * @param $id de tipo integer, identificador del usaurio registrado de tipo maestro
	 * @param $servicios vector de tipo integer, contiene los identificadores de los servicios al que el maestro afirma estar relacionado.
	 * @var $sql objeto de manejo de consultas.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php. 
	 * 
	 * @return $e de tipo string, almacena el error arrojado por el metodo try catch, una excepcion PDOexception. 
	 * 
	 * @return OK mensaje si se ejecuta la consulta correctamente.
	 * */
	static public function editarPerfilServicios($id,$servicios){
	$con = Conexion::conectar();
	try{
	$con->beginTransaction();
	$sql = $con->prepare('DELETE FROM servicios_maestro WHERE id_usuario = :id');
	$sql->bindParam(':id',$id,PDO::PARAM_INT);
	$sql->execute();
	for($i = 0; $i<count($servicios);$i++){
	$sql = $con->prepare('INSERT INTO servicios_maestro(id_usuario,id_tipo_servicio,estado_servicio_maestro) VALUES (:id,:servicio,"Activo") ');
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->bindParam(':servicio',$servicios[$i],PDO::PARAM_INT);
	$sql->execute();
	}
	$con->commit();
	return 'OK';	
	}
	catch(PDOException $e){
		$con->rollBack();
		return $e;
	}
	}

	/**
	 * Esta funcion permite editar los certificados relacionados con un usuario de tipo maestro para esto requiere un identificador de usuario y un vector con los servicios que contenga los nombres de los certificados.
	 * 
	 * @param $id de tipo integer, identificador del usaurio registrado de tipo maestro.
	 * @param $servicios vector de tipo string, que contiene los nombres de los certificados.
	 * @var $sql objeto de manejo de consultas.
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php.
	 * 
	 * @return $e de tipo string, almacena el error arrojado por el metodo try catch, una excepcion PDOexception. 
	 * 
	 * @return OK mensaje si se ejecuta la consulta correctamente.
	 * */
	static public function editarPerfilCertificados($id,$certificados){
	$con = Conexion::conectar();
	try{
	$con->beginTransaction();
	$sql = $con->prepare('DELETE FROM certificados_maestro WHERE id_usuario = :id');
	$sql->bindParam(':id',$id,PDO::PARAM_INT);
	$sql->execute();	
		
	for($i = 0; $i<count($certificados);$i++){
	$sql = $con->prepare('INSERT INTO certificados_maestro(id_usuario,nombre_certificado) VALUES(:id, :certificado)');
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->bindParam(':certificado',$certificados[$i],PDO::PARAM_STR);
	$sql->execute();
	}
	$con->commit();
	return 'OK';
	}
	catch(PDOException $e){
		$con->rollBack();
		return $e;
	}
	}

	}


 ?>
