<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/logo.png" />
  <title>Gruas</title>



</head>

<body>

<?php require_once 'componentes/sidenav.php';
require_once'componentes/scripts.php';
require_once'componentes/links.php'; ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

<?php require_once 'componentes/navbar.php' ?>

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
										echo'<div class="container"><h6 class=" text-center alert-success w-100 py-2">Esta publicacion no contiene denuncias :)</h6></div>';
										}else{			for($i=0;$i<count($grua);$i++){

				echo(' <a data-target="#map-modal" data-toggle="modal" class="list-group-item list-group-item-action flex-column align-items-start mt-3">
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


				<div class="text-center mb-3"><button class="btn btn-primary"> ver mas</button></div>
</div>


	


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->




<?php require_once 'componentes/footer.php' ?>



<div id="map-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header mdb-color">

                <h4 id="titulo-loginregistro " class="text-center text-white"> Usuario</h4>

                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>

            </div>

            <div class="modal-body mx-auto text-center">
                      <h5 class="text-center"> direccion</h5>

                          <div class="container"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d53259.30717784582!2d-70.6576384!3d-33.4569472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2scl!4v1566338608491!5m2!1ses-419!2scl" width="400" height="350" frameborder="0" style="border:0" allowfullscreen></iframe></div>

                     <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" >Cerrar</button>
            </div>
        </div>
    </div>
</div>


			
	
</body>
</html>
