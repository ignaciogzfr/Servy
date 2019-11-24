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


			public function publicarServicio($idus,$tipopu,$titulo,$direccion,$tiposerv,$detalle,$lat,$lng){
		$respuesta = Publicaciones::publicarServicio($idus,$tipopu,$titulo,$direccion,$tiposerv,$detalle,$lat,$lng);
		echo($respuesta);
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

		case'publicarServicio';
		$response = new gestorPublicaciones();
		$response-> publicarServicio($_POST["id-usuario"],$_POST["tipo-publicacion"],$_POST["titulo-publi"],$_POST["direccion-publi"],$_POST["tipo-serv"],$_POST["detalle-publi"],$_POST["lat-publicacion"],$_POST["lng-publicacion"]);
		break;

		case '':
					
		break; 	

		default:
 		# code...
 		break;
		
		
	}

 ?>