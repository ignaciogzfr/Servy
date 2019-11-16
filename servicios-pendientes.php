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

<body style="font-family: 'Noto Sans JP', sans-serif; background-color: #fafafa;">



    <!-- Sidebar -->
<?php require_once 'componentes/sidenav.php' ?>
    <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">
<?php require_once 'componentes/navbar.php' ?>

				<div class="container">
					<h1 class="text-center mt-2"> Mis servicios | pedidos</h1>
					<hr class="featurette-divider">
				</div>


				<div class="container">

					<div class="container mt-2"><!-- INICIO LISTA DE SERVICIOS-->
						<div class="list-group">

						  <a class="list-group-item list-group-item-action flex-column align-items-start mt-3">
						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-2 h5">Titulo</h5>
						      <small>tipo de servicio</small>
						      <small> fecha</small>
						    </div>
						    <p class="mb-2">DESCRIPCION: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat blanditiis sint mollitia quam veniam quod harum, sequi, animi, voluptatum impedit ex maxime cumque magni eius ipsam facere dolorum laudantium laborum.</p>
						    <small>confirmado por : <button class="btn btn-info btn-sm" data-target="#resumen-maestro-modal" data-toggle="modal" >usuario</button></small>
						  </a>

						 <a href="#!" class="list-group-item list-group-item-action flex-column align-items-start mt-3">
						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-2 h5">Titulo</h5>
						      <small>tipo de servicio</small>
						      <small> fecha</small>
						    </div>
						    <p class="mb-2">DESCRIPCION: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat blanditiis sint mollitia quam veniam quod harum, sequi, animi, voluptatum impedit ex maxime cumque magni eius ipsam facere dolorum laudantium laborum.</p>
						    <small>confirmado por: <button class="btn btn-sm btn-danger">pendiente</button></small>
						  </a>

						   <a href="#!" class="list-group-item list-group-item-action flex-column align-items-start mt-3">
						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-2 h5">Titulo</h5>
						      <small>tipo de servicio</small>
						      <small> fecha</small>
						    </div>
						    <p class="mb-2">DESCRIPCION: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat blanditiis sint mollitia quam veniam quod harum, sequi, animi, voluptatum impedit ex maxime cumque magni eius ipsam facere dolorum laudantium laborum.</p>
						    <small>Pedido por : Usuario</small>
						  </a>
				</div>
			</div><!-- FINLISTA DE SERVICIOS-->

				<div class="text-center mb-3"><button class="btn btn-primary"> ver mas</button></div>
</div>



    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->



<?php 	require_once 'componentes/footer.php';
 		require_once("componentes/links.php");
      	require_once("componentes/scripts.php");
  ?>







<script>
 $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
	
</body>
</html>