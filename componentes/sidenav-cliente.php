

    <!-- Sidebar -->
    <div class="mdb-color  text-white border-right" id="sidebar-wrapper">
      <div class="sidebar-heading mdb-color text-center"><?php echo $_SESSION['nombre'];  ?></div>
      <div class="text-center">
        <?php echo '<img src="'.$_SESSION['fp'].'" class="rounded-circle" height="80" width="80">'; ?><img class="rounded"  height="80px">
      </div>
      <div class="list-group list-group-flush text-white pt-5">
        <a href="../servicios-pendientes.php" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Mis Publicaciones</a>
        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Informacion</a>
      </div>
    </div>
