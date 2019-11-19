<!DOCTYPE html>
<html lang="en">
<head>
	

<?php require_once 'componentes/links.php'; ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Servy</title>


</head>

<body style="font-family: 'Noto Sans JP', sans-serif; background-color: #fafafa;">

<?php require_once 'componentes/sidenav.php' ?>


    <!-- Page Content -->
    <div id="page-content-wrapper">

<?php require_once 'componentes/navbar.php'; ?>

<div class="container">
					<h1 class="text-center mt-2"> Mis servicios | Pedidos</h1>
					<hr class="featurette-divider">
</div>
<div class="container">

		

<div class="container mt-2"><!-- INICIO LISTA DE SERVICIOS-->
	<div class="list-group">

						<?php 
	
	require_once 'modelos/modelo-usuarios.php';

	$publi = Usuarios::getMisPublicaciones($_SESSION['id']);

	for($i=0;$i<count($publi);$i++){



		echo ('  <a class="list-group-item list-group-item-action flex-column align-items-start mt-3">
						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-2 h5">'.$publi[$i]["titulo_publicacion"].'</h5>
						      <small>'.$publi[$i]["tipo_servicio"].'</small>
						      <small>'.$publi[$i]["fecha_hora_publicacion"].'</small>
						    </div>
						    <p class="mb-2">'.$publi[$i]["detalle_publicacion"].'</p>
						    <small>confirmado por : <button class="btn btn-info btn-sm" data-target="#resumen-maestro-modal" data-toggle="modal" >usuario</button></small>
						  </a>');
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



<?php require_once 'componentes/footer.php'; ?>

<?php require_once'componentes/scripts.php' ?>

<?php require_once  'componentes/modal-resumen-maestro.php' ?>



</body>
</html>