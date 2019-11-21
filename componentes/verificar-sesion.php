<?php 
@session_start();
if(!isset($_SESSION['tipo'])){
	echo '<script>location.href="index.php"</script>';
}
?>