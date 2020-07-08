<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta name="description" content="">
  	<meta name="author" content="">
	<link rel="shortcut icon" href="img/logo.png" />
	<title>Verifica tu email con nosotros</title>
	<?php require_once 'componentes/links.php'; ?>
	<!--sidenav div ini-->
	<?php require_once 'componentes/sidenav.php'; ?>
</head>
<body>
<div id="page-content-wrapper">
<?php require_once 'componentes/navbar.php' ?>
<!--alrededores-->

<!--inicio contenido pagina-->
<form id="form-confirmacion-mail" method="POST">
		<div class="container text-center mt-5">
					<div class="col-12 col-md-6 offset-md-3 bg-white py-3 px-4 card">
					<h1 class="py-4">Ingrese su correo electronico</h1>
					<br>
					<div class="form-group text-left">
						<h6 class="text-warning text-center">Los correos a verificados con exito no se podran cambiar en el perfil</h6>
						<br>	<br>
						<label for="mail-confirmacion">Correo</label>
						<input id="mail-confirmacion" name="mail-confirmacion"class="form-control" type="text" placeholder="xxxxxxx@gmail.com,xxxxxx@gmail.cl" pattern="[a-z0-9._%+-]+@([a-z0-9.-].{1,20})+(\.[a-z].{1,7})" required>
					</div>
					<?php

					echo'<div class="text-center mt-2">
						<input type="hidden" name="op" value="confirmarMail">
						<button  class="btn btn-primary"  data-target="#confirmacion-modal" data-toggle="modal" value='.$_SESSION['id'].'>Enviar</button>
						</div>'
					?>
				
					<!--si se redirige a traves de get un mensaje de error se creara un recuadro alertando al usuario-->
					<?php if (isset($_GET['error'])) {
						echo '<hr>';
						echo ("<h6 class='alert-danger w-100 py-2'>Ese email ya esta en uso</h6>");
					}elseif(isset($_GET['error2'])){
						echo '<hr>';
						echo ("<h6 class='alert-danger w-100 py-2'>El email no existe</h6>");

					}elseif (isset($_GET['error3'])) {
						echo '<hr>';
						echo ("<h6 class='alert-danger w-100 py-2'></h6>");
					}
					?>		
			
			</div>
		</div>
	</form>


<!--fin contenido pagina-->

<!--alrededores-->
</div>
<!--sidenav div end-->
</div>
</body>
<?php require_once 'componentes/footer.php' ?>
<?php require_once 'componentes/scripts.php' ?>
<?php require_once 'componentes/modal-confirmacionMail.php' ?>
</html>