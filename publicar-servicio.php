<!DOCTYPE html>
<html lang="en">

<head>

<?php
 @session_start();
      
echo('<script> "</script>');
if($_SESSION['estado'] == "Sancionado"){
echo('<script> location.href="perfil.php?id='.$_SESSION['id'].'"</script>');
}
 ?>

<?php require_once("componentes/links.php");
      require_once("componentes/scripts.php");
      require_once('componentes/verificar-no-admin.php');
  ?>



  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/logo.png" />
  <title>Publicar servicios</title>

</head>

<body>

    <!-- Page Content -->
    <div id="page-content-wrapper">
<div class="text-center my-5">
<h3 class="text-muted ">Crear una Publicacion</h3>
<code class="text-center">Cada campo aca es obligatorio, ya que son necesarios para que otros sepan lo que estan viendo.</code>
<br>
<code>Puede escribir manualmente la direccion en la cual se refiere esta publicacion.</code>
</div>



<!-- INICIO DEL FORMULARIO -->
<div class="container my-4" style="width: 70%;">
     
  <form id="form-publicar-servicios" method="POST" autocomplete="off">
  <div class="form-row">
    <?php if($_SESSION['tipo']=='Maestro'){
      echo '
    <div class="form-group col-md-6">
      <label for="titulopubli">Titulo</label>
      <input type="text" class="form-control" maxlength="50" name="titulo-publi" placeholder="Titulo" required pattern="[A-Za-z\s]{5,60}$">
    </div>    
    <div class="form-group col-md-6">
      <label for="titulopubli">Tipo de Publicacion</label>
      <select name="tipo-publicacion" class="form-control">
      <option value="Oferta" class="boton-tipo-ofrecer">Ofrezco...</option>
      <option value="Demanda" class="boton-tipo-necesitar">Necesito...</option></select>
    </div>';
    }else{
      echo '    
      <div class="form-group col-md-12">
      <label for="titulopubli">Titulo</label>
      <input type="text" class="form-control" minlength="5" maxlength="50" name="titulo-publi" placeholder="Titulo" required pattern="^\b(?!.*?\s{2})[A-Za-z ]{1,60}\b$">
      <input type="hidden" value="Demanda" name="tipo-publicacion">
    </div>';
    } ?>

  </div>
  <div class="form-group">
    <label for="dir">Direccion</label>

    <div id="floating-panel">
      <input id="latlng" type="text" hidden="" value="">
      <input id="submit" type="button" class="btn btn-secondary btn-sm" maxlength="500" value="obtener mi ubicación" required="">
    </div>
    <div type="hidden" id="map"></div>
       <input type="text" minlength="20"  class="form-control" maxlength="70" name="direccion-publi" placeholder="Obtenga su ubicacion presionando el boton de arriba" id="direccion-post" required="">
  </div>
<hr class="featurette-divider">
  <div class="form-row">
   
    <div class="form-group col-md-12">
      <label for="inputState">Tipo de servicio</label>
          <select class="custom-select" required="" id="select-tipo-servicio" name="tipo-serv" style="width: 100%" required="">
            <option selected disabled="">Seleccionar servicio</option>
<?php 
require_once("modelos/modelo-servicios.php");
if($_SESSION['tipo'] == 'Maestro'){
//caso maestro
  $servi = Servicios::getServiciosMaestro($_SESSION['id']);
  for($i=0;$i<count($servi); $i++){
      echo('      
           <option value="'.$servi[$i]["id_tipo_servicio"].'">'.$servi[$i]["tipo_servicio"].'</option>    
');
  }
}else{
//caso cliente
   $servi = Servicios::getServicios();
   for($i=0;$i<count($servi); $i++){
      echo('      
           <option value="'.$servi[$i]["id_tipo_servicio"].'">'.$servi[$i]["tipo_servicio"].'</option>    
');
  }
}
?>  
</select>
    </div>
    
  </div>

       <div class="form-group">
  <label for="">Detalle</label>
  <textarea class="form-control" placeholder="Describa brevemente su problema..." minlength="20" maxlength="1000" name="detalle-publi" rows="7" required=""></textarea>
</div>  
 <?php
          echo ('<input type="hidden" placeholder="'.$_SESSION["id"].'" name="id-usuario" value="'.$_SESSION["id"].'">');   
?>
    <?php echo '<input type="hidden" value="'.$_SESSION['tipo'].'" id="tipo-usuario-post">' ?>
    <input type="hidden" name="op" value="publicarServicio">
    <input type="hidden" name="lat" value="" id="lat-publicacion">
    <input type="hidden" name="lng" value="" id="lng-publicacion">
    <a href="perfil.php?id=<?php echo($_SESSION['id']); ?>" class="btn btn-md btn-secondary"><i class="fas fa-undo-alt"></i> Volver</a>
    <button type="submit" class="btn btn-success float-right mb-5 btn-publicar-servicio" id="btn-publicar-servicio">Publicar problema</button>



</form>

    
</div>
   
<!-- FIN DEL FORMULARIO -->


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7fk_KsJga2Jye7iDyCvC0qTapAidpEyM&callback=Miposicion">
    </script>

</body>

</html>
