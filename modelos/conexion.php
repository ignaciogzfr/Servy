<?php

class Conexion{
	static public function conectar(){
		$link = new PDO("remotemysql.com:3306;dbname=hd8LHE0bKS",'hd8LHE0bKS','mzCSJRrPI',
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		);

		return $link;
	}
}
?>