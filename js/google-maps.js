
function Miposicion() {
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


        function initMap(){
              var  directionsDisplay = new google.maps.DirectionsRenderer();
              var  directionsService = new google.maps.DirectionsService();
              var geocoder = new google.maps.Geocoder();
              var infowindow = new google.maps.InfoWindow();
             
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
                      
                        var route = result.routes[0];
                        var duration = 0;

                           route.legs.forEach(function (leg){
                            duration += leg.duration.value;
                               });

                            var duracion = duration/60;
                            duracion = duracion.toFixed(1);
                            duracion = duracion.toString();

                             var tiempoestimado = ("El tiempo estimado de llegada es de "+duracion.substr(0,2) + " Minutos y " + duracion.substr(3) + " segundos");
                             console.log(tiempoestimado);

                             $('#h6-tiempo-aprox').text("");
                             $('#h6-tiempo-aprox').text(tiempoestimado);

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





  



