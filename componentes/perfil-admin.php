<div class="container w-80 mb-5">

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
<form class="form-editar-cliente ">
  <?php echo '<input type="text" name="nombre" class="form-control my-1 col-6 input-dato-basico nombre-editar-perfil" value="'.$datos[0]['nombre_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" name="mail" class="form-control my-1 col-6 input-dato-basico mail-editar-perfil" value="'.$datos[0]['email_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" name="fono" class="form-control my-1 col-6  input-dato-basico fono-editar-perfil" value="'.$datos[0]['fono_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" name="dir" class="form-control my-1  col-6 input-dato-basico dir-editar-perfil" value="'.$datos[0]['direccion_usuario'].'" disabled>'; ?>
  <input type="hidden" value="Cliente" id="tipo-editar-perfil">
  <input type="hidden" value="editarPerfilBasicoC" name="op">
            <?php
              if(isset($_SESSION['id']) && $_SESSION['id']==$_GET['id']){
                echo '<div class="text-center div-botones-editar"><button type="button" class="btn btn-md btn-primary btn-preparar-edit" value="'.$_GET['id'].'"><i class="fas fa-edit"></i> Editar</button></div>';
                echo '<input type="hidden" name="id" value="'.$datos[0]['id_usuario'].'">';
              } ?>
</form>
            </div>


            <div class="container">
          <h3 class="text-center mt-4"> Panel de control</h1>
          <hr class="featurette-divider">
        </div>

      
      <div class="container text-center w-75">

        <div class="row">
          
  
            <div class="col">
                <div class="container">
                <a href="moderacion-usuarios.php" class="btn btn-md btn-primary">Buscar usuarios</a>
                <a href="moderacion-publicaciones.php" class="btn btn-md btn-primary">Buscar publicaciones</a>
        
            </div>

            </div>

        </div>



      </div>

        </div>
          
</div>