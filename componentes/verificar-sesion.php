<?php 
//se llama a la variable global antes inicializada
@session_start();
//segun la variable inicializada se verifica el tipo de usuario que intenta acceder a la pagina
if(!isset($_SESSION['tipo'])){
	//si la variable no existe se recarga la pagina de inicio
	echo '<script>location.href="index.php"</script>';
}
?>