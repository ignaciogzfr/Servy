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
					<h1 class="text-center mt-2"> Servicios - todos</h1>
					<hr class="featurette-divider">
				</div>


<div class="container">
          
  

		<div class="row text-center">

      <div class="col col-sm" >
          <select class="custom-select">
            <option selected disabled="">seleccionar servicio</option>
<?php 
require_once("modelos/modelo-servicios.php");
  $servi = Servicios::getServicios();

  for($i=0;$i<count($servi); $i++){

      echo('
           
           <option>'.$servi[$i]["tipo_servicio"].'</option>
         
        
');

  }

?>  
</select>
        </div>
				
			<div class="col col-sm">		
        		 <input type="date" class="form-control" id="" name="">
         	 </div>
	</div>	


					<div class="container mt-2"><!-- INICIO LISTA DE SERVICIOS-->
						<div class="list-group">
              
						 <?php
             require_once("modelos/modelo-publicaciones.php");
             if(isset($_GET['tipo'])){
              if($_GET['tipo']=='oferta'){
                  $publi = Publicaciones::getPublicacionesOferta();
              }elseif($_GET['tipo']=='demanda'){
                  $publi = Publicaciones::getPublicacionesDemanda();
              }
              }else{
                  $publi = Publicaciones::getPublicaciones();
              }

                       $publiinvitado = Publicaciones::getPublicacionesInvitado();
                  if(count($publi)==0 && count($publiinvitado) == 0){

                      echo('<div class="alert alert-primary text-center" role="alert">
                                          En este momento no se han encontrado publicaciones, intente más tarde.
                                  </div>');

                  }else{

                      for ($i=0; $i<count($publi); $i++){

                        echo (' 
              
              <a href="vista-publicacion.php?publicacion='.$publi[$i]['id_publicacion'].'" class="list-group-item list-group-item-action flex-column align-items-start mt-3">

                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-2">'.$publi[$i]["titulo_publicacion"].'</h5>
                  <small>'.$publi[$i]["tipo_servicio"].'</small>
                  <small> '.$publi[$i]["fecha_hora_publicacion"].'</small>
                </div>

                <p class="mb-2">DESCRIPCION: '.$publi[$i]["detalle_publicacion"].'</p>
                <small>Pedido por : '.$publi[$i]["nombre_usuario"].'</small>
              </a>');


                      }



                      for($i=0;$i<count($publiinvitado); $i++){
                           echo (' 
              
              <a href="vista-publicacion-invitado.php?publicacion='.$publiinvitado[$i]['id_invitado'].'" class="list-group-item list-group-item-action flex-column align-items-start mt-3 mb-3">

                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-2">'.$publiinvitado[$i]["titulo_invitado"].'</h5>
                  <small>'.$publiinvitado[$i]["tipo_servicio"].'</small>
                  <small> '.$publiinvitado[$i]["fecha_hora_invitado"].'</small>
                </div>

                <p class="mb-2">DESCRIPCION: '.$publiinvitado[$i]["detalle_invitado"].'</p>
                <small>Pedido por : '.$publiinvitado[$i]["nombre_invitado"].'</small>
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




<!-- Footer -->
<?php require_once 'componentes/footer.php' ?>
<!-- Footer -->

	
</body>
</html>


