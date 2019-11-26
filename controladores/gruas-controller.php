<?php

require_once("../modelos/modelo-gruas.php");


class gestorGruas{



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