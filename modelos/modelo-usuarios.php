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
	
	static public function loginUsuario($mail,$pass){

	$con = Conexion::conectar();
	$sql = $con->prepare("SELECT * FROM usuario WHERE email_usuario = :mail AND pass_usuario = :pass");
	$sql->bindParam(":mail",$mail,PDO::PARAM_STR);
	$sql->bindParam(":pass",$pass,PDO::PARAM_STR);

	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

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

		$sql->execute();		


	
		}

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
			return 'Listo';
			} catch (PDOException $e) {
				$con->rollBack();
				return $e;
			}
	}
	}


 ?>
