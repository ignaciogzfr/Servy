<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/logo.png" />
  <title>Mi perfil</title>

</head>

<body>
  <?php require_once 'componentes/links.php'; ?>
  <?php require_once 'componentes/sidenav.php'; ?>
  <?php require_once 'componentes/verificar-sesion.php'; ?>

    <div id="page-content-wrapper">
    <?php require_once 'componentes/navbar.php'; ?>

<div class="container">
  <h1 class="text-center mt-2"> Perfil</h1>
  <hr class="featurette-divider">
</div>
<?php
/*se importan los metodos de medelo usaurio y se obitne a traves del metodo get su id esta se utiliza para buscar al usuario a traves de su identificador, todo lo arrojado por la consulta es guardado en una matriz de datos llamado perfil, y segun su tipo(tambien obtenido por la consulta) se carga el componente para ese cleinte en especifico*/
require_once 'modelos/modelo-usuarios.php';
$id = $_GET['id'];
$perfil = Usuarios::getPerfilUsuario($id);
if(isset($perfil[0])){
      echo "<script>console.log('usuario es de tipo " . $perfil[0]['tipo_usuario'] . "' );</script>";
    if($perfil[0]['tipo_usuario']=='Cliente'){
      require_once 'componentes/perfil-cliente.php';
    }elseif($perfil[0]['tipo_usuario']=='Maestro'){
      require_once 'componentes/perfil-maestro.php';
    }elseif ($perfil[0]['tipo_usuario']=='Administrador') {
       require_once 'componentes/perfil-cliente.php';
    }
    
}
/*caso de que no exista ningun dato en la variable perfil se creara un recuadroa lertando de que el usuario no existe*/
elseif(!isset($perfil[0])){
  echo '<h1 class="alert alert-danger offset-3 col-md-6 text-center">Esta cuenta no existe..</h1>';
}
?>


</div>
</div>
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
