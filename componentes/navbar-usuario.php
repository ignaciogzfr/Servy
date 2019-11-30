<div class="collapse navbar-collapse" id="navbarSupportedContent">


      <ul class="navbar-nav ml-auto mt-2">
            <?php if($_SESSION['tipo']!='Administrador')
            echo ' 
            <li class="nav-item">
            <a class="btn btn-warning btn-sm text-white" href="paypal.php?id='.$_SESSION['id'].'&nombre='.$_SESSION['nombre'].'">Subcribete!</a>
            </li>'; ?>
            

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
            <?php 
        if($_SESSION['tipo']=='Maestro'){
        echo '
        <li class="nav-item">
        <a class="nav-link" href="servicios-pendientes.php?tipo=oferta" target="_blank">Mis Ofertas de Servicios</a>
        </li>';
            }  ?>
        <li class="nav-item">
        <?php 
        if ($_SESSION['tipo']=='Cliente'){ 
        echo '<a class="nav-link" href="vista-servicios.php?tipo=oferta" target="_blank">Ofertas de Servicios</a>';
        }elseif($_SESSION['tipo']=='Maestro'){
        echo '<a class="nav-link" href="vista-servicios.php?tipo=demanda" target="_blank">Solicitudes de Servicios</a>';
        } ?>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="modelos/logout.php">
            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </a>
        </li>

      </ul>
</div>  
