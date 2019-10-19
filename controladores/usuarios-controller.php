<?php 

require_once '../modelos/modelo-usuarios.php';

Class GestorUsuarios{
	public function loginUsuario($mail,$pass){
		$respuesta = Usuarios::loginUsuario($mail,$pass);
		echo($respuesta);
	}

	public function registrarCliente($mail,$pass,$nombre,$fono,$fp,$dir,$tipo){

		$respuesta = Usuarios::registrarUsuario($mail,$pass,$nombre,$fono,$fp,$dir,$tipo);
		echo $respuesta;
	}
	public function registrarMaestro($mail,$pass,$nombre,$fono,$fp,$dir,$tipo,$servicios,$certificados,$exp){
		$respuesta = Usuarios::registrarMaestro($mail,$pass,$nombre,$fono,$fp,$dir,$tipo,$servicios,$certificados,$exp);
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
}

$op = $_POST["op"];
switch ($op) {

		case 'login':
		$response = new GestorUsuarios();
		$response->loginUsuario($_POST["mail-login"],$_POST["pass-login"]);
		break;
		case 'registrarUsuario':
		if($_POST['tipo-registro']=='Cliente'){
		$response = new GestorUsuarios();
		$response->registrarUsuario($_POST["mail-registro"],$_POST["pass-registro"],$_POST["nombre-registro"],$_POST["fono-registro"],$_POST["fp-registro"],$_POST["dir-registro"],$_POST["tipo-registro"]);
		break;
		}else{
		$servicios = json_decode($_POST['servicios']);
		$certificados = json_decode($_POST['certificados']);
		$response = new GestorUsuarios();
		$response->registrarMaestro($_POST["mail-registro"],$_POST["pass-registro"],$_POST["nombre-registro"],$_POST["fono-registro"],$_POST["fp-registro"],$_POST["dir-registro"],$_POST["tipo-registro"],$servicios,$certificados,$_POST['exp-registro']);
		break;
		}
		case 'sancionarUsuario':
		$response = new  gestorUsuarios();
		$response-> SancionarUsuario($_POST["id"]);
		break;
		case 'quitarSancionUsuario':
		$response = new gestorUsuarios();
		$response-> QuitarSancionUsuario($_POST["id"]);
		break;
 	default:
 		# code...
 		break;
 } ?>
