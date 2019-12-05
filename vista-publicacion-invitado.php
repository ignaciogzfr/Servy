<!DOCTYPE html>
<html lang="en">
<head>
	


<?php require_once("componentes/links.php");
      require_once("componentes/scripts.php"); ?>





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

<body>
<style> 
    </style>
<?php require_once 'componentes/sidenav.php'; ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
<?php require_once 'componentes/ver-ruta-modal.php';

       ?>
				<div class="container">
					<h1 class="text-center mt-2"> Ver publicacion</h1>

       
        

          
					<hr class="featurette-divider">
				</div>



        <?php 
            require_once("modelos/modelo-publicaciones.php");

            $publi = publicaciones::verPublicacionInvitado($_GET["publicacion"]);


              echo('
  <div class="container text-center">

      <div class="row">
        <div class="col">Pedido por: '.$publi[0]["nombre_invitado"].'</div>
        <div class="col">Tipo servicio: '.$publi[0]["tipo_servicio"].' </div>
        <div class"col">Telefono: '.$publi[0]["fono_invitado"].'</div>
        <div class="col">'.$publi[0]["fecha_hora_invitado"].'</div>

      </div>
  <hr class="featurette-divider">
          <h3>'.$publi[0]["titulo_invitado"].'</h3>
      <p>'.$publi[0]["detalle_invitado"].'</p>
          <p>'.$publi[0]["direccion_invitado"].'
          </p>


          <hr class="featurette-divider">
    
         
                         <button class="btn btn-success mt-3" id="btn-aceptar-publicacion-invitado" value="'.$_SESSION['id'].'">Aceptar publicacion</button>
                         <input  id="id-publicacion" type="hidden" value="'.$_GET["publicacion"].'">
   </div>
   ');
            

         ?>




 
  
     
  
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<!-- Footer -->

<!-- Footer -->


	
</body>
</html>