<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once("componentes/links.php");
      require_once("componentes/scripts.php"); ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="shortcut icon" href="img/logo.png" />
  <title>Servy</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
</head>
<body>
<style> 
    </style>
<?php require_once 'componentes/sidenav.php'; ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
<?php require_once 'componentes/ver-ruta-modal.php';
  @session_start();
       ?>
				<div class="container">
					<h1 class="text-center mt-2"> Ver publicacion</h1>
					<hr class="featurette-divider">
				</div>
        <?php 
            require_once("modelos/modelo-publicaciones.php");
            require_once("modelos/modelo-usuarios.php");
            //se inicia la variable serv
    
            $publi = publicaciones::verPublicacionInvitado($_GET["publicacion"]); 
            if(isset($_SESSION['id'])){
              $serv = Usuarios::obtenerServicioM($_SESSION['id'],$publi[0]["tipo_servicio"]);
            }
            
            //si existe una sesion y su tipo de usuario es Maestro entonces se llama al parametro para obtener el 
            //la profecion dependiendo del tipo de servivio de la publicacion
              echo('
  <div class="container text-center">

      <div class="row">
        <div class="col">Pedido por: '.$publi[0]["nombre_invitado"].'</div>
        <div class="col">Tipo servicio: '.$publi[0]["tipo_servicio"].' </div>
        <div class"col">Telefono: +56 9 '.$publi[0]["fono_invitado"].'</div>
        <div class="col">'.$publi[0]["fecha_hora_invitado"].'</div>

      </div>
      <hr class="featurette-divider">
      <h3>'.$publi[0]["titulo_invitado"].'</h3>
      <p>'.$publi[0]["detalle_invitado"].'</p>
      <p>'.$publi[0]["direccion_invitado"].'</p>     
   ');

if($_SESSION['tipo'] == 'Maestro'){
echo "<script>console.log('el maestro es de tiene el servicio de '".$serv[0]["tipo_servicio"].");</script>";
}else{
echo "<script>console.log('el usuario es de tipo cliente');</script>";
}
if(isset($_SESSION['id'])){

  //si se hiso un login o registro
if ($_SESSION['tipo'] != $publi[0]['tipo_servicio']) {
  //si existe maestro y no es su rubro y existe la sesion
  echo "<h4>No puedes aceptar la publicacion por que no es tu rubro o no te registraste</h4>";
}else if($_SESSION['estado'] != "Activo"){
  //si el estado es sancionado
  echo "<h4>No puedes aceptar el trabajo estando en condicion de sancion</h4>";
}else if($_SESSION['tipo'] == 'Maestro' && $publi[0]['id_usuario_maestro'] != $_SESSION['id']){
  //si el tipo de sesion es maestro y id_usuario_maestro == tu id de sesion y id_usuario_maestro 
    echo(' <hr class="featurette-divider">
                         <button class="btn btn-success mt-3" id="btn-aceptar-publicacion-invitado" value="'.$_SESSION['id'].'">Aceptar publicacion</button>
                         <input  id="id-publicacion" type="hidden" value="'.$_GET["publicacion"].'">');
  }
}
    echo('  </div>');
         ?>  
    </div>
  </div>	
</body>
</html>