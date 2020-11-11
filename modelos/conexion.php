<?php
/**
		 * Esta clase controla el objeto e conexión
		 * 
		 * @author Ignacio Gonzales.
		 * @since 1.0 08-10-2019 20:27.
		 * @version 1.1 19-11-2019 18:03.
		 * 
		 * */
class Conexion{
	/**
	 * Metodo conectar, que al ser llamada retorna un objeto de conexión con la cual se podran realizar consultas a la base de datos remota.
	 * @var $link este objeto se le asigna el objeto de conexión .
	 * @return $link Objeto de conexión.
	 * */
	static public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=servy_db",'root','',
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		);
		
		return $link;
	}



}
?>
