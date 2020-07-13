<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/logo.png" />
  <title>Gruas</title>

<style> #map{
        height: 400px;
        width: 350px;
      }

    </style>

</head>

<body>

<?php 
require_once'componentes/scripts.php';
require_once'componentes/links.php';
 ?>
    <div id="page-content-wrapper">
				<div class="container">
					<h1 class="text-center mt-2"> Servicios - Gruas</h1>
					<hr class="featurette-divider">
				</div>
<div class="container">
					<div class="container mt-2"><!-- INICIO LISTA DE SERVICIOS-->
						<div class="list-group">
						<?php require_once'modelos/modelo-gruas.php';
								$grua = Gruas::getGruas();
										if (count($grua)== 0) {
										echo'<div class="container"><h6 class=" text-center alert-success w-100 py-2">aun no hay peticiones de gruas</h6></div>';
										}else{	
												for($i=0;$i<count($grua);$i++){

				echo(' <a id="" target="_blank"  href="ver-ruta-grua.php?lat='.$grua[$i]["lat_grua"].'&lng='.$grua[$i]["lng_grua"].'" class="list-group-item list-group-item-action flex-column align-items-start mt-3">


					 <input id="latlng" type="text" hidden="" value="">
					 <input type="hidden" name="lat" value="'.$grua[$i]["lat_grua"].'" id="lat-publicacion">
   					 <input type="hidden" name="lng" value="'.$grua[$i]["lng_grua"].'" id="lng-publicacion">


						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-2 h5">'.$grua[$i]["direccion_grua"].'</h5>
						      <small>'.$grua[$i]["tipo_vehiculo"].'</small>
						      <small> '.$grua[$i]["fecha_grua"].'</small>
						    </div>
						    <p class="mb-2">'.$grua[$i]["detalle_grua"].'</p>
						    <small>'.$grua[$i]["nombre_usuario_grua"].'</small>
						  </a>');
								}
}

					
						 ?>

						 
				</div>
			</div><!-- FINLISTA DE SERVICIOS-->
</div>


	


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->




<?php require_once 'componentes/footer.php' ?>






			
	
</body>
</html>
