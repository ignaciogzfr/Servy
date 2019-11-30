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

  <title>Servy 2</title>

</head>

<body>

<?php require_once 'componentes/sidenav.php'; ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
      


<?php @session_start(); ?>


<!-- INICIO DEL FORMULARIO -->
<div class="container my-4" style="width: 70%;">
     
  <form id="form-publicar-servicios" method="POST" autocomplete="off">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="titulopubli">Titulo</label>
      <input type="text" class="form-control" name="titulo-publi" placeholder="Titulo">
  </div>

  </div>

  <div class="form-group">
    <label for="dir">Direccion</label>

    <div id="floating-panel">
      <input id="latlng" type="text" hidden="" value="">
      <input id="submit" type="button" class="btn btn-secondary btn-sm" value="obtener mi ubicación">
    </div>
    
    <div type="hidden" id="map"></div>
          


       <input type="text" class="form-control" name="direccion-publi" placeholder="Avenida Siempreviva 2001" id="direccion-post" required="">
  </div>
    

<hr class="featurette-divider">
  <div class="form-row">
   
    <div class="form-group col-md-12">
      <label for="inputState">Tipo de servicio</label>
          <select class="custom-select" id="select-tipo-servicio" name="tipo-serv" style="width: 100%">
            <option selected disabled="">Seleccionar servicio</option>
<?php 
require_once("modelos/modelo-servicios.php");
  $servi = Servicios::getServicios();

  for($i=0;$i<count($servi); $i++){

      echo('
           
           <option value="'.$servi[$i]["id_tipo_servicio"].'">'.$servi[$i]["tipo_servicio"].'</option>
         
        
');

  }

?>  
</select>
    </div>
    
  </div>

       <div class="form-group">
  <label for="">Detalle</label>
  <textarea class="form-control" placeholder="Describa brevemente su problema..." id="" name="detalle-publi" rows="7" required=""></textarea>
</div>
   
    
 <?php
          echo ('<input type="hidden" placeholder="'.$_SESSION["id"].'" name="id-usuario" value="'.$_SESSION["id"].'">');   
?>
    <?php echo '<input type="hidden" value="'.$_SESSION['tipo'].'" id="tipo-usuario-post">' ?>
    <input type="hidden" name="op" value="publicarServicio">
    <input type="hidden" name="tipo-publicacion" id="tipo-publicacion-post" value="">
    <input type="hidden" name="lat" value="" id="lat-publicacion">
    <input type="hidden" name="lng" value="" id="lng-publicacion">
    <button type="submit" class="btn btn-success float-right mb-5 btn-publicar-servicio" id="btn-publicar-servicio">Publicar problema</button>



</form>

    
</div>
   
<!-- FIN DEL FORMULARIO -->


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php require_once 'componentes/footer.php';?>


<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7fk_KsJga2Jye7iDyCvC0qTapAidpEyM&callback=Miposicion">
    </script>

</body>

</html>
