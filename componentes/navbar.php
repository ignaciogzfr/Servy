<nav class="navbar navbar-expand-lg navbar-dark main-color sticky-top">
  <button class="btn btn-primary" id="menu-toggle" ><i class="fas fa-bars"></i></button>
<?php if($_SERVER['REQUEST_URI']=='/Servy/index.php'){
  echo ' <button class="btn btn-warning" data-target="#modal-pedir-grua" data-toggle="modal"><i class="fas fa-wrench" style="font-size: 15px;"></i> <i class="fas fa-truck-pickup" style="font-size: 20px;"></i></button>';
  require_once 'modal-pedir-grua.php';
} ?>
  <?php 
        @session_start();
        //Al cargar este componente se valida si eisten datos en la variable sesion, la que se asigna cuando se realiza un login o registro
        if (isset($_SESSION['id'])){
          require_once 'navbar-usuario.php';
        }else{
          require_once 'navbar-invitado.php';
        } 
  ?>
</nav>
<!--componentes-->
<?php require_once 'login-modal.php'; ?>
