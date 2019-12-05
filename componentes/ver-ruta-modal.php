
         <div id="modal-ver-ruta" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header mdb-color">

                <h4 id="titulo-loginregistro " class="text-center text-white"> Ver ruta</h4>

                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>

            </div>

            <div class="modal-body  text-center">
                     
                        <div id="map" class="container text-center">
                            <div class="container"><h6 class=" text-center alert-warning w-100 py-2">No se ha podido cargar el mapa, recargue la página e intente nuevamente</h6></div>
                        </div>
                          
                          <h6 class=" text-center alert-primary w-100 py-2 mt-3" id="h6-tiempo-aprox"> </h6>

                         <?php require_once 'componentes/scripts.php' ?>
            </div>
        </div>
    </div>
</div>

<style>#map{
        height: 400px;
        width: 350px;
      }</style>