<!DOCTYPE html>
<html lang="en">
<head>
	<!--titulo y configuracion de la pagina-->
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/logo.png" />
	<title>Ingreso a la pagina</title>
	<!--titulo y configuracion de la pagina-->
	<?php require_once 'componentes/links.php' ?>
	<?php require_once 'componentes/verificar-sesion-login.php'; ?>
</head>

<body>

	<?php require_once 'componentes/navbar.php'; ?>
	<!--formulario login-->
	<form id="form-login" action="modelos/modelo-login.php" method="POST">
		<div class="container text-center mt-5">

					<div class="col-12 col-md-6 offset-md-3 bg-white py-3 px-4 card">

					<h1 class="py-4">Iniciar Sesión</h1>
					
					<div class="form-group text-left">
						<label for="mail-login">Correo Electronico</label>
						<input id="mail-login" name="mail"class="form-control" type="text" placeholder="E-Mail" pattern="[a-z0-9._%+-]+@([a-z0-9.-].{1,20})+(\.[a-z].{1,7})" required>
					</div>
					
					<div class="form-group text-left">
						<label for="pass-login">Contraseña</label>
						<input id="pass-login" name="pass"class="form-control" type="password" placeholder="Contraseña" required pattern="^[a-zA-Z0-9\d]{6,20}$">	
					</div>

					<div class="text-center mt-2">
						<button type="submit" class="btn btn-primary btn-block">Ingresar</button>
					</div>	
					<h6 class="alert alert-info mt-2">No tienes una cuenta?<a href="registro.php"> ¡Registrate!</a></h6>
					<!--si se redirige a traves de get un mensaje de error se creara un recuadro alertando al usuario-->
					<?php if (isset($_GET['error'])) {
						echo '<hr>';
						echo ("<h6 class='alert-danger w-100 py-2'>Ocurrió un error intentando iniciar sesión. Por favor, reingrese su mail/contraseña.</h6>");
					}
					?>		
			
			</div>
		</div>
	</form>
	<!-- fin formulario login-->

	
</body>
</html>