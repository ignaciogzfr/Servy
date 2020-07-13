<!DOCTYPE html>
<html lang="en">
<head>
	
<?php require_once("componentes/links.php");
      require_once("componentes/scripts.php");

  ?>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/logo.png" />
  <title>Servy 2</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

<?php require_once 'componentes/sidenav.php'; ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
<?php require_once 'componentes/navbar.php' ?>


				<div class="container">
					<h1 class="text-center mt-2"> Servicios a realizar</h1>
					<hr class="featurette-divider">
				</div>


<div class="container">
          
  

		


					<div class="container mt-2"><!-- INICIO LISTA DE SERVICIOS-->
						<div class="list-group">
              <div class="alert alert-info" role="alert">
  <strong>Información:</strong> Si ya realizó el servicio haga click en <strong>SOLUCIONADO</strong>
</div>
						 <?php
             require_once("modelos/modelo-publicaciones.php");
                  @session_start();
                        $publi = Publicaciones::getPublicaciones();
                       $publiinvitado = Publicaciones::getPublicacionesInvitado();
                  if(count($publi)== 0 && count($publiinvitado) == 0){

                      echo('<div class="alert alert-primary text-center" role="alert">
                                          En este momento no se han encontrado publicaciones.
                                  </div>');

                  }else{


                      for ($i=0; $i<count($publi); $i++){

                        if($publi[$i]['estado_publicacion']== 'Aceptada' && $publi[$i]['id_usuario_maestro'] == $_SESSION['id'] ){

                echo (' 
              
              <div class="list-group-item  flex-column align-items-start mt-3">

                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-2">'.$publi[$i]["titulo_publicacion"].'</h5>
                  <small>'.$publi[$i]["tipo_servicio"].'</small>
                  <small> '.$publi[$i]["fecha_hora_publicacion"].'</small>
                </div>

                <p class="mb-2">DESCRIPCION: '.$publi[$i]["detalle_publicacion"].'</p>

                <div class="d-flex w-100 justify-content-between">
                <small class="mt-4">Pedido por : '.$publi[$i]["nombre_usuario"].'</small>
                 <small class="mt-4">Tefono : '.$publi[$i]["fono_usuario"].'</small>
              <button class="btn btn-success" id="btn-servicio-solucionado" value="'.$publi[$i]["id_publicacion"].'">SOLUCIONADO</button>
                </div>
              </div>');

                      }else{
                                    echo('');

                      }


                        }
                        


                      
              for($i=0;$i<count($publiinvitado); $i++){


                  if($publiinvitado[$i]['estado_invitado']== 'Aceptada' && $publiinvitado[$i]['id_usuario_maestro'] == $_SESSION['id'] ){
                           echo (' 
              
              <div class="list-group-item  flex-column align-items-start mt-3 mb-3">

                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-2">'.$publiinvitado[$i]["titulo_invitado"].'</h5>
                  <small>'.$publiinvitado[$i]["tipo_servicio"].'</small>
                  <small> '.$publiinvitado[$i]["fecha_hora_invitado"].'</small>
                </div>

                <p class="mb-2">DESCRIPCION: '.$publiinvitado[$i]["detalle_invitado"].'</p>

                <div class="d-flex w-100 justify-content-between">
                <small class="mt-4">Pedido por : '.$publiinvitado[$i]["nombre_invitado"].'</small>
                <small class="mt-4">Telefono : '.$publiinvitado[$i]["fono_invitado"].'</small>

              <button class="btn btn-success" id="btn-servicio-solucionado-invitado" value="'.$publiinvitado[$i]["id_invitado"].'">SOLUCIONADO</button>
                </div>
              </div>');
                      }else{

                      echo ('');
                    }
                    
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




<!-- Footer -->
<?php require_once 'componentes/footer.php' ?>
<!-- Footer -->

	
</body>
</html>

