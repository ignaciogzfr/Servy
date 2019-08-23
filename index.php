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

  <div class="d-flex" id="wrapper" tabindex="-1">

    <!-- Sidebar -->
    <div class="mdb-color  text-white border-right" id="sidebar-wrapper">


      <div class="sidebar-heading mdb-color">Menu</div>

      <div class="list-group list-group-flush text-white">

        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Iniciar Sesion <i class="fas fa-user-circle"></i></a>

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

     <button class="btn btn-warning" data-target="#pedir-grua-modal" data-toggle="modal"><i class="fas fa-wrench" style="font-size: 15px;"></i> <i class="fas fa-truck-pickup" style="font-size: 20px;"></i></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item mr-4">
              <a class="nav-link" href="#">Ayuda</a>
            </li>
            <li class="nav-item mr-4">
              <a class="nav-link" href="#">Servicios</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">iniciar sesion<i class="fas fa-user-circle"></i></a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        
  <div class="jumbotron text-center mt-3  mdb-color lighten-2 text-white">
  <h2 class="display-4">Bienvenido a Servy!</h2>
  <p class="lead">Servy es una aplicacion que provee servicios tecnicos a quienes lo necesiten.</p>
  <hr class="my-4">
  <p>Busca al Maestro que mas te tinque</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Empecemos!</a>
</div> 


      </div>


        <div class="container-fluid text-center mb-4"> <h3>¿Necesitas ayuda rapida?</h3> Puedes usarlo sin registrarte ;)<hr class="featurette-divider"></div>



<!-- INICIO DEL FORMULARIO -->
<div class="container my-4" style="width: 70%;">
  <form>
  <div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputEmail4">Tu Nombre</label>
      <input type="email" class="form-control"  placeholder="Nombre">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Fono de Contacto</label>
      <input type="text" class="form-control" placeholder="+569 11223344">
    </div>

  </div>

  <div class="form-group">
    <label for="inputAddress">Direccion</label>
    <input type="text" class="form-control"  placeholder="Avenida Siempreviva 2001">
  </div>


<hr class="featurette-divider">
  <div class="form-row">
   
    <div class="form-group col-md-12">
      <label for="inputState">Tipo de servicio</label>
      <select id="inputState" class="form-control">
        <option selected>Seleccionar...</option>
        <option>...</option>
      </select>
    </div>
    
  </div>

       <div class="form-group">
  <label for="exampleFormControlTextarea3">Detalle</label>
  <textarea class="form-control" placeholder="Describa brevemente su problema..." id="" rows="7"></textarea>
</div>
 
  <button type="button" class="btn btn-primary" id="btn-publicarProblema">Publicar Problema</button>
  <a class="btn btn-info" data-toggle="popover-hover"><i class="fas fa-question"></i></a>
</form>
</div>
    
<!-- FIN DEL FORMULARIO -->


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


<div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header mdb-color">

                <h3 id="titulo-loginregistro" class="text-white">Inicia sesion</h3>

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

            </div>

            <div class="modal-body">

                      <div class="container text-center">


                            <div class="form-group">
                            <input type="text" id="" class="form-control" placeholder="Correo">
                            </div>


                            <div class="form-group">
                            <input id="" class="form-control mt-3" placeholder="contraseña" type="password">
                            </div>
                            <button class="btn btn-success btn-md" type="submit">Iniciar</button>
                        <h5>No tienes cuenta?</h5>
                        <h6><a href="registro.html" target="_blank">Registrate!</a></h6>
                      </div>
                      
            </div>
        </div>
    </div>
</div>

<div id="pedir-grua-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header mdb-color">

                <h4 id="titulo-loginregistro " class="text-center text-white"> Pedir una grua</h4>

                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>

            </div>

            <div class="modal-body  text-center">
                      <h5 class="text-center"> direccion</h5>

                          <div class="container"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d53259.30717784582!2d-70.6576384!3d-33.4569472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2scl!4v1566338608491!5m2!1ses-419!2scl" width="400" height="350" frameborder="0" style="border:0" allowfullscreen></iframe></div>

                         <div class="row text-center">
                           
                            <div class="col pt-2">
                              <p> ¿Esta es su ubicacion actual?</p>
                            </div>
                            <div class="col"> <button class=" btn btn-sm btn-info"><i class="fas fa-globe-americas"></i> No, desubicao </button> </div>
                         </div>

                          <div class="form-group">
                         <input type="email" class="form-control"  placeholder="Nombre">
                          </div>
                                <div class="form-group">
                         <input type="email" class="form-control"  placeholder="Telefono">
                          </div>
                          <div class="form-group">
                         <textarea name="" class="form-control" id="" cols="30" rows="3" placeholder="Breve descripcion"></textarea>
                          </div>

                        
                            <select id="inputState" class="form-control">
                              <option selected>tipo de automovil...</option>
                              <option>...</option>
                            </select>
                             



                     <button type="button" class="btn btn-sm btn-secondary pt-2" data-dismiss="modal" >Enviar</button>
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
  $('[data-toggle="popover-hover"]').popover({
  html: true,
  trigger: 'hover',
  title: 'Informacion',
  placement: 'right',
  content: function () { return 'No te preocupes, la informacion puesta aqui no sera guardada o utilizada.'; }
});
  </script>


<script>
 $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>



  <script>
    
  $("#btn-enviarservicios").on("click", function(){


  toastr.info("Espere a que un Maestro acepte su solicitud, esto puede tardar, sea paciente.", "Gracias",{

  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "10000",
  "extendedTimeOut": "10000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"


  })


  });



  </script>

</body>

</html>
