<?php 
@session_start();
require_once("../modelos/modelo-publicaciones.php");


	/**
	 * Esta clase se encarga de obtener los datos de los formulario a traves del metodo post y obtener el tipo de operacion para llamar a funcionalidades de los modelos para manejar los datos y para emitir respuestas a las clases javascript
	 * 
	 * @author Johan Hernandez.
	 * @author Ignacio Gonzales.
	 * @since 1.0 08-10-2019 20:27. 
	 * @version 1.0 20-11-2019 14:33.
	 * 
	 * @var $op de tipo string, alamcena el tipo de operacion comunmente obtenido a traves del metodo POST
	 * 
	 * 
	 * */
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
			public function denunciarP($publicacion,$tipo,$detalle,$denunciante){
			$respuesta = Publicaciones::denunciarP($publicacion,$tipo,$detalle,$denunciante);
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
		$response-> publicarServicio($_POST["id-usuario"],$_POST["tipo-publicacion"],$_POST["titulo-publi"],$_POST["direccion-publi"],$_POST["tipo-serv"],$_POST["detalle-publi"],$_POST["lat"],$_POST["lng"]);
		break;

		case 'denunciarP':
			$response = new gestorPublicaciones();
			$response-> denunciarP($_POST['publicacion'],$_POST['tipo_denuncia'],$_POST['detalle'],$_SESSION['id']);	
		break; 	

		default:
 		# code...
 		break;
		
		
	}

 ?>
