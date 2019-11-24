<!DOCTYPE html>
<html lang="en">

<head>


<?php require_once("componentes/links.php");
      require_once("componentes/scripts.php");

  ?>



  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Servy 2</title>

</head>

<body>

<?php require_once 'componentes/sidenav.php'; ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
      
<?php require_once 'componentes/navbar.php'; ?>

<?php @session_start(); ?>


<!-- INICIO DEL FORMULARIO -->
<div class="container my-4" style="width: 70%;">
     
  <form id="form-publicar-servicios" method="POST" autocomplete="off">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="titulopubli">Titulo</label>
      <input type="text" class="form-control" name="titulo-publi" placeholder="Titulo">
  </div>

  </div>

  <div class="form-group">
    <label for="dir">Direccion</label>

    <div id="floating-panel">
      <input id="latlng" type="text" hidden="" value="">
      <input id="submit" type="button" class="btn btn-secondary btn-sm" value="obtener mi ubicación">
    </div>
    
    <div type="hidden" id="map"></div>
          


       <input type="text" class="form-control" name="direccion-publi" placeholder="Avenida Siempreviva 2001" id="direccion-post" required="">
  </div>
  <input type="" name="lat-publicacion" value="" id="lat-publicacion">
    <input type="" name="lng-publicacion" value="" id="lng-publicacion">

<hr class="featurette-divider">
  <div class="form-row">
   
    <div class="form-group col-md-12">
      <label for="inputState">Tipo de servicio</label>
          <select class="custom-select" id="select-tipo-servicio" name="tipo-serv" style="width: 100%">
            <option selected disabled="">Seleccionar servicio</option>
<?php 
require_once("modelos/modelo-servicios.php");
  $servi = Servicios::getServicios();

  for($i=0;$i<count($servi); $i++){

      echo('
           
           <option value="'.$servi[$i]["id_tipo_servicio"].'">'.$servi[$i]["tipo_servicio"].'</option>
         
        
');

  }

?>  
</select>
    </div>
    
  </div>

       <div class="form-group">
  <label for="">Detalle</label>
  <textarea class="form-control" placeholder="Describa brevemente su problema..." id="" name="detalle-publi" rows="7" required=""></textarea>
</div>
   
    
 <?php
          echo ('<input type="hidden" placeholder="'.$_SESSION["id"].'" name="id-usuario" value="'.$_SESSION["id"].'">');   
?>
    <?php echo '<input type="hidden" value="'.$_SESSION['tipo'].'" id="tipo-usuario-post">' ?>
    <input type="hidden" name="op" value="publicarServicio">
    <input type="hidden" name="tipo-publicacion" id="tipo-publicacion-post" value="">
  
    <button type="submit" class="btn btn-success float-right mb-5 btn-publicar-servicio" id="btn-publicar-servicio">Publicar problema</button>



</form>

 <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: {lat: 40.731, lng: -73.997}
        });
        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;
     
        document.getElementById('submit').addEventListener('click', function() {
          geocodeLatLng(geocoder, map, infowindow);
        });
      }
  
      function geocodeLatLng(geocoder, map, infowindow) {

            if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var lat = pos.lat;
            var lng = pos.lng;
             console.log(lat);
             console.log(lng);
                var latlng = {lat,lng};
        geocoder.geocode({'location': latlng}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              map.setZoom(18);
              var marker = new google.maps.Marker({
                position: latlng,
                map: map
              });
           
              infowindow.setContent(results[0].formatted_address);
             var direccion = results[0].formatted_address;
             console.log(direccion);
             $('#direccion-post').val(direccion);
             $('#lat-publicacion').val(lat);
             $('#lng-publicacion').val(lng);  

              infowindow.open(map, marker);
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });

          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
         



        }
        
      
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7fk_KsJga2Jye7iDyCvC0qTapAidpEyM&callback=initMap">
    </script>
</div>
   
<!-- FIN DEL FORMULARIO -->


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php require_once 'componentes/footer.php';?>




</body>

</html>
