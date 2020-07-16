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
            //puede ser si o no
            $puedeDenunciar = Usuarios::verificarPosibilidadDenunciar($_GET['id'],$_SESSION['id']);         
            echo "<script>console.log('el cliente [".$puedeDenunciar."] puede denunciar');</script>";
            $datos = Usuarios::getPerfilUsuario($_GET['id']); 
            echo '<img src="'.$datos[0]['foto_perfil'].'" alt="Foto de Perfil va aqui." width="150" height="150" class="rounded-circle my-2">'
             ?>             
<?php
if($sesion == true){
  echo '<button class="btn btn-md btn-primary btn-modal-fp" value="'.$_GET['id'].'" data-toggle="modal" data-target="#modal-editar-fp"><i class="fas fa-image"></i> Cambiar Foto de Perfil</button>';}
?>
          </div>
            <div class="col-md-2">
            <p class="text-muted my-3">Nombre:</p>
            <p class="text-muted my-3">Email:</p>
            <p class="text-muted my-3">Telefono: +56 9</p>
            <p class="text-muted my-3">Direccion:</p>
            </div>
            <div class="col-md-6">
<form class="form-editar-cliente">

  <?php echo '<input type="text" name="nombre" required="" pattern="^\b(?!.*?\s{2})[A-Za-z ]{1,25}\b$" minlength="1" maxlength="25" class="form-control my-1 input-dato-basico nombre-editar-perfil" original="'.$datos[0]['nombre_usuario'].'" value="'.$datos[0]['nombre_usuario'].'" disabled>'; ?>


  <?php echo '<input type="mail" name="mail" required="" pattern="[a-z0-9._%+-]+@([a-z0-9.-].{1,20})+(\.[a-z].{1,7})$" maxlength="80" class="form-control my-1 mail-editar-perfil" original="'.$datos[0]['email_usuario'].'" value="'.$datos[0]['email_usuario'].'" disabled>'; ?>


  <?php echo '<input type="tel" name="fono" required="" pattern="^[9876543]\d{7}$"  maxlength="8" class="form-control my-1 input-dato-basico fono-editar-perfil" original="'.$datos[0]['fono_usuario'].'" value="'.$datos[0]['fono_usuario'].'" disabled>'; ?>


  <?php echo '<input type="text" name="dir" required="" maxlength="80" class="form-control my-1 input-dato-basico dir-editar-perfil" original="'.$datos[0]['direccion_usuario'].'" value="'.$datos[0]['direccion_usuario'].'" disabled>'; ?>


  <input type="hidden" value="Cliente" id="tipo-editar-perfil">
  <input type="hidden" value="editarPerfilBasicoC" name="op">
            <?php
            //para que el moderador no edite su cuenta
              if($sesion == true && $_SESSION['tipo'] != 'Administrador'){
                echo '<div class="text-center div-botones-editar"><button type="button" class="btn btn-md btn-primary btn-preparar-edit" value="'.$_GET['id'].'"><i class="fas fa-edit"></i> Editar</button></div>';
                echo '<input type="hidden" name="id" value="'.$datos[0]['id_usuario'].'">';
              } ?>
</form>
<form action="modelos/modelo-login.php" method="POST" id="form-editar-sesion">
  <?php echo '<input type="hidden" name="id" value="'.$datos[0]['id_usuario'].'">'; ?>
</form>
</div>
</div>
<?php 
if($puedeDenunciar == "si"){
      if(isset($_SESSION['id']) && $_SESSION['id']!=$_GET['id'] && $_SESSION['tipo']!='Administrador'){
              echo '<div class="text-center mb-5">
              <button class="btn btn-md btn-danger" data-toggle="modal" data-target="#modal-denuncias-u"><i class="fas fa-ban"></i> Denunciar Perfil</button>
            </div>';
      require_once 'componentes/modal-denuncias-usuario.php';
      }
}else{
  echo "
  <br>
  <h5 class='text-center'>Gracias por denunciar, el moderador verificara y sancionara al usuario si es necesario</h5>
  <br>";
}
 ?>

<?php 
if($datos[0]['tipo_usuario'] != 'Administrador'){
  require_once 'componentes/vista-denuncias-usuario.php'; 
}
if($_GET['id'] != $_SESSION['id'] && $datos[0]['estado_usuario'] == 'Sancionado'){
  echo "<h3 class='text-center'>El usuario fue sancionado</h3>";
}else if($_GET['id'] == $_SESSION['id'] && $_SESSION['estado'] == 'Sancionado'){
  echo "<h3 class='text-center'>Usted fue sancionado, pongase en contacto con el administrador del sitio para apelar</h3>";
}

?> 
</div>
