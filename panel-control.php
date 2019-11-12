<!DOCTYPE html>
<html lang="en">
<head>
	


 <link rel="stylesheet" href="styles/styles.css">
<!-- Gooogle Fonts API-->
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet"> 
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.3/css/mdb.min.css" rel="stylesheet">


<!-- Toastr Alerts CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">




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


<!-- Menu Toggle Script -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.3/js/mdb.min.js"></script>
<!-- Toastr Alerts JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
 $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
	
</body>
</html>