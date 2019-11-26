<div class="container w-75 mb-5">

        <div class="row mt-4">
          
            <div class="col-md-4 text-center">
            <?php 
             $sesion = '';
             if(isset($_SESSION['id']) && $_GET['id'] == $_SESSION['id']){
              $sesion = true;
              $idSesion = $_GET['id'];
             }else{
              $sesion = false;
             }
            require_once 'modelos/modelo-usuarios.php';

            $datos = Usuarios::getPerfilUsuario($_GET['id']); 
            echo '<img src="'.$datos[0]['foto_perfil'].'" alt="img/placeholder-person.jpg" width="150" height="150" class="rounded-circle my-2">'
             ?>
<?php
if($sesion == true){
  echo '<button class="btn btn-md btn-primary btn-modal-fp" value="'.$_GET['id'].'" data-toggle="modal" data-target="#modal-editar-fp"><i class="fas fa-image"></i> Cambiar Foto de Perfil</button>';}
?>
          </div>
            <div class="col-md-2">

            <p class="text-muted my-3">Nombre:</p>
            <p class="text-muted my-3">Email:</p>
            <p class="text-muted my-3">Telefono:</p>
            <p class="text-muted my-3">Direccion:</p>
            </div>
            <div class="col-md-6">
<form class="form-editar-cliente">
  <?php echo '<input type="text" name="nombre" class="form-control my-1 input-dato-basico nombre-editar-perfil" value="'.$datos[0]['nombre_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" name="mail" class="form-control my-1 input-dato-basico mail-editar-perfil" value="'.$datos[0]['email_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" name="fono" class="form-control my-1 input-dato-basico fono-editar-perfil" value="'.$datos[0]['fono_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" name="dir" class="form-control my-1 input-dato-basico dir-editar-perfil" value="'.$datos[0]['direccion_usuario'].'" disabled>'; ?>
  <input type="hidden" value="Cliente" id="tipo-editar-perfil">
  <input type="hidden" value="editarPerfilBasicoC" name="op">
            <?php
              if($sesion == true){
                echo '<div class="text-center div-botones-editar"><button type="button" class="btn btn-md btn-primary btn-preparar-edit" value="'.$_GET['id'].'"><i class="fas fa-edit"></i> Editar</button></div>';
                echo '<input type="hidden" name="id" value="'.$datos[0]['id_usuario'].'">';
              } ?>
</form>

<form action="modelos/modelo-login.php" method="POST" id="form-editar-sesion">
  <?php echo '<input type="hidden" name="id" value="'.$datos[0]['id_usuario'].'">'; ?>
</form>
            </div>

        </div>
<?php if($_SESSION['tipo']=='Administrador'){
  require_once 'componentes/vista-usuario.php';
} ?>          
</div>
