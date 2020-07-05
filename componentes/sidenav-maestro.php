    <div class="mdb-color  text-white border-right" id="sidebar-wrapper">
      <div class="sidebar-heading mdb-color text-center" ><p><?php if(substr($_SESSION['nombre'],0,strpos($_SESSION['nombre'],' '))==''){echo ($_SESSION['nombre']);}else{echo substr($_SESSION['nombre'],0,strpos($_SESSION['nombre'],' '));}  ?></p></div>
      <div class="text-center">
        <?php echo '<img src="'.$_SESSION['fp'].'" class="rounded-circle" height="80" width="80">'; ?>
      </div>
      <div class="list-group list-group-flush text-white pt-5">
      
        <?php echo('<a href="servicios-a-realizar.php" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Servicios a realizar</a>'); ?>
     
        <?php

if($_SESSION['estado'] == "Activo"){
echo('
  <a href="publicar-servicio.php" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Pedir o Publicar Servicios</a>');
}else{

  echo('<a class="list-group-item list-group-item-action mdb-color lighten-1 text-white" disabled="" >Estas sancionado</a>');
}
?>

  <a href="servicios-pendientes.php" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Mis Publicaciones</a>
  <a href="servicios-pendientes.php?tipo=Demanda" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Mis Peticiones</a>
  <a href="servicios-pendientes.php?tipo=Oferta" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Mis Ofertas</a>  
  <a href="verificacionMail.php" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">verifica tu email</a>      
  <a href="modelos/logout.php" class="list-group-item list-group-item-action mdb-color lighten-2 text-white ">Cerrar sesion <i class="fas fa-power-off"></i></a>

      </div>
    </div>
