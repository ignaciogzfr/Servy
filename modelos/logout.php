<?php 
ECHO 'Cerrando Sesión, espere un momento . . .';

session_start();
session_destroy();
echo('<script> location.href="../index.php"</script>');
 ?>