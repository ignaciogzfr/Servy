<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Servy 2</title>
  <?php require_once 'componentes/links.php'; ?>
  <?php require_once 'componentes/sidenav.php'; ?>
</head>

<body style="font-family: 'Noto Sans JP', sans-serif; background-color: #fafafa;">

    <div id="page-content-wrapper">

<?php require_once 'componentes/navbar.php'; ?>

				<div class="container">
					<h1 class="text-center mt-2"> Perfil</h1>
					<hr class="featurette-divider">
				</div>

      
      <div class="container  w-75">

        <div class="row">
          
            <div class="col">
               <img src="img/placeholder.png" width="150" class="rounded" />
            </div>
            <div class="col">
            <p>Nombre:</p>
            <p>Email:</p>
            <p>Telefono:</p>
            <p>Direccion:</p>

            </div>
            <div class="col">
             <input type="text" class="form-control mb-2" placeholder="usuario" disabled>
              <input type="text" class="form-control mb-2" placeholder="correo@correo" disabled>
              <input type="text" class="form-control mb-2" placeholder="+56912345678" disabled>
              <input type="text" class="form-control mb-2" placeholder="Direccion 123" disabled>

            </div>

        </div>

            <div class="container text-right pb-4"><button class="btn btn-md btn-primary"><i class="fas fa-edit"></i> Editar</button></div>

      </div>
	           


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->




<?php require_once 'componentes/footer.php'; ?>
<?php require_once 'componentes/scripts.php' ?>
</body>
</html>