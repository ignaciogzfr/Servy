<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Servy 2</title>
  <?php require_once 'componentes/links.php'; ?>
  <?php require_once 'componentes/sidenav.php'; ?>
</head>

<body>

    <div id="page-content-wrapper">

<?php require_once 'componentes/navbar.php'; ?>

        <div class="container">
          <h1 class="text-center mt-2"> Perfil</h1>
          <hr class="featurette-divider">
        </div>

      
      <div class="container  w-75">


        <?php 

            require_once("modelos/modelo-usuarios.php");
            $user = Usuarios::getPerfilUsuario($_GET["id"]);
            $userm = Usuarios::getPerfilUsuario($_GET["id"]);
            $certificados = Usuarios::getCertificadosMaestro($_GET["id"]);
            $experiencia = Usuarios::getExperienciaMaestro($_GET["id"]);
            $servicios = Usuarios::getServiciosMaestro($_GET["id"]);
            $denuncias =Usuarios::getDenunciasUsuario($_GET["id"]);

            if($user[0]["tipo_usuario"]=='Cliente'|| $user[0]["tipo_usuario"]=='Administrador'){

           echo('<div class="row">
                    
                      <div class="col">
                         <img src="'.$user[0]["foto_perfil"].'" width="150" class="rounded" />
                      </div>
                      <div class="col">
                      <p>Nombre:</p>
                      <p>Email:</p>
                      <p>Telefono:</p>
                      <p>Direccion:</p>

                      </div>
                      <div class="col">
                       <input type="text" class="form-control mb-2" placeholder="'.$user[0]["nombre_usuario"].'" disabled>
                        <input type="text" class="form-control mb-2" placeholder="'.$user[0]["email_usuario"].'" disabled>
                        <input type="text" class="form-control mb-2" placeholder="'.$user[0]["fono_usuario"].'" disabled>
                        <input type="text" class="form-control mb-2" placeholder="'.$user[0]["direccion_usuario"].'" disabled>

                      </div>

                  </div>
                 <hr class="featurette-divider">
                 <h3 class="text-center"> Denuncias <i class="fas fa-bullhorn"></i> </h3>
                 <hr class="featurette-divider">  ');

           if (count($denuncias)== 0) {
                  echo ('<h6 class=" text-center alert-success w-100 py-2">Este usuario no cuenta con denuncias :)</h6>');
           }else{
            echo ('

                          <div class=" mt-4 ">
                      
                      <table class="table table-hover table-borderer">
                      <thead class=" mdb-color text-white">
                        <tr>
                          <th scope="col">Denunciante</th>
                          <th scope="col">Tipo denuncia</th>
                          <th scope="col">Descripcion</th>
                          
                        </tr>
                      </thead>
                      <tbody>



              ');

           for($i=0;$i<count($denuncias);$i++){

            echo('        <tr>
                          <td>'.$denuncias[$i]["nombre_usuario"].'</td>
                          <td>'.$denuncias[$i]["tipo_denuncia"].'</td>
                          <td>'.$denuncias[$i]["comentarios_denuncia"].'</td>
                        </tr>
                       
                      ');
           }

            echo ('</tbody>
                </table></div>');}
            }else{
              //caso maestro
                echo ('<div class="row">
                    
                      <div class="col">
                         <img src="'.$userm[0]["foto_perfil"].'" width="150" class="rounded" />
                      </div>
                      <div class="col">
                      <p>Nombre:</p>
                      <p>Email:</p>
                      <p>Telefono:</p>
                      <p>Direccion:</p>

                      </div>
                      <div class="col">
                       <input type="text" class="form-control mb-2" placeholder="'.$userm[0]["nombre_usuario"].'" disabled>
                        <input type="text" class="form-control mb-2" placeholder="'.$userm[0]["email_usuario"].'" disabled>
                        <input type="text" class="form-control mb-2" placeholder="'.$userm[0]["fono_usuario"].'" disabled>
                        <input type="text" class="form-control mb-2" placeholder="'.$userm[0]["direccion_usuario"].'" disabled>

                      </div>

                      

                  </div>
                    <p>certificados:</p>
                    
                  ');
                  for($i=0;$i<count($certificados);$i++){
                       echo(' <input type="text" class="form-control mb-2 col-4" placeholder="'.$certificados[$i]["nombre_certificado"].'" disabled>');
              }
                  for($i=0;$i<count($experiencia);$i++){   
              echo(' <p>experiencias:</p>
                  
                <textarea type="text" class="form-control mb-2" disabled rows="3">'.$experiencia[$i]["detalle_experiencia"].'</textarea>
                <p>Servicios proporcionados:</p>');
            }
                
                 
             

                for($i = 0; $i < count($servicios); $i++){
                     echo ('<input type="text" class="form-control mb-2 col-2" placeholder="'.$servicios[$i]["tipo_servicio"].'" disabled>');
                   }

                      echo('<hr class="featurette-divider">
                 <h3 class="text-center"> Denuncias <i class="fas fa-bullhorn"></i> </h3>
                 <hr class="featurette-divider"> ');
                    if (count($denuncias)== 0) {
                  echo ('<h6 class=" text-center alert-success w-100 py-2">Este usuario no cuenta con denuncias :)</h6>');
           }else{
            echo ('
                          <div class=" mt-4 ">
                      
                      <table class="table table-hover table-borderer">
                      <thead class=" mdb-color text-white">
                        <tr>
                          <th scope="col">Denunciante</th>
                          <th scope="col">Tipo denuncia</th>
                          <th scope="col">Descripcion</th>
                          
                        </tr>
                      </thead>
                      <tbody>



              ');

           for($i=0;$i<count($denuncias);$i++){

            echo('        <tr>
                          <td>'.$denuncias[$i]["nombre_usuario"].'</td>
                          <td>'.$denuncias[$i]["tipo_denuncia"].'</td>
                          <td>'.$denuncias[$i]["comentarios_denuncia"].'</td>
                        </tr>
                       
                      ');
           }

            echo ('</tbody>
                </table></div>');}

            }


           

           
         ?>

 
          
      </div>
            


    </div>
    <!-- /#page-content-wrapper -->



  </div>
  <!-- /#wrapper -->



<?php require_once 'componentes/footer.php'; ?>
<?php require_once 'componentes/scripts.php' ?>
</body>
</html>
