    <!-- Sidebar -->
    <div class="mdb-color  text-white border-right" id="sidebar-wrapper">
      <div class="sidebar-heading mdb-color text-center"><?php echo $_SESSION['nombre'];  ?></div>
      <div class="text-center">
        <?php echo '<img src="'.$_SESSION['fp'].'" class="rounded-circle" height="80" width="80">'; ?><img class="rounded"  height="80px">
      </div>
      <div class="list-group list-group-flush text-white pt-5">
      
        <?php echo('<a href="servicios-pendientes.php?id='.$_GET['id'].'" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Servicios pendientes</a>
        
        <a href="publicar-servicio.php?id='.$_GET['id'].'" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Pedir servicio</a>'); ?>
        
        <a href="servicios-pendientes.php" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Mis Publicaciones</a>
        
        <a href="modelos/logout.php" class="list-group-item list-group-item-action mdb-color lighten-2 text-white ">Cerrar sesion <i class="fas fa-power-off"></i></a>

      </div>
    </div>
