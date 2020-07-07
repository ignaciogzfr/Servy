<div id="verificacion-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog pt-4 mx-auto">
        <div class="modal-content" style="height: 450px; width: 500px;">
                <!--titulo-->
                <div class="modal-header mdb-color text-center">
                <h3 id="titulo-loginregistro" class="text-white">Ingrese su codigo de activación</h3>
                </div>
                <!--inicio cuerpo modal-->
                 <div class="modal-body mt-3">
                    <!--crear un nuevo metodo en js/usuarios.js y ver si va a controladores, paraque verifique y compare con el modelo-->
                 <form  method="POST" id="form-numero-ver">
                      <div class="">
                         <div class="form-group">
                            <label for="numero-verificacion-modal"><h6>ingrese su codigo numerico que recibio por email</h6></label>
                            <input type="text" id="numero-verificacion-modal" class="form-control" placeholder="Correo" name="codigo" maxlength="5" required="" pattern="">
                        </div>
                            <div class="text-center mt-2">
                                <!--elimina $_SESION["codverificacion"] y devuelve al perfil -->
                                 <button type="submit" class="btn btn-primary btn-block">cancelar proceso </button>
                                 <!--el modelo obtendra el codigo de acceso haciendo una compáracion, si es el mismo el modelo/usuarios llamara a una funcion para ingresar el yyyyy que es para usuarios confirmados y se almacenara en $_SESSION["verificacion"] para que el sidenav no muestre el boton "verificar tu email"-->
                                 <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                            </div>      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>