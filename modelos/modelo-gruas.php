<?php 
require_once'conexion.php';

Class Gruas{

	static function getGruas(){

		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT p.*, t.tipo_vehiculo FROM pedir_grua p, tipo_vehiculo t WHERE p.id_vehiculo = t.id_vehiculo");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC); 
	}

	static function getTipoVehiculo(){

		$con = Conexion::conectar();
		$sql = $con->prepare("SELECT * FROM tipo_vehiculo");
		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC); 


	}


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
				fecha_grua
				) VALUES (:nombre,:direccion,:fono,:descripcion,:tipo,:lat,:lng,NOW())");
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