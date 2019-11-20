<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Servy 2</title>

</head>

<body style="font-family: 'Noto Sans JP', sans-serif; background-color: #fafafa;">
  <?php require_once 'componentes/links.php'; ?>

<div id="page-content-wrapper">

<?php require_once 'componentes/navbar.php'; ?>

<div class="container text-center">
  <h1 class="text-center mt-2"> Perfil </h1>

  <hr class="featurette-divider">
</div>
<?php
require_once 'modelos/modelo-usuarios.php';
$id = $_GET['id'];
$perfil = Usuarios::getPerfilUsuario($id);
if(isset($perfil[0])){

    if($perfil[0]['tipo_usuario']=='Cliente'){
      require_once 'componentes/perfil-cliente.php';
      require_once 'componentes/sidenav-cliente.php';
    }elseif($perfil[0]['tipo_usuario']=='Maestro'){
      require_once 'componentes/perfil-maestro.php';
      require_once 'componentes/sidenav-cliente.php';
    }elseif ($perfil[0]['tipo_usuario']=='Administrador') {
     require_once 'componentes/perfil-admin.php';
    }
    
}
elseif(!isset($perfil[0])){
  echo '<h1 class="alert alert-danger offset-3 col-md-6 text-center">Esta cuenta no existe..</h1>';
}
?>

</div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->




<?php require_once 'componentes/footer.php'; ?>
<?php require_once 'componentes/scripts.php' ?>
</body>
</html>