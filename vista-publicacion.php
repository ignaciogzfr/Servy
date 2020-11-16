  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/logo.png" />
  <title>Publicaciones</title>
</head>
<body class="bg-white">
<?php require_once 'componentes/links.php'; ?>
<?php require_once 'componentes/sidenav.php'; ?>
<?php require_once 'componentes/scripts.php'; ?>
<?php require_once 'componentes/modal-denuncias-publicacion.php'; ?>
<?php require_once 'componentes/ver-ruta-modal.php';?>  
    <div id="page-content-wrapper">
    <?php require_once 'componentes/navbar.php'; ?>
				<div class="container bg-white">
					<h1 class="text-center mt-2"> Ver publicacion</h1>
					<hr class="featurette-divider">
        <?php 

            require_once("modelos/modelo-publicaciones.php");
            $publi = publicaciones::verPublicacion($_GET["publicacion"]);
            $denuncias = publicaciones::getDenunciasPublicacion($_GET["publicacion"]);
              echo('
  <div class="container text-center" style="min-height:300px;">
      <div class="row">
        <div class="col">Pedido por: '.$publi[0]["nombre_usuario"].'</div>
        <div class="col">Tipo de servicio: '.$publi[0]["tipo_servicio"].' </div>
        <div class="col">Fecha de Publicacion: '.$publi[0]["fecha_hora_publicacion"].'</div>
      </div>
  <hr class="featurette-divider">
          <h3>'.$publi[0]["titulo_publicacion"].'</h3>
      <p>'.$publi[0]["detalle_publicacion"].'</p>
          <p>'.$publi[0]["direccion_publicacion"].'
          </p>');
//si existe una sesion y eres un maestro y no es tu publicacion y ningun maestro la acepto
if(isset($_SESSION['id']) && $_SESSION['tipo'] == 'Maestro' && $publi[0]['email_usuario'] != $_SESSION['email'] && $publi[0]['id_usuario_maestro'] != $_SESSION ['id']){

  
  echo('<button class="btn btn-success mt-3" id="btn-aceptar-publicacion" value="'.$_SESSION['id'].'">Aceptar publicacion</button>');
  
}else if($publi[0]['id_usuario_maestro'] != ''){
  echo ('<small>esta publicacion ya fue tomada por un maestro</small>');
} 
          echo('<button class="btn btn-primary mt-3" data-target="#modal-resumen-usuario" data-toggle="modal">Ver perfil <i class="far fa-user"></i></button> 
                    <input  id="id-publicacion" type="hidden" value="'.$_GET["publicacion"].'">
  
    <input type="hidden" name="lat" value="'.$publi[0]["lat_publicacion"].'" id="lat-publicacion">
    <input type="hidden" name="lng" value="'.$publi[0]["lng_publicacion"].'" id="lng-publicacion">

          <hr class="featurette-divider">
   </div>
   ');

if($publi[0]["lat_publicacion"] == ""){
echo "<script>console.log('no existen las cordenadas');</script>";
}else{
echo 
'<div id="floating-panel" class="container text-center">
      <input id="latlng" type="text" hidden="" value="">
      <a href="vista-publicaciones.php?tipo='.$publi[0]['tipo_publicacion'].'" class="btn btn-md btn-secondary"><i class="fas fa-undo"></i> Volver</a>
    <button class="btn btn-secondary" data-target="#modal-ver-ruta" data-toggle="modal" id="submit">Ver ruta <i class="fas fa-map-marked-alt"></i></button>
      <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJgvLZDbhusp9lFmGeOWkIkBsjJLMUnYM&callback=initMap">
    </script>

    ';
  }

    //si existe sesion
if(isset($_SESSION['tipo'])){
  //si no eres el usuario que creo la publi o el administrador y no has denunciado
  if ($publi[0]['email_usuario'] != $_SESSION['email'] && $_SESSION['tipo'] != 'Administrador' && $_SESSION['estado'] == 'Activo') {
      echo '
      <button class="btn btn-md btn-danger" data-toggle="modal" data-target="#modal-denuncias-p"><i class="fas fa-ban" ></i> Denunciar Publicacion</button>
     ';
    }else if($publi[0]['nombre_usuario'] != $_SESSION['nombre']){
      //y no es tu publicacion
      echo '<h5>Gracias por denunciar a esta publicacion, un moderador podra verla y sancionarla si fuese necesario</h5>';
    }
  }
  echo "</div>
      </div>
  ";         
         ?>
    <?php 
    //todos podran ver denuncias
if(isset($_SESSION['tipo'])){
        echo (' 
    <div class="container"><hr class="featurette-divider">
                 <h3 class="text-center"> Denuncias <i class="fas fa-bullhorn"></i> </h3>
                 <hr class="featurette-divider"></div> ');
    if (count($denuncias)== 0) {
                 echo ('<div class="container"><h6 class=" text-center alert-success mb-5 w-100 py-2">Esta publicacion no contiene denuncias.</h6></div>');
           }else{
            echo ('
                <div class=" container mt-4 ">
                      
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
                </table></div>');
          }
        } ?>
    </div>
  </div>
  <?php require_once 'componentes/footer.php'; ?>
  <?php require_once 'componentes/modal-resumen-usuario.php'?>
</body>
</html>

