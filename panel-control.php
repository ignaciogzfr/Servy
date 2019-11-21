<!DOCTYPE html>
<html lang="en">
<head>
	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="shortcut icon" href="img/logo.png" />
  <title>Panel de control</title>
<?php require_once 'componentes/links.php'; ?>
</head>

<body>
<?php require_once 'componentes/verificar-admin.php'; ?>
<?php require_once 'componentes/sidenav.php'; ?>
    <!-- /#sidebar-wrapper -->

    
    
    <!-- navegador superior-->
  <?php require_once 'componentes/navbar.php' ?>
    <!-- fin navegador superior-->

        <!-- Page Content -->
        <div id="page-content-wrapper">
				<div class="container">
					<h1 class="text-center my-3"> Panel de control</h1>
					<hr class="featurette-divider">
				</div>

      
      <div class="container text-center w-75">

        <div class="row">
          
            <div class="col-md-5">
              <?php echo '<h6>'.$_SESSION['nombre'].'<p class="text-success">[Moderador]</p></h6>'; ?>
              <?php echo '<img src="'.$_SESSION['fp'].'" width="150" height="150" class="rounded-circle">' ?>
            </div>


            <div class="col-md-7">
                <div class="btn-group-vertical">
                <?php echo '<a class="btn btn-md btn-primary" href="perfil.php?id='.$_SESSION['id'].'"><i class="fas fa-edit"></i> Editar mi perfil</a>'; ?>
                <a class="btn btn-md btn-primary" href="moderacion-usuarios.php" target="_blank">Buscar usuarios</a>
                <a class="btn btn-md btn-primary" href="moderacion-publicaciones.php" target="_blank">Buscar publicaciones</a>
              </div>

            </div>

        </div>



      </div>
	           


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
<?php require_once 'componentes/footer.php' ?>
<?php require_once 'componentes/scripts.php'; ?>
	
</body>
</html>
