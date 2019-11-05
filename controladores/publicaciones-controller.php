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


			public function publicarServicio($idus,$tipopu,$titulo,$direccion,$tiposerv,$detalle){
				$respuesta = Publicaciones::publicarServicio($idus,$tipopu,$titulo,$direccion,$tiposerv,$detalle)
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
		$response-> PublicarServicio($_POST["id-usuario"],$_POST["tipo-publicacion"],$_POST["titulo-publi"],$_POST["direccion-publi"],$_POST["tipo-serv"],$_POST["detalle-publi"],)
		
		
	}

 ?>