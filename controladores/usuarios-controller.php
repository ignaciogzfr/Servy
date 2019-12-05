<?php 
@session_start();
require_once '../modelos/modelo-usuarios.php';
/**
 *
 * 
 * esta clase controla las condiciones sobre los datos y sus posibles incongruencias,enviando una respuesta de cada consulta ejecutada en los modelos a usuarios.js para que maneje los datos de la respuesta y se redireccione a las pagina correctas 
 * 
 *
 * @version 1.0 20-11-2019 14:33.
 * @since 1.0 08-10-2019 20:27.
 * @author Ignacio Gonzalez
 * @author Johan Hernandez
 * 
 * @var $op de tipo string, alamcena el tipo de operacion comunmente obtenido a traves del metodo POST
 * 
 * */
Class GestorUsuarios{

	public function getResumenMaestro($id){
		$respuesta = Usuarios::getPerfilUsuario($id);
		echo json_encode($respuesta);
	}
	public function editarPerfilBasicoC($id,$nombre,$fono,$dir){
		$respuesta = Usuarios::editarPerfilBasicoC($id,$nombre,$fono,$dir);
		echo $respuesta;
	}
	public function editarPerfilBasicoM($id,$nombre,$fono,$dir,$exp){
		$respuesta = Usuarios::editarPerfilBasicoM($id,$nombre,$fono,$dir,$exp);
		echo $respuesta;
	}
	public function editarPerfilFP($id,$fp,$actual){
			if(is_array($fp)){
				$extension = '';
				if($fp["type"] == "image/jpeg"){
				$extension = ".jpeg";
				}elseif($fp["type"] == "image/jpg"){
				$extension = ".jpg";
				}elseif($fp["type"] == "image/png"){
				$extension = ".png";
				}else{
				echo("ERROR EXTENSION");
				}

				$ruta_imagen = "";
				$filename = md5($fp['tmp_name']).$extension;
				$ruta_imagen = 'img/fotos-usuarios/'.$filename;
				if(move_uploaded_file($fp['tmp_name'],"../".$ruta_imagen)){
				if($actual != 'img/placeholder-person.jpg'){
				unlink('../'.$actual);	
				}
				$respuesta = Usuarios::editarPerfilFP($id,$ruta_imagen);
				}
			}

		echo $respuesta;
	}
	public function editarPerfilServicios($id,$servicios){
		$respuesta = Usuarios::editarPerfilServicios($id,$servicios);
		echo $respuesta;
	}
	public function editarPerfilCertificados($id,$certificados){
		$respuesta = Usuarios::editarPerfilCertificados($id,$certificados);
		echo $respuesta;
	}
	public function verificarMail($mail){
		$respuesta = Usuarios::verificarMail($mail);
		echo $respuesta;
	}
	public function denunciarUsuario($denunciado,$tipo,$detalle){
		$respuesta = Usuarios::denunciarUsuario($_SESSION['id'],$denunciado,$tipo,$detalle);
		echo $respuesta;
	}
	public function registrarCliente($mail,$pass,$nombre,$fono,$fp,$dir,$tipo){

		if(is_array($fp)){
			$extension = '';
			if($fp["type"] == "image/jpeg"){
				$extension = ".jpeg";
			}elseif($fp["type"] == "image/jpg"){
				$extension = ".jpg";
			}elseif($fp["type"] == "image/png"){
				$extension = ".png";
			}else{
				echo("ERROR EXTENSION");
			}

			$ruta_imagen = "";
			$filename = md5($fp['tmp_name']).$extension;
			$ruta_imagen = 'img/fotos-usuarios/'.$filename;
			if(move_uploaded_file($fp['tmp_name'],"../".$ruta_imagen)){
			$respuesta = Usuarios::registrarCliente($mail,$pass,$nombre,$fono,$ruta_imagen,$dir,$tipo);
			}
		}else{
			$respuesta = Usuarios::registrarCliente($mail,$pass,$nombre,$fono,$fp,$dir,$tipo);
		}
		
		echo $respuesta;
	}


	public function registrarMaestro($mail,$pass,$nombre,$fono,$fp,$dir,$tipo,$servicios,$certificados,$exp){

		if(is_array($fp)){
			$extension = '';
			if($fp["type"] == "image/jpeg"){
				$extension = ".jpeg";
			}elseif($fp["type"] == "image/jpg"){
				$extension = ".jpg";
			}elseif($fp["type"] == "image/png"){
				$extension = ".png";
			}else{
				echo("ERROR EXTENSION");
			}
			$ruta_imagen = "";
			$filename = md5($fp['tmp_name']).$extension;
			$ruta_imagen = 'img/fotos-usuarios/'.$filename;

			if(move_uploaded_file($fp['tmp_name'],"../".$ruta_imagen)){
			$respuesta = Usuarios::registrarMaestro($mail,$pass,$nombre,$fono,$ruta_imagen,$dir,$tipo,$servicios,$certificados,$exp);
			}
		}else{
			$respuesta = Usuarios::registrarMaestro($mail,$pass,$nombre,$fono,$fp,$dir,$tipo,$servicios,$certificados,$exp);
		}
		
		echo $respuesta;
	}


	public function sancionarUsuario($id){
		$respuesta = Usuarios::sancionarUsuario($id);
		echo ($respuesta);
	}

	public function quitarSancionUsuario($id){
		$respuesta = Usuarios::quitarSancionUsuario($id);
		echo ($respuesta);
	}

	public function iniciartransaccion($id,$idtran,$idcliente){
		$respuesta = Usuarios::setSuscripcion($id,$idtran,$idcliente);
		echo($respuesta);
	}
}

$op = $_POST["op"];
switch($op){
		case 'getResumenMaestro':
		$response = new GestorUsuarios();
		$response->getResumenMaestro($_POST['id']);
		break;

		case 'verificarMail':
		$response = new GestorUsuarios();
		$response->verificarMail($_POST['mail-registro']);
		break;

		case 'registrarUsuario':
		if($_POST['tipo-registro']=='Cliente'){
		$response = new GestorUsuarios();
		if(isset($_FILES['fp-registro'])){
		$response->registrarCliente($_POST["mail-registro"],$_POST["pass-registro"],$_POST["nombre-registro"],$_POST["fono-registro"],$_FILES["fp-registro"],$_POST["dir-registro"],$_POST["tipo-registro"]);
		}else{
		$response->registrarCliente($_POST["mail-registro"],$_POST["pass-registro"],$_POST["nombre-registro"],$_POST["fono-registro"],$_POST["fp-registro"],$_POST["dir-registro"],$_POST["tipo-registro"]);
		}
		break;
		}else{
		$servicios = json_decode($_POST['servicios']);
		$certificados = json_decode($_POST['certificados']);
		$response = new GestorUsuarios();

		if(isset($_FILES['fp-registro'])){
		$response->registrarMaestro($_POST["mail-registro"],$_POST["pass-registro"],$_POST["nombre-registro"],$_POST["fono-registro"],$_FILES["fp-registro"],$_POST["dir-registro"],$_POST["tipo-registro"],$servicios,$certificados,$_POST['exp-registro']);
		}else{
		$response->registrarMaestro($_POST["mail-registro"],$_POST["pass-registro"],$_POST["nombre-registro"],$_POST["fono-registro"],$_POST["fp-registro"],$_POST["dir-registro"],$_POST["tipo-registro"],$servicios,$certificados,$_POST['exp-registro']);
		}
		break;
		}

		case 'denunciarUsuario':
		$response = new GestorUsuarios();
		$response->denunciarUsuario($_POST['denunciado'],$_POST['tipo_denuncia'],$_POST['detalle']);
		break;

		case 'sancionarUsuario':
		$response = new GestorUsuarios();
		$response->SancionarUsuario($_POST["id"]);
		break;
		case 'quitarSancionUsuario':
		$response = new GestorUsuarios();
		$response->QuitarSancionUsuario($_POST["id"]);
		break;

		case 'editarPerfilBasicoC':
		$response = new GestorUsuarios();
		$response->editarPerfilBasicoC($_POST['id'],$_POST['nombre'],$_POST['fono'],$_POST['dir']);
		break;

		case 'editarPerfilBasicoM':
		$response = new GestorUsuarios();
		$response->editarPerfilBasicoM($_POST['id'],$_POST['nombre'],$_POST['fono'],$_POST['dir'],$_POST['exp']);
		break;

		case 'editarPerfilFP':
		$response = new GestorUsuarios();
		$response->editarPerfilFP($_POST['id'],$_FILES['fp'],$_POST['fp-actual']);
		break;

		case 'editarPerfilServicios':
		$response = new GestorUsuarios();
		$servicios = json_decode($_POST['servicios']);
		$response->editarPerfilServicios($_POST['id'],$servicios);
		break;

		case 'editarPerfilCertificados':
		$response = new GestorUsuarios();
		$certificados = json_decode($_POST['certificados']);
		$response->editarPerfilCertificados($_POST['id'],$certificados);	
		break;

		case 'iniciartransaccion':
			$response = new GestorUsuarios();
			$response->iniciartransaccion($_POST['id'],$_POST['idtran'],$_POST['idcliente']);					
		break; 	

		default:
 		# code...
 		break;
 } ?>
