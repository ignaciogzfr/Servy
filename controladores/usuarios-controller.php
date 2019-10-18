<?php 

require_once '../modelos/modelo-usuarios.php';

Class GestorUsuarios(



){
	public function loginUsuario(){}

	public function registrarUsuario(){
		
	}


}

$op = $_POST["op"]

switch ($op) {
 	case 'login':
 		$response = new GestorUsuarios();
 		$response->loginUsuario($_POST["mail"],$_POST["pass"])
 		break;
 	
 	default:
 		# code...
 		break;
 } ?>