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
  <title>Panel de control</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body style="font-family: 'Noto Sans JP', sans-serif; background-color: #fafafa;">
    <!--  sidenav -->
<?php require_once 'componentes/sidenav-cliente.php' ?>
    <!-- fin sidenav -->

    
    
    <!-- navegador superior-->
  <?php require_once 'componentes/navbar.php' ?>
    <!-- fin navegador superior-->

        <!-- Page Content -->
        <div id="page-content-wrapper">
				<div class="container">
					<h1 class="text-center mt-2"> Panel de control</h1>
					<hr class="featurette-divider">
				</div>

      
      <div class="container text-center w-75">

        <div class="row">
          
            <div class="col">
              <h6>Usuario <p class="text-success">[Moderador]</p></h6>
               <img src="img/placeholder.png" width="150" class="rounded" />
            </div>
            <div class="col">
                <div class="btn-group-vertical">
                <button class="btn btn-md btn-primary"><i class="fas fa-edit"></i> Editar mi perfil</button>
                <button class="btn btn-md btn-primary">Buscar usuarios</button>
                <button class="btn btn-md btn-primary">Buscar publicaciones</button>
        
            </div>

            </div>

        </div>



      </div>
	           


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->




    <!-- Footer -->
    <?php require_once('componentes/footer.php'); ?>
    <!-- Footer -->


    <!--modal resumen maestro-->
    <?php require_once('componentes/modal-resumen-maestro'); ?>
    <!-- fin de modal resumen maestro-->
<script>
 $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
	
</body>
</html>