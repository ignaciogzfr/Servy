    <div class="mdb-color  text-white border-right" id="sidebar-wrapper">

      <div class="sidebar-heading mdb-color text-center"><?php echo $_SESSION['nombre']; ?></div>
      <div class="text-center">
        <?php echo '<img src="'.$_SESSION['fp'].'" class="rounded-circle" height="80" width="80">'; ?>
      </div>

      <div class="sidebar-heading mdb-color text-center">Menu</div>

      <div class="list-group list-group-flush text-white">

        <a href="panel-control.php" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Panel de Control</a>
        
        <a href="modelos/logout.php" class="list-group-item list-group-item-action mdb-color lighten-2 text-white">Cerrar sesion <i class="fas fa-power-off"></i></a>

      </div>


    </div>