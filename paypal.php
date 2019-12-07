<!DOCTYPE html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>

<body style="background-color: #7f7f7f;">
  
<?php require_once('componentes/links.php');
    require_once('componentes/scripts.php'); ?>


   <div class="jumbotron text-center mt-4 lue-grey lighten-5 mx-2 mb-5">



  <!-- Title -->
  <h2 class="card-title h2">Estas suscribiendote a nuestra pagina!</h2>

  <!-- Subtitle -->
  <p class="my-4 h6">La suscripcion cuesta $2.00 dolares americanos al mes.</p>

  <!-- Grid row -->
  <div class="row d-flex justify-content-center">

    <!-- Grid column -->
    <div class="col-xl-7 pb-2">

      <p class="card-text">¿Qué consigo haciendo esto? Tienes el beneficio de que tus publicaciones mensuales sean vistas con prioridad, esto ayuda a que los maestros o clientes puedan ver tus necesidades de manera mas inmediata y llamativa. </p>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="my-4 rgba-white-light">

  <div class="pt-2">
<form action="modelos/modelo-login.php" method="POST" id="form-editar-sesion">
<?php echo '<input type="hidden" name="id" value="'.$_GET['id'].'">'; ?>
</form>
    <?php $id= $_GET['id'];
    echo ('


      <input type="hidden" id="id-usuario"  value="'.$id.'">
      <div id="paypal-button-container" class="container"></div>

      ');
 

 ?>
 
  </div>
 


  





</body>