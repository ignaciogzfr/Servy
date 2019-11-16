<?php 
ECHO 'Cerrando Sesión, espere un momento . . .';
/* se utiliza para llamar a la variable global  $_SESSION[]*/
session_start();
/*la sesion existente se elimina */
session_destroy();
echo('<script> location.href="../index.php"</script>');
 ?>