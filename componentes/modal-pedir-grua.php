<div id="modal-pedir-grua" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header mdb-color">

                <h4 id="titulo-loginregistro " class="text-center text-white"> Pedir una grua</h4>

                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>

            </div>

            <div class="modal-body  text-center">

            <form method="POST"  autocomplete="off" id="form-pedir-grua">
                      <h5 class="text-center"> direccion</h5>

                          
                                <div class="container" id="map"></div>
                               

                                      


                         <div id="floating-panel">
                          <input id="latlng" type="text" hidden="" value="">
                          <input id="submit" type="button" class="btn btn-secondary btn-sm" value="obtener mi ubicación">
                         </div>

                          <div class="form-group">
                         <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                          </div>
                                <div class="form-group">
                         <input type="text" class="form-control" name="fono" placeholder="Telefono">
                          </div>
                          <div class="form-group">
                         <textarea name="descripcion" class="form-control" id="" cols="30" rows="3" placeholder="Breve descripcion"></textarea>
                          </div>

                        
                            <select id="select-tipo-vehiculo" name="tipo-vehiculo" class="form-control">
                                      <option selected require="">tipo de automovil...</option>
                              <?php 

                                require_once 'modelos/modelo-gruas.php';

                                $gruas = Gruas::getTipoVehiculo();

                                for($i = 0;$i<count($gruas);$i++){

                                  echo '<option value="'.$gruas[$i]["id_vehiculo"].'" >'.$gruas[$i]["tipo_vehiculo"].'</option>';
                                }

                               ?>
                              
                              
                            </select>
                             

                      <input type="hidden"  name="direccion" class="form-control" id="direccion-post" value="">
                      <input type="hidden" name="lat" value="" id="lat-publicacion" value="">
                      <input type="hidden" name="lng" value="" id="lng-publicacion" value="">
                      <input type="hidden" name="op" value="pedirGrua">
                      <button type="submit" class="btn btn-sm btn-secondary pt-2"  >Enviar</button>
                     </form>
                    <?php require_once 'componentes/scripts.php' ?>
  
   
            </div>
        </div>
    </div>
</div>

<style> #map{
        height: 400px;
        width: 350px;
      }

    </style>