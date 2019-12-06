<?php

require_once("../modelos/modelo-gruas.php");


class gestorGruas{


	/**
	 *Se utiliza para ingresar una peticion al servicios de gruas.
	 * 
	 * @param $nombre de tipo string, nombre del usuario que quiere realizar ua peticion.
	 * @param $direccion de tipo string, direccion proporcionada por el usuario que realizao la peticion.
	 * @param $fono de tipo string, numero telefonico que el usauroo afirma tener en posesesion.
	 * @param $descripcion de tipo string, descripcicon del accidente, porporcionada por el usuario que realizo la peticion.
	 * @param $tipo de tipo int, clave foranea que identifica un tipo de vehiculo con una peticiond e una grua.
	 * @param $lat de tipo string, altitud de la socrdenadas para la pai de google maps.
	 * @param $lng de tipos string, longitud de las cordenadas para la api de google maps.
	 * 
	 * @return $respuesta de tipos tring, tipo de respuesta suministrada por el modelo de gruas.
	 *
	 * */
	public function pedirGrua($nombre,$direccion,$fono,$descripcion,$tipo,$lat,$lng){
		$respuesta = Gruas::pedirGrua($nombre,$direccion,$fono,$descripcion,$tipo,$lat,$lng);
		echo($respuesta);
			}





}


$op= $_POST["op"];

	switch ($op) {
		case 'pedirGrua':
			$response = new  gestorGruas();
			$response-> pedirGrua($_POST["nombre"],$_POST["direccion"],$_POST["fono"],$_POST["descripcion"],$_POST["tipo-vehiculo"],$_POST["lat"],$_POST["lng"]);
			break;

		case '':
					
		break; 	

		default:
 		# code...
 		break;

 		}

  ?>