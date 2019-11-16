  <div class="d-flex toggled" id="wrapper" tabindex="-1">

<?php 
@session_start();
if(isset($_SESSION['tipo'])){
switch ($_SESSION['tipo']){
	case 'Cliente':
	require_once 'componentes/sidenav-cliente.php';
	break;
	case 'Maestro':
	require_once 'componentes/sidenav-maestro.php';
	break;
	case 'Administrador':
	require_once 'componentes/sidenav-admin.php';
		break;
}}
else{
	require_once 'componentes/sidenav-guest.php';
}
?>


    <?php require_once 'login-modal.php'; ?>