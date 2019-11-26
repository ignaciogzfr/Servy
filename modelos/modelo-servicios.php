<?php 

require_once("conexion.php");

/**
 * @author Ignacio Gonzales
 * @since 1.1 16-10-2019 17:56
 * @version 1.5 19-11-2019 19:56
 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php
 * @var $sql objeto de consulta que requiere del objeto de conexion y una consulta o un string que contenga una. 
 * */
Class Servicios{
	/**
	 * Con esta función se obtienen los servicios apra su carga en lso selectores de los formularios
	 * @return matriz de datos con los resultados de la tabla servicios
	 * 
	 * */
	static public function getServicios(){
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT * FROM tipo_servicio");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC);

	}

}

 ?>