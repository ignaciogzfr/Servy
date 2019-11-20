<div class="collapse navbar-collapse" id="navbarSupportedContent">


      <ul class="navbar-nav ml-auto mt-2">

        <li class="nav-item">
        <a class="nav-link" href="index.php">Inicio</a>
        </li>
        
        <li class="nav-item">
        <?php if($_SESSION['tipo']!='Administrador'){
            echo '<a class="nav-link" href="perfil.php?id='.$_SESSION['id'].'">Mi Perfil</a>';
        }else{
            echo '<a class="nav-link" href="panel-control.php">Panel de Control</a>';
        } ?>
        
        </li>

        <li class="nav-item">
        <a class="nav-link" href="vista-servicios.php?tipo=oferta" target="_blank">Servicios</a>
        </li>

        <li class="nav-item active">

        <a class="nav-link" href="modelos/logout.php">
        <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
        </a>

        </li>
      </ul>
</div>  