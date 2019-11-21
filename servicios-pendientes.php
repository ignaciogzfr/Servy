<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'componentes/links.php'; ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/logo.png" />
  <title>Mis servicios pendientes</title>
</head>

<body>
<?php require_once 'componentes/verificar-sesion.php'; ?>
<?php require_once 'componentes/sidenav.php'; ?>
<!--Contenido de la pagina -->
    <div id="page-content-wrapper">

<?php require_once 'componentes/navbar.php'; ?>

		<div class="container">
		<?php if($_SESSION['tipo']=='Maestro'){
			echo '<h1 class="text-center mt-2"> Mis Servicios | Pedidos</h1>';
		}else{
			echo '<h1 class="text-center mt-2"> Mis Publicaciones';
		} ?>
							
			<hr class="featurette-divider">
		</div>


<div class="container">

	<div class="container mt-2"><!-- INICIO LISTA DE SERVICIOS-->
		<div class="list-group">

		<?php 
		
		require_once 'modelos/modelo-usuarios.php';
		require_once 'modelos/modelo-publicaciones.php';
		if(isset($_GET['tipo']) && $_GET['tipo']=='Oferta'){
		$publi = Usuarios::getMisPublicacionesOferta($_SESSION['id']);	
		}else{
		$publi = Usuarios::getMisPublicacionesDemanda($_SESSION['id']);

		if(count($publi)>0){

			for($i=0;$i<count($publi);$i++){

			$denuncias = Publicaciones::getDenunciasPublicacion($publi[$i]['id_publicacion']);
			echo '<script>console.log("Publicacion numero "+'.$publi[$i]['id_publicacion'].'+" && Denuncias "+'.count($denuncias).')</script>';
			if(count($denuncias)>0){
			echo (' <a class="list-group-item list-group-item-action flex-column align-items-start mt-3">

							    <div class="d-flex w-100 justify-content-between">
							      <h5 class="mb-2 h5">'.$publi[$i]["titulo_publicacion"].'</h5>
							      <small>'.$publi[$i]["tipo_servicio"].'</small>
							      <small>'.$publi[$i]["fecha_hora_publicacion"].'</small>
							    </div>
							    <p class="mb-2">'.$publi[$i]["detalle_publicacion"].'</p>
							    <small>Ofertas: <button class="btn btn-info btn-sm" data-target="#resumen-maestro-modal" data-toggle="modal">0</button></small>
							    <div><small>'.count($denuncias).'</small></div>

							  </a>');		
			}else{
			echo (' <a class="list-group-item list-group-item-action flex-column align-items-start mt-3">

							    <div class="d-flex w-100 justify-content-between">
							      <h5 class="mb-2 h5">'.$publi[$i]["titulo_publicacion"].'</h5>
							      <small>'.$publi[$i]["tipo_servicio"].'</small>
							      <small>'.$publi[$i]["fecha_hora_publicacion"].'</small>
							    </div>
							    <p class="mb-2">'.$publi[$i]["detalle_publicacion"].'</p>
							    
							    <small>Ofertas:<button class="btn btn-info btn-sm" data-target="#resumen-maestro-modal" data-toggle="modal">0</button></small>
							    <div><small>Espacio Denuncias</small></div>
							    

							  </a>');				
			}


		}

		echo ('<div class="text-center mb-3"><button class="btn btn-primary"> ver mas</button></div>');

		}else{

			echo ('<h6 class=" text-center alert-success w-100 py-2">No tiene servicios pendientes.</h6>');
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



<?php require_once 'componentes/footer.php'; ?>

<?php require_once'componentes/scripts.php' ?>

<?php require_once  'componentes/modal-resumen-maestro.php' ?>



</body>
</html>
