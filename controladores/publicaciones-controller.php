<?php 

require_once("../modelos/modelo-publicaciones.php");

	Class gestorPublicaciones{

			public function sancionarPublicacion($id){
				$respuesta = Publicaciones::sancionarPublicacion($id);
				echo ($respuesta);
			}

			public function quitarSancionPublicacion($id){
				$respuesta = Publicaciones::quitarSancionPublicacion($id);
				echo ($respuesta);
			}


	}


$op= $_POST["op"];

	switch ($op) {
		case 'sancionarPublicacion':
			$response = new  gestorPublicaciones();
			$response-> SancionarPublicacion($_POST["id"]);
			break;
		case 'quitarSancionPublicacion':
			$response = new gestorPublicaciones();
			$response-> QuitarSancionPublicacion($_POST["id"]);
			break;
		
		
	}

 ?>