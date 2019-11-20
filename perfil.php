<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Servy 2</title>

</head>

<body>
  <?php require_once 'componentes/links.php'; ?>
  <?php require_once 'componentes/sidenav.php'; ?>
<div id="page-content-wrapper">

<?php require_once 'componentes/navbar.php'; ?>

<div class="container">
  <h1 class="text-center mt-2"> Perfil</h1>
  <hr class="featurette-divider">
</div>
<?php
require_once 'modelos/modelo-usuarios.php';
$id = $_GET['id'];
$perfil = Usuarios::getPerfilUsuario($id);
if(isset($perfil[0])){

    if($perfil[0]['tipo_usuario']=='Cliente'){
      require_once 'componentes/perfil-cliente.php';
    }elseif($perfil[0]['tipo_usuario']=='Maestro'){
      require_once 'componentes/perfil-maestro.php';

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
<?php 
if(isset($_SESSION['id']) && $_SESSION['id']==$_GET['id']){
require_once 'componentes/modal-editar-fp.php'; 
}
 ?>
<?php require_once 'componentes/scripts.php';
if($perfil[0]['tipo_usuario']=='Maestro'){
echo '<script type="text/javascript" src="js/perfil-maestro.js"></script>';} ?>


</body>
</html>