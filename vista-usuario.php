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

<body style="font-family: 'Noto Sans JP', sans-serif; background-color: #fafafa;">

    <div id="page-content-wrapper">

<?php require_once 'componentes/navbar.php'; ?>

        <div class="container">
          <h1 class="text-center mt-2"> Perfil</h1>
          <hr class="featurette-divider">
        </div>

      
      <div class="container  w-75">


        <?php 
            require_once("modelos/modelo-usuarios.php");
            $user = Usuarios::verUsuarioCliente($_GET["usuario"]);
            $userm = Usuarios::verUsuarioMaestro($_GET["usuario"]);
            $certificados = Usuarios::getCertificadosMaestro($_GET["usuario"]);
            $experiencia = Usuarios::getExperienciaMaestro($_GET["usuario"]);
            $servicios = Usuarios::getServiciosMaestro($_GET["usuario"]);

            if($user[0]["tipo_usuario"]=='Cliente'){

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

                  </div>');

            }else{

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
                  
                   echo(' <p>experiencias:</p>
                <textarea type="text" class="form-control mb-2" disabled rows="3">'.$experiencia[0]["detalle_experiencia"].'</textarea>
                <p>Servicios proporcionados:</p>');
                 
             

                for($i = 0; $i < count($servicios); $i++){
                     echo ('<input type="text" class="form-control mb-2 col-2" placeholder="'.$servicios[$i]["tipo_servicio"].'" disabled>');
                   }

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