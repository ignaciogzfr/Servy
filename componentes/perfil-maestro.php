<div class="container w-75 mb-5">

        <div class="row">
          
            <div class="col-md-2">
             <?php 
              require_once 'modelos/modelo-usuarios.php';

              $datos = Usuarios::getPerfilUsuario($_GET['id']); 
              echo '<img src="'.$datos[0]['foto_perfil'].'" alt="img/placeholder-person.jpg" width="150" height="150" class="rounded my-2">'
               ?>
            </div>
            <div class="col-md-2">
            <p>Nombre:</p>
            <p class="pt-2">Email:</p>
            <p class="pt-2">Telefono:</p>
            <p class="pt-2">Direccion:</p>

            </div>
            <div class="col-md-8">
  <?php echo '<input type="text" class="form-control my-1 input-dato-basico" placeholder="'.$datos[0]['nombre_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" class="form-control my-1 input-dato-basico" placeholder="'.$datos[0]['email_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" class="form-control my-1 input-dato-basico" placeholder="'.$datos[0]['fono_usuario'].'" disabled>'; ?>
  <?php echo '<input type="text" class="form-control my-1 input-dato-basico" placeholder="'.$datos[0]['direccion_usuario'].'" disabled>'; ?>

            </div>

        </div>

        <div class="mt-2">
          <p>Experiencias</p>
            <?php
                $id = $_GET['id'];
                $servicios = Usuarios::getServiciosMaestro($id);
                $certificados = Usuarios::getCertificadosMaestro($id);
                $experiencia = Usuarios::getExperienciaMaestro($id);
            echo '<textarea class="form-control exp-maestro" disabled rows="3">'.$experiencia[0]['detalle_experiencia'].'</textarea>';
?> 
          <div class="row">
            <div class="col-md-6">
              <p class="pt-2">Certificados</p>
                <?php 
                for($i = 0; $i < count($certificados); $i++){
                echo '<input type="text" class="form-control mb-2" placeholder="'.$certificados[$i]['nombre_certificado'].'" disabled>';}

                 ?>                              
                
            </div>
            <div class="col-md-6">
              <p class="pt-2">Servicios que proporciona</p>
              <?php 
              for($i = 0; $i < count($servicios); $i++){
              echo '<input type="text" class="form-control mb-2" placeholder="'.$servicios[$i]['tipo_servicio'].'" disabled>';} ?>                            

            </div>
   

           </div>
             <div class="float-right">
            <?php 
            if(isset($_SESSION['id']) && $_SESSION['id']==$_GET['id']){
                echo '<div class="my-3"><button type="button" class="btn btn-md btn-primary btn-preparar-edit"><i class="fas fa-edit"></i> Editar</button></div>';
              }   ?>
          </div> 
                


        </div>


      </div>
	           