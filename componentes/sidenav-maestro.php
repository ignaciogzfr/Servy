    <!-- Sidebar -->
    <div class="mdb-color  text-white border-right" id="sidebar-wrapper">
      <div class="sidebar-heading mdb-color text-center"><?php echo $_SESSION['nombre'] ?></div>
      <div class="text-center">
        <?php echo '<img class="rounded" src="'.$_SESSION['fp'].'" height="80">' ?>
      </div>
      <div class="list-group list-group-flush text-white pt-5">
        <a href="">Solicitar Servicios</a>
        <a href="">Publicar Servicios</a>
        <a href="">Mis publicaciones</a>
        <a href="servicios-pendientes.php" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Servicios pendientes</a>
        <a href="modelos/logout.php" class="list-group-item list-group-item-action mdb-color lighten-2 text-white ">Cerrar sesion <i class="fas fa-power-off"></i></a>
      </div>
    </div>