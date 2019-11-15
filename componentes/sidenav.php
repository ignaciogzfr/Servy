  <div class="d-flex toggled" id="wrapper" tabindex="-1">

<?php 
@session_start();
if(isset($_SESSION['tipo'])){
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
  require_once 'componentes/sidenav-guest.php';
} ?>


    <?php require_once 'login-modal.php'; ?>