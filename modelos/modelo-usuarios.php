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
	static public function getPerfilUsuario($id){
	$con = Conexion::conectar();
	$sql = $con->prepare('SELECT * FROM usuario WHERE id_usuario = :id');
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	static public function getServiciosMaestro($id){
	$con = Conexion::conectar();
	$sql = $con->prepare('SELECT t.tipo_servicio FROM usuario u, servicios_maestro s, tipo_servicio t WHERE u.id_usuario = :id AND s.id_usuario = u.id_usuario AND s.id_tipo_servicio = t.id_tipo_servicio AND s.estado_servicio_maestro = "Activo"');
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function getExperienciaMaestro($id){
	$con = Conexion::conectar();
	$sql = $con->prepare('SELECT e.detalle_experiencia FROM usuario u, experiencias_maestro e WHERE u.id_usuario = :id AND u.id_usuario = e.id_usuario');
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	static public function getCertificadosMaestro($id){
	$con = Conexion::conectar();
	$sql = $con->prepare('SELECT c.id_certificado, c.nombre_certificado FROM usuario u, certificados_maestro c WHERE u.id_usuario = :id AND c.id_usuario = u.id_usuario');
	$sql->bindParam(":id",$id,PDO::PARAM_INT);
	$sql->execute();
	return $sql->fetchAll(PDO::FETCH_ASSOC);
	}


// FIN CONSULTAS GET




// CONSULTAS RESPECTO A SANCIONES

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

// FIN CONSULTAS SANCIONES


// CONSULTAS INSERT/REGISTRO
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
			return $id;
			} catch (PDOException $e) {
				$con->rollBack();
				return $e;
			}
	}
// FIN CONSULTAS REGISTRO


// CONSULTAS UPDATE/EDITAR

	static public function editarPerfilBasicoC($id,$nombre,$mail,$fono,$dir){
	$con = Conexion::conectar();
	$sql = $con->prepare('UPDATE usuario SET nombre_usuario = :nombre, email_usuario = :mail, fono_usuario = :fono, direccion_usuario = :dir WHERE id_usuario = :id');
	$sql->bindParam(':id',$id,PDO::PARAM_INT);
	$sql->bindParam(':nombre',$nombre,PDO::PARAM_STR);
	$sql->bindParam(':mail',$mail,PDO::PARAM_STR);
	$sql->bindParam(':fono',$fono,PDO::PARAM_STR);
	$sql->bindParam(':dir',$dir,PDO::PARAM_STR);
	$sql->execute();
	return 'OK';
	}
	static public function editarPerfilBasicoM($id,$nombre,$mail,$fono,$dir,$exp){
	$con = Conexion::conectar();
	try{
	$con->beginTransaction();
	$sql = $con->prepare('UPDATE usuario SET nombre_usuario = :nombre, email_usuario = :mail, fono_usuario = :fono, direccion_usuario = :dir WHERE id_usuario = :id');
	$sql->bindParam(':id',$id,PDO::PARAM_INT);
	$sql->bindParam(':nombre',$nombre,PDO::PARAM_STR);
	$sql->bindParam(':mail',$mail,PDO::PARAM_STR);
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
	static public function editarPerfilFP(){
	$con = Conexion::conectar();
	$sql = $con->prepare('UPDATE ');
	$sql->execute();
	return 'OK';
	}
	static public function editarPerfilServicios(){
	$con = Conexion::conectar();
	try{
	$con->beginTransaction();	
	
	$sql = $con->prepare('UPDATE ');
	$sql->execute();
	$con->commit();
	return 'OK';
	}
	catch(PDOException $e){
		$con->rollBack();
		return $e;
	}
	}
	static public function editarPerfilCertificados(){
	$con = Conexion::conectar();
	try{
	$con->beginTransaction();	
	
	$sql = $con->prepare('UPDATE ');
	$sql->execute();
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
