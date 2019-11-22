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
      
<?php require_once 'componentes/navbar.php'; ?>

<?php @session_start(); ?>
<?php require_once 'componentes/verificar-sesion.php' ?>

<div class="text-center my-5">
  <strong><h3>Crear Publicación</h3></strong>
</div>
<!-- INICIO DEL FORMULARIO -->
<div class="container my-4" style="width: 70%;">
     
  <form id="form-publicar-servicios" method="POST" autocomplete="off">
  <div class="form-row">
  <?php if($_SESSION['tipo']=='Maestro'){
    echo('  
        <div class="form-group col-md-6">
            <label for="titulo-publi">Titulo</label>
            <input type="text" class="form-control" name="titulo-publi" placeholder="Ofrezco mis Servicios... / Necesito urgentemente un --------" id="titulo-publi">
        </div>
        <div class="form-group col-md-6">
          <label for="tipo-publicacion-post">Tipo de Publicacion</label>
          <select name="tipo-publicacion" id="tipo-publicacion-post" class="form-control">
          <option value="Oferta">Ofrezco...</option>
          <option value="Demanda">Necesito...</option>
          </select>
        </div>'); 
  }else{
    echo('
      <div class="form-group col-md-12">
        <label for="titulo-publi">Titulo</label>
        <input type="text" class="form-control" name="titulo-publi" placeholder="Necesito urgentemente un --------">
      </div>');
  } ?>


  </div>

  <div class="form-group">
    <label for="dir-publi">Direccion</label>
    <button class="btn btn-secondary btn-sm">Geolocalizar</button>
    <input type="text" class="form-control" name="direccion-publi" placeholder="Avenida Siempreviva 2001" id="dir-publi">
  </div>


<hr class="featurette-divider">
  <div class="form-row">
   
    <div class="form-group col-md-12">
      <label for="select-tipo-servicio">Tipo de servicio</label>
          <select class="custom-select" id="select-tipo-servicio" name="tipo-serv" style="width: 100%">
            <option selected disabled="">Seleccionar servicio</option>
<?php 
require_once("modelos/modelo-servicios.php");
  $servi = Servicios::getServicios();

  for($i=0;$i<count($servi); $i++){
      echo('<option value="'.$servi[$i]["id_tipo_servicio"].'">'.$servi[$i]["tipo_servicio"].'</option>');
  }

?>  
</select>
    </div>
    
  </div>

 <div class="form-group">
  <label for="detalle-publi">Detalle</label>
  <?php if($_SESSION['tipo']=='Maestro'){
    echo ' <textarea class="form-control" placeholder="Agregue detalles de lo que necesita u ofrece" name="detalle-publi" rows="7" id="detalle-publi"></textarea>';}
    else{
    echo '<textarea class="form-control" placeholder="Agregue detalles de lo que necesita" name="detalle-publi" rows="7" id="detalle-publi"></textarea>';
    } ?>

</div>
   
    
 <?php
    echo ('<input type="hidden" placeholder="'.$_SESSION["id"].'" name="id-usuario" value="'.$_SESSION["id"].'">');   
?>
    <?php echo '<input type="hidden" value="'.$_SESSION['tipo'].'" id="tipo-usuario-post">' ?>
    <input type="hidden" name="op" value="publicarServicio">
    <button type="submit" class="btn btn-success float-right mb-5 btn-publicar-servicio" id="btn-publicar-servicio">Publicar problema</button>

</form>

</div>
   
<!-- FIN DEL FORMULARIO -->


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php require_once 'componentes/footer.php';?>




</body>

</html>
