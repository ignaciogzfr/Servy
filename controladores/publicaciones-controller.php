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

			public function publicarServicioInvitado($nombre,$fono,$titulo,$direccion,$tiposerv,$detalle){
				$respuesta = Publicaciones::publicarServicioInvitado($nombre,$fono,$titulo,$direccion,$tiposerv,$detalle);
				echo($respuesta);
			}

			public function aceptarPublicacion($id,$idp){
				$respuesta = Publicaciones::aceptarPublicacion($id,$idp);
				echo($respuesta);
			}

			public function aceptarPublicacionInvitado($id,$idp){
				$respuesta = Publicaciones::aceptarPublicacionInvitado($id,$idp);
				echo($respuesta);
			}

			public function solucionarServicio($id){
				$respuesta = Publicaciones::solucionarServicio($id);
				echo($respuesta);
			}

				public function solucionarServicioInvitado($id){
				$respuesta = Publicaciones::solucionarServicioInvitado($id);
				echo($respuesta);
			}

	}


$op= $_POST["op"];

	switch ($op) {

		case 'aceptarPublicacionInvitado':
		$response = new gestorPublicaciones();
		$response-> aceptarPublicacionInvitado($_POST["id"],$_POST["idp"]);
		break; 

		case 'solucionarServicio':
		$response = new gestorPublicaciones();
		$response-> solucionarServicio($_POST["id"]);	
		break;

		case 'solucionarServicioInvitado':
		$response = new gestorPublicaciones();
		$response-> solucionarServicioInvitado($_POST["id"]);	
		break;

		case 'aceptarPublicacion':
		$response = new gestorPublicaciones();
		$response-> aceptarPublicacion($_POST["id"],$_POST["idp"]);
		break; 

		case 'sancionarPublicacion':
			$response = new  gestorPublicaciones();
			$response-> SancionarPublicacion($_POST["id"]);
			break;
		case 'quitarSancionPublicacion':
			$response = new gestorPublicaciones();
			$response-> QuitarSancionPublicacion($_POST["id"]);
			break;

		case'publicarServicio':
		$response = new gestorPublicaciones();
		$response-> publicarServicio($_POST["id-usuario"],$_POST["tipo-publicacion"],$_POST["titulo-publi"],$_POST["direccion-publi"],$_POST["tipo-serv"],$_POST["detalle-publi"],$_POST["lat"],$_POST["lng"]);
		break;

		case'publicarServicioInvitado':
		$response = new gestorPublicaciones();
		$response-> publicarServicioInvitado($_POST["nombre"],$_POST["fono"],$_POST["titulo"],$_POST["direccion"],$_POST["tipo-servicio"],$_POST["detalle"]);
		break;

		case '':
					
		break; 	

		default:
 		# code...
 		break;
		
		
	}

 ?>
