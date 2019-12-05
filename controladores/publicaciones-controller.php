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

			/**
	 		* funcion que controla al llamada al modelo de publicaciones, y la funcion de sancionar la publicacion, de acuerdo al identificador de publicacion
	 		* 
	 		* @param $id de tipo integer, identificador de la publicacion.
	 		* 
	 		* @return $respuesta de tipo string, controla el mensaje de respuesta, proporcionada por el modelo.
	 		* */
			public function sancionarPublicacion($id){
				$respuesta = Publicaciones::sancionarPublicacion($id);
				echo ($respuesta);
			}

			/**
	 		* funcion que controla al llamada al modelo de publicaciones, y la funcion de sancionar la publicacion, de acuerdo al identificador de publicacion
	 		* 
	 		* @param $id de tipo integer, identificador de la publicacion.
	 		* 
	 		* @return $respuesta de tipo string, controla el mensaje de respuesta, proporcionada por el modelo.
	 		* */
			public function quitarSancionPublicacion($id){
				$respuesta = Publicaciones::quitarSancionPublicacion($id);
				echo ($respuesta);
			}

			/**
			 * Esta funcion se utiliza para realizar una publicacion con los datos obtenidos del formulario publicacion.
			 * 
			 * @param $idus de tipo integer, identificador del usaurio que realiza la publicacion.
			 * @param $tipopu de tipo string, tipo de publicacion que puede ser demanda o oferta.
			 * @param $titulo de tipo string, titulo de la publicacion.
			 * @param $direccion de tipo string, direccion proporcionada por el usaurio o por la api de geolocalizacion al hacer click al boont obtener direccion.
			 * @param $tiposerv de tipos string, selector que identifica la categoria del trabajo que se esta ofreciendo.
			 * @param $detalle de tipo string, descripcion de la publicacion.
			 * @param $lat de tipo string, altitud de la socrdenadas para la pai de google maps.
	 		 * @param $lng de tipos string, longitud de las cordenadas para la api de google maps.
			 * 
			 * @return $respuesta de tipo sstring, respuesta que emite el modelo al ser llamado la funcion publicarServicio.
			 * 
			 * */
			public function publicarServicio($idus,$tipopu,$titulo,$direccion,$tiposerv,$detalle,$lat,$lng){
			$respuesta = Publicaciones::publicarServicio($idus,$tipopu,$titulo,$direccion,$tiposerv,$detalle,$lat,$lng);
			echo($respuesta);
			}

			/**
			 * se utiliza para denunciar una publicacion, estos datos se toman de un modal que contiene los parametros que son necesarios para realizar una denuncia.
			 * 
			 * @param $publicacion de tipo integer, identificador de una publicacion que esta siendo denunciada.
			 * @param $tipo de tipo string, tipo de denucnai permitida para cierto tipo de usuario.
			 * @param $detalle de tipo string,  detalle de la denuncia impuesto por el denunciante.
			 * @param $denunciante de tipo integer, identificador del usuario que realizo la denuncia.
			 * 
			 * @return $respuesta de tipo string, respuesta que emite el modelo al ser llamado la funcion publicarServicio.
			 * 
			 * */
			public function denunciarP($publicacion,$tipo,$detalle,$denunciante){
			$respuesta = Publicaciones::denunciarP($publicacion,$tipo,$detalle,$denunciante);
			echo($respuesta);
			}


			/**
			 * Se utiliza apra ingresar una publicacion de tipo invitado, llamado tipicamente del homepage, formulario del index.
			 * 
			 * @param $nombre de tipo string, nombre de usuario anonimo que realiza uan peticion.
			 * @param $fono de tipo string, telefono al que el invitado menciona que pude ser su contacto.
			 * @param $titulo de tipo string, nombre de la publicacion.
			 * @param $direccion de tipo string, direccion proporcionada por el usuario invitado.
			 * @param $tiposerv de tipo string, tipo de servicio que el usaurio pide que se cubra al realiza la demanda.
			 * @param $detalle de tipo string, detalle del servicio que requiere el invitado. 
			 * 
			 * */
			public function publicarServicioInvitado($nombre,$fono,$titulo,$direccion,$tiposerv,$detalle){
				$respuesta = Publicaciones::publicarServicioInvitado($nombre,$fono,$titulo,$direccion,$tiposerv,$detalle);
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
