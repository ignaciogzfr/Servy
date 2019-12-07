<div id="modal-pedir-grua" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header mdb-color">

                <h4 id="titulo-loginregistro " class="text-center text-white"> Pedir una grua</h4>

                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>

            </div>

            <div class="modal-body  text-center">

            <form method="POST"  autocomplete="off" id="form-pedir-grua">
                      <h5 class="text-center"> Direccion</h5>

                          
                                <div class="container" id="map"></div>
                         <div id="floating-panel">
                          <input id="latlng" type="text" hidden="" value="">
                          <input id="submit" type="button" class="btn btn-secondary btn-sm" value="obtener mi ubicación">
                         </div>

                     
                          <div class="form-group">
                         <input type="text" class="form-control" name="nombre" id="nombre-grua" placeholder="Nombre" required="" pattern="^\b(?!.*?\s{2})[A-Za-z ]{1,60}\b$" >
                <script>
                </script>
                          </div>
                                <div class="form-group">
                         <input type="text" class="form-control" name="fono" id="fono-grua"  pattern="^[9876543]\d{7}$"  placeholder="+569 11223344" required="">
                          </div>
                          <div class="form-group">
                         <textarea name="descripcion" class="form-control" id="detalle-grua" cols="30" rows="3" maxlength="200" required="" placeholder="Breve descripcion"></textarea>
                          </div>

                        <div class="form-group">      <select id="select-tipo-vehiculo" required="" name="tipo-vehiculo" class="form-control">
                                      <option selected disabled>tipo de automovil...</option>
                              <?php 

                                require_once 'modelos/modelo-gruas.php';

                                $gruas = Gruas::getTipoVehiculo();

                                for($i = 0;$i<count($gruas);$i++){

                                  echo '<option  value="'.$gruas[$i]["id_vehiculo"].'" >'.$gruas[$i]["tipo_vehiculo"].'</option>';
                                }

                               ?>
                              
                              
                            </select></div>
                      
                      <div class="aler alert-danger" type="" id="error">   </div>
                             
    
                       <input type="hidden"  name="direccion" class="form-control" id="direccion-post" value=""  placeholder="direccion">
                      <input type="hidden" name="lat" value="" id="lat-publicacion" value="">
                      <input type="hidden" name="lng" value="" id="lng-publicacion" value="">
                      <input type="hidden" name="op" value="pedirGrua">

                      <button type="submit" id="btn-pedir-grua" class="btn btn-sm btn-secondary pt-2"  >Enviar</button>
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