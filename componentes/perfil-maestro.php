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

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="mdb-color  text-white border-right" id="sidebar-wrapper">
      <div class="sidebar-heading mdb-color">Menu</div>
      <div class="list-group list-group-flush text-white">
        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-1 text-white"> <img src="img/placeholder.png" width="30" class="rounded-circle" /> usuario</a>
        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Servicios</a>
        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Informacion</a>
        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Contactanos</a>
        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-2 text-white ">Cerrar sesion <i class="fas fa-power-off"></i></a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

     <nav class="navbar navbar-expand-lg navbar-dark main-color border-bottom">
        <button class="btn btn-primary" id="menu-toggle" ><i class="fas fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item mr-4">
              <a class="nav-link" href="#">Ayuda</a>
            </li>
            <li class="nav-item mr-4">
              <a class="nav-link" href="#">Servicios</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Cerrar sesion<i class="fas fa-user-circle"></i></a>
            </li>
          </ul>
        </div>
      </nav>

				<div class="container">
					<h1 class="text-center mt-2"> Perfil</h1>
					<hr class="featurette-divider">
				</div>

      
      <div class="container  w-75">

        <div class="row">
          
            <div class="col">
               <img src="img/placeholder.png" width="150" class="rounded" />
            </div>
            <div class="col">
            <p>Nombre:</p>
            <p class="pt-2">Email:</p>
            <p class="pt-2">Telefono:</p>
            <p class="pt-2">Direccion:</p>

            </div>
            <div class="col">
              <input type="text" class="form-control mb-2" placeholder="usuario" disabled>
              <input type="text" class="form-control mb-2" placeholder="correo@correo" disabled>
              <input type="text" class="form-control mb-2" placeholder="+56912345678" disabled>
              <input type="text" class="form-control mb-2" placeholder="Direccion 123" disabled>

            </div>

        </div>

        <p>Experiencias:</p>
            <textarea class="form-control" disabled rows="3"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, exercitationem dolores officia aut cumque, consequatur voluptatem accusantium debitis qui deserunt, natus deleniti nobis quis sapiente laudantium minus mollitia soluta harum.</textarea>

            <p class="pt-2">Certificados:</p>

            <div class="row">
              
              <div class="col">
                <input type="text" class="form-control mb-2" placeholder="certificado 1" disabled>
              </div>
              <div class="col">
                <input type="text" class="form-control mb-2" placeholder="certificado 2" disabled>
              </div>
            </div>

            <div class="container text-right pb-4"><button class="btn btn-md btn-primary"><i class="fas fa-edit"></i> Editar</button></div>

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