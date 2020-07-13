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
  <title>Todos los Servicios y Demandas</title>

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
					<h1 class="text-center mt-2">Servicios - Todos</h1>
					<hr class="featurette-divider">
				</div>


<div class="container" style="display: none">
  <form>
  		<div class="form-row text-center">

        <div class="form-group col-md-5" >
            <select class="custom-select">
              <option selected>Seleccionar Area de Servicio</option>
                <?php 
                require_once("modelos/modelo-servicios.php");
                  $servi = Servicios::getServicios();
                  for($i=0;$i<count($servi); $i++){
                      echo('<option>'.$servi[$i]["tipo_servicio"].'</option>');}
                ?>  
            </select>
        </div>
  				
  			<div class="form-group col-md-5">		
          		 <input type="date" class="form-control" id="" name="" placeholder="Buscar por Fecha">
       	 </div>

        <div class="form-group col-md-2 mb-3">
            <button class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Filtrar</button>
        </div>

  		</div>


  </form>
</div>	


					<div class="container mt-2 lista-publicaciones"><!-- INICIO LISTA DE SERVICIOS-->
						<div class="list-group">
              
 <?php
      /* existen 2 tipos de publicaciones oferta y demanda y a partir de este dato que se obitne a traves el metodo get se puede mostrar que tipo de publicacion desea el usuario */
     require_once("modelos/modelo-publicaciones.php");
  
     if(isset($_GET['tipo'])){
      if($_GET['tipo']=='Oferta' || $_GET['tipo']=='oferta'){
          $publi = Publicaciones::getPublicacionesOferta();
      }elseif($_GET['tipo']=='Demanda' || $_GET['tipo']=='demanda'){
          $publi = Publicaciones::getPublicacionesDemanda();
      }
      }else{
        if(isset($_GET['servicio']) && !isset($_GET['fecha_min'])){
          $publi = Publicaciones::getPublicacionesServicio();
        }elseif(isset($_GET['servicio'])&& isset($_GET['fecha_min'])){
          $publi = Publicaciones::getPublicacionesServicioFecha();
        }elseif(!isset($_GET['servicio'])&&isset($_GET['fecha_min'])){
          $publi = Publicaciones::getPublicacionesFecha();
        }
      }
      $publiinvitado = Publicaciones::getPublicacionesInvitado();
      //if(isset($publi))
          //caso que no existan publicaciones
            if(count($publi)==0){
                if($_GET['tipo'] == "Oferta"){
                  echo ('<h2 class="text-center mt-3">Ofertas de Servicios</h2>');
                }else{
                  echo ('<h2 class="text-center mt-3">Peticiones de usuarios</h2>');
                }
                      echo('<div class="alert alert-primary text-center" role="alert">En este momento no se han encontrado publicaciones, intente más tarde.</div>');
              }else{
                //carga de publicaciones
                if($_GET['tipo'] == "Oferta"){
                  echo ('<h2 class="text-center mt-3">Ofertas de Servicios</h2>');
                }else{
                  echo ('<h2 class="text-center mt-3">Peticiones de usuarios</h2>');
                }
                 for ($i=0; $i<count($publi); $i++){
                 echo (' 
                <a href="vista-publicacion.php?publicacion='.$publi[$i]['id_publicacion'].'" class="list-group-item list-group-item-action flex-column align-items-start mt-3">

                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-2">'.$publi[$i]["titulo_publicacion"].'</h5>
                    <small>'.$publi[$i]["tipo_servicio"].'</small>
                    <small> '.$publi[$i]["fecha_hora_publicacion"].'</small>
                    <input type="hidden" value="" id="id-resumen-maestro">
                  </div>

                  <p class="mb-2">DESCRIPCION: '.$publi[$i]["detalle_publicacion"].'</p>
                  <small>Pedido por : '.$publi[$i]["nombre_usuario"].'</small>
                </a>');
                  }      
              }
              //caso que no existan publicaciones de invitados
              if(count($publiinvitado) == 0){
                  echo ('<h2 class="text-center mt-3">Peticiones De invitados</h2>');
                  echo('<div class="alert alert-primary text-center" role="alert">los invitados no tienen publicaciones de momento, vuelva mas tarde.</div>');
                }else{
                  //carga publicaciones invitado
                   for($i=0;$i<count($publiinvitado); $i++){
                    echo ('<h2 class="text-center mt-3">Peticiones De invitados</h2>');
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
<?php require_once 'componentes/modal-resumen-maestro.php'; ?>
<!-- Footer -->

	
</body>
</html>


