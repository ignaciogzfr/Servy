<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Servy</title>

<?php require_once 'componentes/links.php'; ?>
<?php require_once 'componentes/sidenav.php'; ?>
<?php require_once 'modelos/modelo-servicios.php'; ?>
</head>

<body>


    <!-- Page Content -->
    <div id="page-content-wrapper">
    <?php require_once 'componentes/navbar.php' ?>

      <div class="container-fluid">

  <div class="jumbotron text-center mt-3  mdb-color lighten-2 text-white">
  <h2 class="display-4">Bienvenido a Servy!</h2>
  <p class="lead">Servy es una aplicacion que provee servicios tecnicos a quienes lo necesiten.</p>
  <hr class="my-4">
  <p>Busca al Maestro que mas te tinque</p>
  <a class="btn btn-primary btn-lg" href="registro.php" role="button">Empecemos!</a>
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
      <label for="servicio-index">Tipo de servicio</label>
      <select id="servicio-index" class="form-control" name="tipo-servicio" style="width: 100%">
        <option selected disabled>Seleccionar tipo de Servicio</option>
        <?php $servicios = Servicios::getServicios();
        for($i = 0; $i<count($servicios); $i++){
          echo '<option value="'.$servicios[$i]['id_tipo_servicio'].'">'.$servicios[$i]['tipo_servicio'].'</option>';
        } ?>
      </select>
    </div>
    
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea3">Detalle</label>
    <textarea class="form-control" placeholder="Describa brevemente su problema..." id="" rows="7"></textarea>
  </div>
 
  <button type="button" class="btn btn-primary" id="btn-publicarProblema">Publicar Problema</button>
  <button type="button" class="btn btn-info" ><i class="fas fa-question"></i></button>

</form>
</div>
    
<!-- FIN DEL FORMULARIO -->
               <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7fk_KsJga2Jye7iDyCvC0qTapAidpEyM&callback=Miposicion">
    </script>

    </div>
    <!-- /#page-content-wrapper -->
  </div>

  <!-- /#wrapper -->





<!-- Footer -->


<?php require_once 'componentes/login-modal.php' ?>
<?php require_once 'componentes/modal-pedir-grua.php' ?>

</body>
<?php require_once 'componentes/footer.php' ?>

<?php require_once 'componentes/scripts.php' ?>

</html>
