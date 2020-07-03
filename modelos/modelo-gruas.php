<?php 
require_once'conexion.php';
/**
 * Consultas relacionadas con las peticiones a gruas e midificacion de estas mismas
 * 
 * @author Igancio Gonzales.
 * @author Johan Hernandez.
 * @since  1.1 16-10-2019 17:56.
 * @version 1.5 22-11-2019 16:41. version estable
 * 
 * */
Class Gruas{

	/**
	 * Al llamar a esta funcion se obtendran todos los parametros de la tabla en base de datos llamada tipo_grua y como adicion el tipo de vehiculo que se saca de la tabla tipo_vehiculo.
	 * 
	 * @var $con objeto de conexion que captura la conexion desde conexion.php.
	 * @var $sql objeto de manejo de consultas.
	 * @return $sql Matriz de datos que contiene la infrmacion de la consulta recien realizada.
	 * 
	 * */
	static function getGruas(){

		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT p.*, t.tipo_vehiculo FROM pedir_grua p, tipo_vehiculo t WHERE p.id_vehiculo = t.id_vehiculo");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC); 
	}


	/**
	 * Al llamar a esta funcion se obtendran los datos de la tabla tipo_vehiculo para cargarlo en algun selector.
	 * 
	 * @var $con objeto de conexion que captura la conexion desde conexion.php.
	 * @var $sql objeto de manejo de consultas.
	 * @return $sql Matriz de datos que contiene la infrmacion de la consulta recien realizada.
	 * 
	 * */
	static function getTipoVehiculo(){

		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT * FROM tipo_vehiculo");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC); 


	}


	/**
	 * Esta funcion permite ingresar datos a la tabla pedir_gruas, se utiliza para cuando un usuario quiera pedir una grua en el modal pedir grua.
	 * 
	 * @param $nombre de tipo string, nombre al que se le da una peticion de grua.
	 * @param $direccion de tipo string, nombre de las calle, poblacion y ciudad en donde esta ubicada la peticion a la grua.
	 * @param $fono de tipo string, telefono del accidentado que ha realizado una peticiona  la grua.
	 * @param $descripcion de tipo string, descripcion de lo sucedido por parte del accidentado.
	 * @param $tipo de tipo integer, relaciona un tipo de peticion.
	 * @param $lat altitud de las cordenadas utlizadas para geolocalizar al accidentado. 
	 * @param $lng longitud de las cordenadas utlizadas para geolocalizar al accidentado. 
	 * 
	 * @var $con objeto de conexion que captura la conexion desde conexion.php.
	 * @var $sql objeto de manejo de consultas.
	 * 
	 * @return ok si la funcion se ejecuto correctamente. 
	 * @return error si no se pudo ejecutar la consulta.
	 * 
	 * */
	static public function pedirGrua($nombre,$direccion,$fono,$descripcion,$tipo,$lat,$lng){
			$con = Conexion::conectar();
			$sql = $con->prepare("INSERT INTO pedir_grua(
				nombre_usuario_grua,
				direccion_grua,
				fono_usuario_grua,
				detalle_grua,
				id_vehiculo,
				lat_grua,	
				lng_grua,
				fecha_grua,
				estado_grua
				) VALUES (:nombre,:direccion,:fono,:descripcion,:tipo,:lat,:lng,NOW(),'Aprobada')");
			$sql->bindParam(":nombre",$nombre,PDO::PARAM_STR);
			$sql->bindParam(":direccion",$direccion,PDO::PARAM_STR);
			$sql->bindParam(":fono",$fono,PDO::PARAM_STR);
			$sql->bindParam(":descripcion",$descripcion,PDO::PARAM_STR);
			$sql->bindParam(":tipo",$tipo,PDO::PARAM_INT);
			$sql->bindParam(":lat",$lat,PDO::PARAM_STR);
			$sql->bindParam(":lng",$lng,PDO::PARAM_STR);


			if($sql->execute()){
			return "ok";
		}else{
			return "error";
		}

	}

}


 ?>