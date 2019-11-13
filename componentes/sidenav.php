  <div class="d-flex toggled" id="wrapper" tabindex="-1">

<?php 
//Se revisa si existe una sesion en la que comparar
if(isset($_SESSION['tipo'])){
//Si existe se añade el resiltado del tipo del cliente a una variable local que la compara y carga su navegador presonal correspondiente
if($_SESSION['tipo'] == 'Cliente'){
  require_once 'componentes/sidenav-cliente.php';
}
elseif($_SESSION['tipo'] == 'Administrador'){
  require_once 'componentes/sidenav-admin.php';
}
elseif($_SESSION['tipo'] == 'Maestro'){
  require_once 'componentes/sidenav-maestro.php';
}
}elseif(!isset($_SESSION['id'])){
//caso de que no exista una sesion
  require_once 'componentes/sidenav-guest.php';
} ?>


    <?php require_once 'login-modal.php'; ?>
