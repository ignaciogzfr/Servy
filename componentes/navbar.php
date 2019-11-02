<nav class="navbar navbar-expand-lg navbar-dark main-color sticky-top">
  <button class="btn btn-primary" id="menu-toggle" ><i class="fas fa-bars"></i></button>



  <button class="btn btn-warning" data-target="#modal-pedir-grua" data-toggle="modal"><i class="fas fa-wrench" style="font-size: 15px;"></i> <i class="fas fa-truck-pickup" style="font-size: 20px;"></i></button>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></button> 
  <?php 
        @session_start();
        if (isset($_SESSION['id'])){
          require_once 'navbar-usuario.php';
        }else{
          require_once 'navbar-invitado.php';
        } 
  ?>
</nav>
<?php require_once 'modal-pedir-grua.php'; ?>
