<?php
/**
		 * 
		 * Se utiliza para concetar con la base de datos remota para acceder a esta se necesita crear una cuenta en la apgian principal y iniciar una base de datos, luego se crea un objeto de conección que sera utilizado en componentes y modelos para obtener datos y relizar consultas
		 * 
		 * @author Ignacio
		 * @param $link se almacena el objeto de conexión con los parametros del servidor requeridos 
		 * @return $link objeto para establece una conexión a la base de datos
		 * 
		 * */
class Conexion{
	static public function conectar(){
		$link = new PDO("mysql:host=remotemysql.com:3306;dbname=hd8LHE0bKS",'hd8LHE0bKS','DqLSfCRNXs',
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		);
		
		return $link;
	}
}
?>
