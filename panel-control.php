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

  <title>Servy 2</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body style="font-family: 'Noto Sans JP', sans-serif; background-color: #fafafa;">

<?php require_once 'componentes/sidenav-cliente.php' ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

<?php require_once 'componentes/navbar.php' ?>

				<div class="container">
					<h1 class="text-center mt-2"> Panel de control</h1>
					<hr class="featurette-divider">
				</div>

      
      <div class="container text-center w-75">

        <div class="row">
          
  
            <div class="col">
                <div class="btn-group-vertical">
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
<footer class="page-footer mdb-color font-small lighten-1 text-white">

  <!-- Copyright -->
  <div class="row text-center">
    
  <div class="col col-md-4 my-2"><img src="img/placeholder.png" height="100" width="100"></div>
  <div class="col col-md-4 mt-2">OJO, Servy provee un servicio de atencion, la aplicacion no se hace responsable si los tecnicos no cumplen satisfactoriamente con el servicio requerido.</div>
  <div class="col col-md-4 mt-2">
    <div class="row">
    <a class="col col-md-12 my-1"href="#">Link1</a>
    <a class="col col-md-12 my-1"href="#">Link2</a>
    <a class="col col-md-12 my-1"href="#">Link3</a>
    </div>
  </div>

  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->



<div id="resumen-maestro-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header mdb-color">

                <h4 id="titulo-loginregistro " class="text-center text-white"> Usuario</h4>

                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>

            </div>

            <div class="modal-body mx-auto text-center ">
                   

                        <div class="row">
                           
                           <div class="col">
                             
                           <img src="img/placeholder.png" width="100" class="rounded" />

                           </div> 

                            <div class="col text-left">
                              Nombre: usuario
                              correo: usuario@usuario.com
                            </div>

                            <div class="col text-left">
                              Telefono: +569 123423424

                            </div>



                        </div>

                    <div class="mt-3"> <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" >Cerrar</button>
                     <button type="button" class="btn btn-sm btn-info" data-dismiss="modal" >ver detalles</button></div>
            </div>
        </div>
    </div>
</div>


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