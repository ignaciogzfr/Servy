<div class="modal fade" id="modal-resumen-usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Resumen usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        
        </button>
      </div>
      <div class="modal-body">

          <?php
              require_once("modelos/modelo-publicaciones.php");

            $publi = publicaciones::verPublicacion($_GET["publicacion"]);

           echo (' 

<div class="text-center"><img src="'.$publi[0]['foto_perfil'].'" alt="img/placeholder-person.jpg" width="150" height="150" class="rounded-circle  my-2"></div>

<ul class="list-group mt-3">
  <li class="list-group-item active">
    <div class="md-v-line"></div><i class="fas fa-user mr-4 pr-3"></i>'.$publi[0]["nombre_usuario"].'
  </li>
  <li class="list-group-item">
    <div class="md-v-line"></div><i class="fas fa-envelope mr-5"></i>'.$publi[0]["email_usuario"].'
  </li>
  <li class="list-group-item">
    <div class="md-v-line"></div><i class="fas fa-mobile-alt mr-5"></i>'.$publi[0]["fono_usuario"].'
  </li>
 
</ul>
          '); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
   
      </div>
    </div>
  </div>
</div>