<?php 
ECHO 'Cerrando Sesión, espere un momento . . .';

/**
 * Se hace una llamada a la variable global recien creada para luego ser destruida y redireccionar al usuario al homepage.
 * 
 * @global $_SESSION matriz de datos que almacena variables del usuario.
 * @author Ignacio Gonzales.
 * @since 1.0 08-10-2019 20:27.
 * @version  1.1 17-10-2019 20:22.
 * 
 * */


session_start();
session_destroy();
echo('<script> location.href="../index.php"</script>');
 ?>