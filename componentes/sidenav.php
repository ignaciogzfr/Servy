  <div class="d-flex toggled" id="wrapper" tabindex="-1">

    <!-- Sidebar -->
    <div class="mdb-color text-white" id="sidebar-wrapper">


      <div class="sidebar-heading mdb-color">Menu</div>

      <div class="list-group list-group-flush text-white mt-3">

        <button data-toggle="modal" data-target="#login-modal" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Iniciar Sesion <i class="fas fa-user-circle"></i></button>

        <a href="perfil.php" target="_blank" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Mi Perfil - Cliente</a>

        <button data-toggle="modal" data-target="modal-contacto" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Informacion</button>



        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-2 text-white ">Cerrar sesion <i class="fas fa-power-off"></i></a>

      </div>


    </div>
    <?php require_once 'login-modal.php'; ?>
