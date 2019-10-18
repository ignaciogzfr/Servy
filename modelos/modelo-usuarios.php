<?php 

require_once("conexion.php");

Class Usuarios{

	static public function getUsuarios(){
				//obtiene todos los datos de la  tabla usuario
		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT * FROM usuario");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC); 

	}


	static public function sancionarUsuario($id){
			//actualiza el estado del usuario
		$con = Conexion::conectar();
		$sql = $con->prepare("UPDATE usuario SET estado_usuario = 'Sancionado' WHERE id_usuario = :id");
		$sql->bindParam(":id",$id,PDO::PARAM_INT);
		if($sql->execute()){
			return "ok";
		}else{
			return "error";
		}

	}

	static public function quitarSancionUsuario($id){
			//actualiza el estado del usuario
		$con = Conexion::conectar();
		$sql = $con->prepare("UPDATE usuario SET estado_usuario = 'Activo' WHERE id_usuario = :id");
		$sql->bindParam(":id",$id,PDO::PARAM_INT);
		if($sql->execute()){
			return "ok";
		}else{
			return "error";
		}

	}
		
}

 ?>