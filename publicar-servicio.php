<!DOCTYPE html>
<html lang="en">

<head>


  <?php require_once 'componentes/links.php'; ?>



  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/logo.png" />
  <title>Publicar servicios</title>

</head>

<body style="font-family: 'Noto Sans JP', sans-serif; background-color: #fafafa;">
   
<?php require_once 'componentes/sidenav.php'; ?>
    <!-- Page Content -->
  
      <div id="page-content-wrapper"> 
<?php require_once 'componentes/navbar.php'; ?>




<!-- INICIO DEL FORMULARIO -->
<div class="container my-4" style="width: 70%;">
  <form id="form-publicar-servicio" method="POST" autocomplete="off">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="titulopubli"> Titulo</label>
      <input type="text" class="form-control" name="titulo-publi" placeholder="Titulo">
    </div>

  </div>

  <div class="form-group">
    <label for="dir">Direccion</label>
    <button class="btn btn-secondary btn-sm">Geolocalizar</button>
    <input type="text" class="form-control" name="direccion-publi" placeholder="Avenida Siempreviva 2001">
  </div>


<hr class="featurette-divider">
  <div class="form-row">
   
    <div class="form-group col-md-12">
      <label for="inputState">Tipo de servicio</label>
                <select class="custom-select">
            <option selected>seleccionar servicio</option>
<?php 
require_once("modelos/modelo-servicios.php");
  $servi = Servicios::getServicios();

  for($i=0;$i<count($servi); $i++){

      echo('
           
           <option name="tipo-serv" value="'.$servi[$i]["id_tipo_servicio"].'">'.$servi[$i]["tipo_servicio"].'</option>
         
        
');

  }

?>  
</select>
    </div>
    
  </div>

       <div class="form-group">
  <label for="">Detalle</label>
  <textarea class="form-control" placeholder="Describa brevemente su problema..." id="" name="detalle-publi" rows="7"></textarea>
</div>
    <input type="hidden" name="op" value="publicarServicio">
    <input type="hidden" name="id-usuario" value="1">
    <input type="hidden" name="tipo-publicacion" value="1">
    <button type="submit" class="btn btn-success float-right mb-5 btn-publicar-servicio" id="btn-publicar-servicio">Publicar problema</button>

</form>
</div>
    
<!-- FIN DEL FORMULARIO -->


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php require_once 'componentes/footer.php'; ?>


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
