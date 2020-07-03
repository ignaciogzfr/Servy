<?php 
@session_start();
if(!isset($_SESSION['tipo']) || (isset($_SESSION['tipo']) && $_SESSION['tipo']=='Administrador')){
	echo "<script>location.href ='index.php'</script>";
} ?>