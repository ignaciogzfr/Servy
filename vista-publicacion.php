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

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
<style> #map {
        height: 50%;
        width: 50%;
      }

    </style>
<?php require_once 'componentes/sidenav.php'; ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
<?php require_once 'componentes/navbar.php';
       ?>
				<div class="container">
					<h1 class="text-center mt-2"> Ver publicacion</h1>

       
        

          
					<hr class="featurette-divider">
				</div>



        <?php 
            require_once("modelos/modelo-publicaciones.php");

            $publi = publicaciones::verPublicacion($_GET["publicacion"]);
            $denuncias = publicaciones::getDenuncias($_GET["publicacion"]);

              echo('
  <div class="container text-center">

      <div class="row">
        <div class="col"> pedido por: '.$publi[0]["nombre_usuario"].'</div>
        <div class="col">tipo servicio: '.$publi[0]["tipo_servicio"].' </div>
        <div class="col">'.$publi[0]["fecha_hora_publicacion"].'</div>

      </div>
  <hr class="featurette-divider">
          <h3>'.$publi[0]["titulo_publicacion"].'</h3>
      <p>'.$publi[0]["detalle_publicacion"].'</p>
          <p>'.$publi[0]["direccion_publicacion"].'
          </p>

                    
  
    <input type="hidden" name="lat" value="'.$publi[0]["lat_publicacion"].'" id="lat-publicacion">
    <input type="hidden" name="lng" value="'.$publi[0]["lng_publicacion"].'" id="lng-publicacion">

          <hr class="featurette-divider">
    
         
   </div>
   ');
            

         ?>

 <div id="floating-panel " class="container text-center">
      <input id="latlng" type="text" hidden="" value="">
      <input id="submit" type="button" class="btn btn-secondary btn-sm" data-target="#modal-ver-ruta" data-toggle="modal" value="ver ruta">
    </div>
    <div id="map" class="container text-center"> 
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1692060.859147454!2d-70.95888735007692!3d-34.10948903305172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x96626f6a7df81e51%3A0x60cdc26d444b83da!2sRegi%C3%B3n%20Metropolitana!5e0!3m2!1ses!2scl!4v1574657753763!5m2!1ses!2scl"frameborder="0" style="border:0; height: 100%; width: 100%;" allowfullscreen=""></iframe></div>
     
          <script>
            function initMap(){
              var  directionsDisplay = new google.maps.DirectionsRenderer();
              var  directionsService = new google.maps.DirectionsService();
              var geocoder = new google.maps.Geocoder();
              var infowindow = new google.maps.InfoWindow();
              var DistanceMatrix = new google.maps.DistanceMatrixService();
              var map;

      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            
              var origen = new google.maps.LatLng(pos.lat, pos.lng );
              var destino = new google.maps.LatLng(document.getElementById('lat-publicacion').value, document.getElementById('lng-publicacion').value);

              var mapOptions = {
                zoom: 14,
                center: origen
              };

              map = new google.maps.Map(document.getElementById('map'), mapOptions);

              directionsDisplay.setMap(map);

              function CalcularRuta(){

                var request = {
                  origin: origen,
                  destination: destino,
                  travelMode: 'DRIVING',


                };

                directionsService.route(request, function(result, status){

                    if(status = "OK"){
                        //hace la ruta
                      directionsDisplay.setDirections(result);
                    }
                });

              }

                document.getElementById('submit').onclick=function(){
                  CalcularRuta();
                }

          },function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        }  
            }
          </script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7fk_KsJga2Jye7iDyCvC0qTapAidpEyM&callback=initMap">
    </script>




    <?php 

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
          } ?>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<!-- Footer -->

<!-- Footer -->

	
</body>
</html>