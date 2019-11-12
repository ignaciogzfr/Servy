  <div class="d-flex toggled" id="wrapper" tabindex="-1">

    <!-- Sidebar --> 
    <?php
    //Se revisa si existe una sesion en la que comparar
        if(isset($_SESSION['tipo'])){
    //Si existe se añade el resiltado del tipo del cliente a una variable local que la compara y carga su navegador presonal correspondiente
        $tipo = $_SESSION['tipo'];

switch ($tipo) {

    case 'Administrador':
        require_once 'sidenav-admin.php';
    break;

    case 'Cliente':
        require_once 'sidenav-cliente.php';
    break;

    case 'Maestro':
        require_once 'sidenav-maestro.php';
    break;

    default:
        require_once 'sidenav-guest.php';
    break;
                }

}else{
  //caso de que no exista una sesion
  require_once 'sidenav-guest.php';
}

?>
    </div>
    <?php require_once 'login-modal.php'; ?>