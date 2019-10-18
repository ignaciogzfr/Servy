<?php 

require_once("../modelos/modelo-usuarios.php");

	Class gestorUsuarios{

			public function sancionarUsuario($id){
				$respuesta = Usuarios::sancionarUsuario($id);
				echo ($respuesta);
			}

			public function quitarSancionUsuario($id){
				$respuesta = Usuarios::quitarSancionUsuario($id);
				echo ($respuesta);
			}


	}


$op= $_POST["op"];

	switch ($op) {
		case 'sancionarUsuario':
			$response = new  gestorUsuarios();
			$response-> SancionarUsuario($_POST["id"]);
			break;
		case 'quitarSancionUsuario':
			$response = new gestorUsuarios();
			$response-> QuitarSancionUsuario($_POST["id"]);
			break;
		
		
	}

 ?>