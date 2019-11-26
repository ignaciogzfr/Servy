<!DOCTYPE html>
<html lang="en">
<head>
	


<?php require_once("componentes/links.php"); ?>





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
<?php require_once 'componentes/navbar.php';
      require_once("modelos/modelo-publicaciones.php"); ?>
<?php $publi = Publicaciones::verPublicacion($_GET['publicacion']); ?>

				<div class="container">
<?php if(count($publi)>0){echo '<h3 class="my-3 text-center">'.$publi[0]["titulo_publicacion"].'</h3>';}
      else{echo '<h3 class="alert alert-danger text-center my-3">Lo sentimos...</h3>';} ?> 
          <hr class="featurette-divider">
				</div>


  <div class="container text-center">
<?php 
if(count($publi)>0){

  echo('


      <div class="row">
        <div class="col">Pedido por: '.$publi[0]["nombre_usuario"].'</div>
        <div class="col">Tipo de servicio: '.$publi[0]["tipo_servicio"].' </div>
        <div class="col">Fecha y hora de Publicacion: '.$publi[0]["fecha_hora_publicacion"].'</div>

      </div>
  <hr class="featurette-divider">

      <p>'.$publi[0]["detalle_publicacion"].'</p>
      <p class="text-muted">Problema localizado en: '.$publi[0]["direccion_publicacion"].'</p>
   ');
  }else{
    echo '<p class="alert alert-info">Esta publicacion no se encuentra disponible, o no existe dentro de nuestra base de datos.</p>';
  }
            

         ?>

</div>
<?php if(isset($_SESSION['id'])){
  echo '<div class="text-right">
  <button class="btn btn-md btn-danger" data-toggle="modal" data-target="#modal-denuncias-p"><i class="fas fa-ban"></i> Denunciar esta publicacion</button>
</div>  
';
} ?>

       


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<!-- Footer -->
<?php 
require_once 'componentes/modal-denuncias-publicacion.php';
require_once 'componentes/footer.php';
require_once 'componentes/scripts.php'; ?>
<!-- Footer -->


	
</body>
</html>