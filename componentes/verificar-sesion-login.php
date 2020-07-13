<?php 
@session_start();
if(isset($_SESSION["id"])){
echo '<script>location.href="perfil.php?id='.$_SESSION["id"].'"</script>';
}
?>