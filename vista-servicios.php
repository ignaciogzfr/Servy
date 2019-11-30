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
  <title>Servicios</title>

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
            <option selected>Seleccionar Area de Servicio</option>
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
        		 <input type="date" class="form-control" id="" name="" placeholder="Buscar por Fecha">
     	 </div>


       	<div class="col col-sm">
         		<div class="form-inline">
 				 <i class="fas fa-search" aria-hidden="true"></i>
  					<input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="buscar">
				</div>
		</div>
	</div>	


					<div class="container mt-2"><!-- INICIO LISTA DE SERVICIOS-->
						<div class="list-group">
              
						 <?php
              /* existen 2 tipos de publicaciones oferta y demanda y a partir de este dato que se obitne a traves el metodo get se puede mostrar que tipo de publicacion desea el usuario */
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
              /*en caso de que no existan publicaciones se creara un recuadro que alerte al usuario la inexistencia de publicaciones*/
                  if(count($publi)==0){

                      echo('<div class="alert alert-primary" role="alert">
                                          No hay publicaciones 
                                  </div>');

                  }else{
                  /*si la variable contiene datos se carga cada uno de la matriz recien asignada*/
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




<!-- Footer -->
<?php require_once 'componentes/footer.php' ?>
<!-- Footer -->

	
</body>
</html>


