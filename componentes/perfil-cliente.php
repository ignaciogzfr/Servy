<div class="container w-75">

        <div class="row mt-4">
          
            <div class="col-md-2">
            <?php 
            require_once 'modelos/modelo-usuarios.php';

            $datos = Usuarios::getPerfilUsuario($_GET['id']); 
            echo '<img src="'.$datos[0]['foto_perfil'].'" alt="img/placeholder-person.jpg" width="150" height="150" class="rounded my-2">'
             ?>
            </div>
            <div class="col-md-2">

            <p class="text-muted my-3">Nombre:</p>
            <p class="text-muted my-3">Email:</p>
            <p class="text-muted my-3">Telefono:</p>
            <p class="text-muted my-3">Direccion:</p>
            </div>
            <div class="col-md-8">
<form class="form-editar-cliente">
  <?php echo '<input type="text" class="form-control my-1" placeholder="'.$datos[0]['nombre_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" class="form-control my-1" placeholder="'.$datos[0]['email_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" class="form-control my-1" placeholder="'.$datos[0]['fono_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" class="form-control my-1" placeholder="'.$datos[0]['direccion_usuario'].'" disabled>'; ?>
            <?php
              if(isset($_SESSION['id'])==$_GET['id']){
                echo '<div class="text-center"><button type="button" class="btn btn-md btn-primary"><i class="fas fa-edit"></i> Editar</button></div>';
              } ?>
</form>
            </div>

        </div>
          
</div>
