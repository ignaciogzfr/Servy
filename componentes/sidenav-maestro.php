    <!-- Sidebar -->
    <div class="mdb-color  text-white border-right" id="sidebar-wrapper">
      <div class="sidebar-heading mdb-color text-center">Maestro</div>
      <div class="text-center">
        <?php
         echo('<img class="rounded" src="./'.$_SESSION['fp'].'" height="80px">');
        ?>
      </div>
      <div class="list-group list-group-flush text-white pt-5">
         <a href="servicios-pendientes.php" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Servicios pendientes</a>
        <a href="servicios-pendientes.php" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Servicios pendientes</a>
        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Informacion</a>
        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-2 text-white ">Cerrar sesion <i class="fas fa-power-off"></i></a>
      </div>
    </div>
