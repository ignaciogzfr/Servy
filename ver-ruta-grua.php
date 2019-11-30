<?php 

	echo (' <input type="hidden" name="lat" value="'.$_GET["lat"].'" id="lat-publicacion">
   					 <input type="hidden" name="lng" value="'.$_GET["lng"].'" id="lng-publicacion">');



 ?>
<?php require_once 'componentes/scripts.php';
	require_once'componentes/links.php' ?>

<style>#map{
        height: 100%;
        width: 70%;
      }</style>

<div class="text-center" style="background-color: #45526e;">
    <button class="btn btn-success btn-lg mt-4" id="submit">ver ruta <i class="fas fa-map-marked-alt"></i></button>
 <div id="map" class="container text-center"></div>
                          
		
</div>	
            <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7fk_KsJga2Jye7iDyCvC0qTapAidpEyM&callback=initMap">
    </script> 


