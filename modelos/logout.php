<?php 
ECHO 'Cerrando Sesión, espere un momento . . .'

@session_start();
session_destroy();
$self = $_SERVER['HTTP_REFERER'];
echo('<script> location.href="'.$self.'"</script>');
 ?>