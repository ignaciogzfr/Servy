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

<body style="font-family: 'Noto Sans JP', sans-serif; background-color: #fafafa;">

<?php require_once 'componentes/sidenav-cliente.php'; ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
      
<?php require_once 'componentes/navbar.php'; ?>

<?php @session_start(); ?>


<!-- INICIO DEL FORMULARIO -->
<div class="container my-4" style="width: 70%;">
     
  <form id="form-publicar-servicios" method="POST" autocomplete="off">
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
                <select class="custom-select" id="select-tipo-servicio" name="tipo-serv">
            <option selected disabled="">seleccionar servicio</option>
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
  <textarea class="form-control" placeholder="Describa brevemente su problema..." id="" name="detalle-publi" rows="7"></textarea>
</div>
   
    
 <?php
 
   

          echo ('<input type="hidden" placeholder="'.$_GET["id"].'" name="id-usuario" value="'.$_GET["id"].'">');
       
?>
    <input type="hidden" name="op" value="publicarServicio">
    <input type="hidden" name="tipo-publicacion" value="1">
    <button type="submit" class="btn btn-success float-right mb-5 btn-publicar-servicio" id="btn-publicar-servicio">Publicar problema</button>

</form>

</div>
   
<!-- FIN DEL FORMULARIO -->


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php require_once 'componentes/footer.php';
   ?>




</body>

</html>
