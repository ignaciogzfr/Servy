<?php 

require_once("conexion.php");

/**
 * Esta clase almacena la obtencion de datos relacionadas con los servicios y su carga en los selectores.
 * 
 * @author Ignacio Gonzales
 * @since 1.1 16-10-2019 17:56
 * @version 1.5 19-11-2019 19:56
 * 
 * */
Class Servicios{
	/**
	 * Con esta función se obtienen los servicios apra su carga en lso selectores de los formularios.
	 * 
	 * @return $sql matriz de datos con los resultados de la tabla servicios
	 * @var $con objeto receptor del objeto de conexion en  modelos/conexion.php
	 * */
	static public function getServicios(){
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT * FROM tipo_servicio");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC);

	}

}

 ?>