  <div class="d-flex toggled" id="wrapper" tabindex="-1">

<?php 
//Se revisa si existe una sesion en la que comparar
if(isset($_SESSION['tipo'])){
//Si existe se añade el resiltado del tipo del cliente a una variable local que la compara y carga su navegador presonal correspondiente
if($_SESSION['tipo'] == 'Cliente'){

	echo('<script>console.log("caso cliente siendo la sesion :  $_SESSION["tipo"]")</script>');
  require_once 'componentes/sidenav-cliente.php';
}
elseif($_SESSION['tipo'] == 'Administrador'){
	echo('<script>console.log("caso Administrador siendo la sesion :  $_SESSION["tipo"]")</script>');
  require_once 'componentes/sidenav-admin.php';
}
elseif($_SESSION['tipo'] == 'Maestro'){
	echo('<script>console.log("caso Maestro siendo la sesion :  $_SESSION["tipo"]")</script>');
  require_once 'componentes/sidenav-maestro.php';
}
}elseif(!isset($_SESSION['id'])){
//caso de que no exista una sesion
	echo('<script>console.log("caso invitado siendo la sesion :  $_SESSION["tipo"]")</script>');
  require_once 'componentes/sidenav-guest.php';
} ?>


    <?php require_once 'login-modal.php'; ?>
