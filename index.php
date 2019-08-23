<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Servy</title>

<?php require_once 'componentes/links.php' ?>
<?php require_once 'componentes/sidenav.php' ?>
</head>

<body style="font-family: 'Noto Sans JP', sans-serif; background-color: #fafafa;">


    <!-- Page Content -->
    <div id="page-content-wrapper">
      <?php require_once 'componentes/navbar.php' ?>
    <div class="container-fluid">

    <!-- Sidebar -->

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
<?php require_once 'componentes/footer.php' ?>
  </div>
  <!-- /#wrapper -->





<!-- Footer -->


<?php require_once 'componentes/login-modal.php' ?>

<?php require_once 'componentes/scripts.php' ?>




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
