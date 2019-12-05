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

	/**
	 * Con esta funcion se obtienen los datos del maestro para ingresarlos en el modal vista-maestro.php y se maneja la respuesta obtenida de los modelos de consultas
	 * 
	 * @param $id de tipo string, identificador del maestro al que se le necesitan sacar lso datos.
	 * 
	 * @var $resuesta matriz de datos que obtiene los datos de la consulta emitida por los modelos.
	 * 
	 * @return $respuesta matriz de datos que contiene los datos del maestro
	 * */
	public function getResumenMaestro($id){
		$respuesta = Usuarios::getPerfilUsuario($id);
		echo json_encode($respuesta);
	}


	/**
	 * Con esta funcion se pueden editar los inputs de nombre,fono y direccion del usuario registrdo de tipo cliente.
	 * 
	 * @param  $id de tipo integer, indentificador del cliente, que tiene como proposito editar sus datos basicos.
	 * @param  $nombre de tipo string, nombre de el usaurio quese encuentra al visualizar el perfil o en el sidenav como seudonimo.
	 * @param  $fono de tipo string, telefono del cliente.
	 * @param  $dir de tipo string, direccion a la cual el cliente dice pertenecer. 
	 * 
	 * 
	 * 
	 * */
	public function editarPerfilBasicoC($id,$nombre,$fono,$dir){
		$respuesta = Usuarios::editarPerfilBasicoC($id,$nombre,$fono,$dir);
		echo $respuesta;
	}

	/**
	 * Esta funcion  se puede modificar los inputs basicos de un perfil de un maestro.
	 * 
	 * @param $id de tipo integer, identificador del usuario que requiere hacer un cambio de perfil
	 * @param $nombre de tipo string , nombre del usuario que necesita cambiar de nombre.
	 * @param $fono de tipo string, telefono del maestro que requiere ser cambiado.
	 * @param $dir de tipo string, direccion proporcionada por ele usaurio que necesita ser modificada.
	 * @param $exp de tipo string, caja de texto que contiene la despcriocion de un aexperienca del usuario.
	 * 
	 * @var $respuesta tabla con los datos de la repsuesta que fue proporcionada por la conslta en el modelo.
	 * 
	 * 
	 * */
	public function editarPerfilBasicoM($id,$nombre,$fono,$dir,$exp){
		$respuesta = Usuarios::editarPerfilBasicoM($id,$nombre,$fono,$dir,$exp);
		echo $respuesta;
	}



	/**
	 * Esta funcion sirve para editar la foto de perfil de los usuarios registrados, este compara las extenciones del archivo entregado por el usaurio, y los compara con las extenciones permitidas, transforma la imagen y almacena las iamgenes en la carpeta imag/fotos-usuarios donde se le encriptara el nombre, se generara la ruta de la imagen y se almacenara ese texto en la base de datos
	 * 
	 * @param $id de tipo integer, identificador del usuario que cambia de foto de perfil.
	 * @param $fp de tipo string, ruta de done se encuantra el archivo de la imagen.
	 * @param $actual de tipo string, ruta de la actual imagen del usuario.
	 * 
	 * @var $extencion de tipo string, en esta varialbe se alamcenara el tipo de extencion que utiliza la imagen
	 * @var $ruta_imagen de tipo stirng, variable al que se le alamcenara la ruta final de la nueva foto de perfil.
	 * @var $filename de tipo string, nombre encriptado de la imagen que se compone de su nombre y su extencion.
	 * 
	 * @return $respuesta de tipo string, variable de respuesta que indica si la consutla se ejecuto correctamente, dada por el modelo al que se le llamo
	 * 
	 * */
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


	/**
	 * Se utiliza para editar los servicios existentes, o ingresar nuevos para esto requireer la lista obtenida de los formularios del perfil del maestro
	 * 
	 * @param $id de tipo integer, identificador del usuario de tipo maestro que esta modificando sus servicios
	 * @param $servicios vector de datos, contiene una lista de todos los servicios al que el usuario afirma ser maestro.
	 * 
	 * @return $respuesta de tipo string, que se obiene al lalamar al modelo
	 * 
	 * */
	public function editarPerfilServicios($id,$servicios){
		$respuesta = Usuarios::editarPerfilServicios($id,$servicios);
		echo $respuesta;
	}


	/**
	 * Se utiliza para editar los certificados de un usuario, certificado es una lsita de los certificados que estan en la laista de modificar perfil, y se emite la respuesta conseguida del modelo.
	 * 
	 * @param $id de tipo integer, identificador del usuario de tipo maestro que necesita que se le modifiquen su lsita de servicios
	 * @param $certificados vetor de datos, contiene los certificados de la lsita de modificar perfil maestro.
	 * 
	 * @return $respuesta de tipo string, respuesta que se obtiene al llamar al modelo. 
	 * */
	public function editarPerfilCertificados($id,$certificados){
		$respuesta = Usuarios::editarPerfilCertificados($id,$certificados);
		echo $respuesta;
	}


	/**
	 * Sirve para poder registrar un nuevo usuario, ya que el correo es una clave unica, el valor que el usaurio entregue no debe encontrarse en la base de datos.
	 * 
	 * @param $mail de tipo string, valor con el que se hara la comparacion de correo.
	 * 
	 * @return $respuesta de tipos string, mensaje que indica si el correo existe en la base de datos.
	 * 
	 * 
	 * */
	public function verificarMail($mail){
		$respuesta = Usuarios::verificarMail($mail);
		echo $respuesta;
	}



	

	public function denunciarUsuario($denunciado,$tipo,$detalle){
		$respuesta = Usuarios::denunciarUsuario($_SESSION['id'],$denunciado,$tipo,$detalle);
		echo $respuesta;
	}

		/**
	 * Esta funcion sirve para controlar la imagen con la que se hara un registro de un cliente nuevo, ademas de entregarle los datos al modelo para que pueda realizar una consulta y reciba una respuesta.
	 * 
	 * @param $mail de tipo string, correo unico que servira para realizar login, usado por el usaurio recien registrado
	 * @param $pass de tipo string, contraseña del usuario que en combinacion con el email, el usuario podra realizar uan authentificacion
	 * @param $nombre de tipo string, nombre del usuario.
	 * @param $fono de tipo string, numero telefonico a que el usuario menciona que le pertenece para realizar un contacto.
	 * @param $fp de tipo string, ruta de la foto de perfil recien creada.
	 * @param $dir de tipo string, direccion proporcionada por el usuario.
	 * @param $tipo de tipos string, tipo de usuario que esta haciendo un registro, "cliente".
	 * 
	 * @var $extencion de tipo string, en esta variable se almacenara el tipo de extencion que utiliza la imagen.
	 * @var $ruta_imagen de tipo string, variable al que se le alamcenara la ruta final de la nueva foto de perfil.
	 * @var $filename de tipo string, nombre encriptado de la imagen que se compone de su nombre y su extencion.
	 * 
	 * @return $respuesta de tipo string, variable de respuesta que indica si la consulta se ejecuto correctamente, dada por el modelo.
	 * 
	 * */
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

	/**
	 * Esta funcion sirve para controlar la imagen con la que se hara un registro de un maestro nuevo, ademas de entregarle los datos al modelo para que pueda realizar una consulta y reciba una respuesta.
	 * 
	 * @param $mail de tipo string, correo unico que servira para realizar login, usado por el usaurio recien registrado.
	 * @param $pass de tipo string, contraseña del usuario que en combinacion con el email, el usuario podra realizar uan authentificacion.
	 * @param $nombre de tipo string, nombre del usuario.
	 * @param $fono de tipo string, numero telefonico a que el usuario menciona que le pertenece para realizar un contacto.
	 * @param $fp de tipo string, ruta de la foto de perfil recien creada.
	 * @param $dir de tipo string, direccion proporcionada por el usuario.
	 * @param $tipo de tipos string, tipo de usuario que esta haciendo un registro, "maestro".
	 * 
	 * @var $extencion de tipo string, en esta variable se almacenara el tipo de extencion que utiliza la imagen.
	 * @var $ruta_imagen de tipo string, variable al que se le alamcenara la ruta final de la nueva foto de perfil.
	 * @var $filename de tipo string, nombre encriptado de la imagen que se compone de su nombre y su extencion.
	 * 
	 * @return $respuesta de tipo string, variable de respuesta que indica si la consulta se ejecuto correctamente, dada por el modelo.
	 * */
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

	/**
	 * funcion que controla al llamada al modelo de usaurios, y la funcion de sancionar al usuario, de acuerdo al identificador de usuario
	 * 
	 * @param $id de tipo integer, identificador de usuario
	 * 
	 * @return $respuesta de tipo string, controla el mensaje de respuesta, proporcionada por el modelo.
	 * */
	public function sancionarUsuario($id){
		$respuesta = Usuarios::sancionarUsuario($id);
		echo ($respuesta);
	}
	/**
	 * funcion que controla al llamada al modelo de usaurios, y la funcion de levantar la sancion al usuario, de acuerdo al identificador de usuario
	 * 
	 * @param $id de tipo integer, identificador de usuario
	 * 
	 * @return $respuesta de tipo string, controla el mensaje de respuesta, proporcionada por el modelo.
	 * */
	public function quitarSancionUsuario($id){
		$respuesta = Usuarios::quitarSancionUsuario($id);
		echo ($respuesta);
	}
	/**
	 * Con esta funcion controla la respuesta que recibira la funcion de pago de paypal.
	 * 
	 * @param $id de tipo integer, identificador del usuario en nuestra pagina web.
	 * @param $idtran de tipo string, identificador que recibimos de la api de paypal que identifica el numero de transaccion.
	 * @param $idcliente de tipo string, identificador del usuario de paypal que realizo un pago a a la cuanta de la pagina.
	 * 
	 * @return $respuesta de tipo string, controla el mensaje de respuesta, proporcionada por el modelo.
	 * 
	 * */
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
