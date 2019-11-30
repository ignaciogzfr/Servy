<!DOCTYPE html>
<html lang="en">
<head>
	


<?php require_once("componentes/links.php");
      require_once("componentes/scripts.php"); ?>





  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Servy 2</title>

</head>

<body style="background-color:#45526e">
<?php   require_once 'componentes/modal-denuncias-publicacion.php'; ?>
<?php require_once 'componentes/ver-ruta-modal.php';?>  
    <!-- Page Content -->
    <div id="page-content-wrapper" class="bg-white container mt-5">

				<div class="text-center">
					<h1>Ver publicacion</h1>
				</div>
<hr class="featurette-divider">


        <?php 
            require_once("modelos/modelo-publicaciones.php");

            $publi = publicaciones::verPublicacion($_GET["publicacion"]);
            $denuncias = publicaciones::getDenunciasPublicacion($_GET["publicacion"]);

              echo('
  <div class="container text-center" style="min-height:500px;">

      <div class="row">
        <div class="col">Pedido por: '.$publi[0]["nombre_usuario"].'</div>
        <div class="col">Tipo de servicio: '.$publi[0]["tipo_servicio"].' </div>
        <div class="col">Fecha de Publicacion: '.$publi[0]["fecha_hora_publicacion"].'</div>

      </div>
  <hr class="featurette-divider">
      <h3>'.$publi[0]["titulo_publicacion"].'</h3>
      <p>'.$publi[0]["detalle_publicacion"].'</p>');
      if($publi[0]['tipo_publicacion']=='Demanda'){
      echo('<p>Direccion del Problema: '.$publi[0]["direccion_publicacion"].'</p>');
      }
      echo('
      <input type="hidden" name="lat" value="'.$publi[0]["lat_publicacion"].'" id="lat-publicacion">
      <input type="hidden" name="lng" value="'.$publi[0]["lng_publicacion"].'" id="lng-publicacion">

      <hr class="featurette-divider">
   ');

if($publi[0]["lat_publicacion"] == ""){

echo '';

}else{
echo 
'<div id="floating-panel" class="container text-center">
      <input id="latlng" type="text" hidden="" value="">
      <button class="btn btn-secondary mt-4" data-target="#modal-ver-ruta" data-toggle="modal" id="submit">ver ruta <i class="fas fa-map-marked-alt"></i></button>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7fk_KsJga2Jye7iDyCvC0qTapAidpEyM&callback=initMap">
    </script>
</div>
    ';

}
  echo "</div>";         
         ?>



<?php if(isset($_SESSION['tipo'])){

  echo '<div class="text-right"><button class="btn btn-md btn-danger" data-toggle="modal" data-target="#modal-denuncias-p"><i class="fas fa-ban" ></i> Denunciar Publicacion</button></div>';
} ?>
<div class="container">
<a class="btn btn-md btn-secondary" href="vista-servicios.php?tipo=<?php echo($publi[0]["tipo_publicacion"]); ?>"><i class="fas fa-undo"></i> Volver</a>
</div>

    <?php 
if(isset($_SESSION['tipo']) && $_SESSION['tipo']=='Administrador'){
        echo (' 
    <div class="container"><hr class="featurette-divider">
                 <h3 class="text-center"> Denuncias <i class="fas fa-bullhorn"></i> </h3>
                 <hr class="featurette-divider"></div> ');
    if (count($denuncias)== 0) {
                  echo ('<div class="container"><h6 class=" text-center alert-success w-100 py-2">Esta publicacion no contiene denuncias :)</h6></div>');
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
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->


</body>
</html>
