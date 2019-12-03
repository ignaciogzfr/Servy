<div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog pt-4 mx-auto">
        <div class="modal-content" style="height: 450px; width: 500px;">

            <div class="modal-header mdb-color text-center">

                <h3 id="titulo-loginregistro" class="text-white">Inicia sesion</h3>

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>

            </div>

            <div class="modal-body mt-3">
                <form action="modelos/modelo-login.php" method="POST">
                      <div class="text-center">


                            <div class="form-group">
                            <label for="mail-login-modal"><h5>Correo electrónico</h4></label>
                            <input type="text" id="mail-login-modal" class="form-control" placeholder="Correo" name="mail" pattern="[a-z0-9._%+-]+@([a-z0-9.-].{1,20})+(\.[a-z].{1,7})">
                            </div>


                            <div class="form-group">
                            <label for="pass-login-modal"><h5>Contraseña</h4></label>
                            <input id="pass-login-modal" class="form-control mt-3" placeholder="contraseña" type="password" name="pass" pattern="^[a-zA-Z0-9\d]{6,20}$">
                            </div>
                            <button class="btn btn-success btn-md" type="submit">Iniciar</button>
                </form>
                            <br>
                        <h5>No tienes cuenta?</h5>
                        <h6><a href="registro.php" target="_blank">¡Registrate!</a></h6>
                      </div>
                      
            </div>
        </div>
    </div>
</div>
