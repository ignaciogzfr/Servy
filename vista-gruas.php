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
  <title>Gruas</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

<?php require_once 'componentes/sidenav.php' ?>
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

						  <a data-target="#map-modal" data-toggle="modal" class="list-group-item list-group-item-action flex-column align-items-start mt-3">
						    <div class="d-flex w-100 justify-content-between">
						      <h5 class="mb-2 h5">Titulo</h5>
						      <small>tipo de servicio</small>
						      <small> fecha</small>
						    </div>
						    <p class="mb-2">DESCRIPCION: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat blanditiis sint mollitia quam veniam quod harum, sequi, animi, voluptatum impedit ex maxime cumque magni eius ipsam facere dolorum laudantium laborum.</p>
						    <small>Pedido por : Usuario</small>
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


<script>
 $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
	
</body>
</html>