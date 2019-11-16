<div class="container w-75 mb-5">

        <div class="row">
          
            <div class="col-md-4 text-center">
             <?php
             $Sesion = '';
             if(isset($_SESSION['id']) && $_GET['id'] == $_SESSION['id']){
              $sesion = true;
             }else{
              $sesion = false;
             }
              require_once 'modelos/modelo-usuarios.php';
              $datos = Usuarios::getPerfilUsuario($_GET['id']); 
              echo '<img src="'.$datos[0]['foto_perfil'].'" alt="img/placeholder-person.jpg" width="150" height="150" class="rounded my-2">'
               ?>
<?php
if($sesion == true){
  echo '<button class="btn btn-md btn-primary btn-modal-fp" value="'.$_GET['id'].'" data-toggle="modal" data-target="#modal-editar-fp">Cambiar Foto de Perfil</button>';
}
?>
            </div>

        <div class="col-md-2">

            <p class="text-muted my-3">Nombre:</p>
            <p class="text-muted my-3">Email:</p>
            <p class="text-muted my-3">Telefono:</p>
            <p class="text-muted my-3">Direccion:</p>

        </div>
            <div class="col-md-6">
<form class="form-editar-maestro">
  <?php echo '<input type="text" class="form-control my-1 input-dato-basico" name="nombre" value="'.$datos[0]['nombre_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" class="form-control my-1 input-dato-basico" name="mail" value="'.$datos[0]['email_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" class="form-control my-1 input-dato-basico" name="fono" value="'.$datos[0]['fono_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" class="form-control my-1 input-dato-basico" name="dir" value="'.$datos[0]['direccion_usuario'].'" disabled>'; ?>
  <input type="hidden" value="Maestro" id='tipo-editar-perfil'>
  <input type="hidden" value="editarPerfilBasicoM" name="op">

            </div>

        </div>

        <div class="mt-2">
          <p>Experiencias</p>
<?php
                $id = $_GET['id'];
                $servicios = Usuarios::getServiciosMaestro($id);
                $certificados = Usuarios::getCertificadosMaestro($id);
                $experiencia = Usuarios::getExperienciaMaestro($id);
            echo '<textarea class="form-control exp-maestro input-dato-basico" disabled rows="3" name="exp">'.$experiencia[0]['detalle_experiencia'].'</textarea>';
            echo '<input type="hidden" name="id" value="'.$datos[0]['id_usuario'].'">';
?>
</form>

<?php 
            if($sesion == true){
                echo '<div class="text-center div-botones-editar"><button type="button" class="btn btn-sm btn-primary btn-preparar-edit" value="'.$_GET['id'].'"><i class="fas fa-edit"></i> Editar</button></div>';
              }   
?>


          <div class="row my-3">
            <div class="col-md-8">
              <div class="text-center">
              <p class="mt-2">Certificados <?php if($sesion == true){echo '<button class="btn btn-md btn-success btn-agregar-certificados"><i class="fas fa-plus"></i></button>';} ?></p>
              
              </div>
              <div class="certificados-edit list-unstyled">
                <?php 
                if(count($certificados)==0){
                echo '<h5 class="alert alert-primary">No se ha indicado ningun certificado al respecto de los servicios que proporciona este usuario.</h5>';
                }
                else{

                  for($i = 0; $i < count($certificados); $i++){

                    if($sesion == true){
                    echo '
                    <div class="row my-3">
                    <button class="btn btn-danger btn-eliminar-certificado" style="width:38px; height:40px; display: none;">
                    <i class="fas fa-trash"></i>
                    </button>
                    <li class="my-3">'.$certificados[$i]['nombre_certificado'].'</li>
                    </div>';
                    }else{
                    echo '<input type="text" class="form-control mb-2" placeholder="'.$certificados[$i]['nombre_certificado'].'" disabled>';
                    }
                  }
                }

                 ?>  
              </div>
<?php                 
 if($sesion == true){
echo '<div class="text-center"><button class="btn btn-md btn-danger btn-eliminar-certificados" value="'.$_GET['id'].'">Eliminar Certificados</button></div>';}
?>


            </div>
            <div class="col-md-4">


              <div class="text-center">
              <p class="mt-2">Servicios que proporciona <?php if($sesion == true){echo '<button class="btn btn-md btn-success btn-agregar-certificados"><i class="fas fa-plus"></i></button>';} ?></p>
              </div>


                <div class="servicios-edit list-unstyled offset-3">

                    <?php 
                    if(count($servicios)==0){
                    echo '<h5 class="alert alert-primary">No se ha indicado ninguno de los tipos de servicios a los que atiende este usuario.</h5>';
                    }
                    else{

                      for($i = 0; $i < count($servicios); $i++){

                        if($sesion == true){
                        echo '<div class="row my-3"><li class="my-3">'.$servicios[$i]['tipo_servicio'].'</li><button class="btn btn-danger btn-eliminar-servicio offset-1" style="width:38px; height:40px; display:none;"><i class="fas fa-trash"></i></button></div>';
                        }else{
                        echo '<input type="text" class="form-control mb-2" placeholder="'.$servicios[$i]['tipo_servicio'].'" disabled>';  
                        }

                      }
                      if($sesion == true){
                      echo '<div class="text-center"><button class="btn btn-md btn-danger btn-eliminar-servicios" value="'.$_GET['id'].'">Eliminar Servicios</button></div>';
                      }
                    }
                    ?> 

                </div> 


            </div>
           </div>
        </div>


      </div>