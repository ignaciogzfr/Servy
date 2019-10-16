<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<?php require_once 'componentes/links.php' ?>
</head>

<body class="bg-light">
	<?php require_once 'componentes/navbar.php'; ?>

	<form id="form-login" action="modelos/modelo-login.php" method="POST">
	<div class="container text-center mt-5">
		
		


		<div class="col-12 col-md-6 offset-md-3 bg-white py-3 px-4 card">

			
			<h1 class="py-4">Iniciar Sesión</h1>
			
			<div class="form-group text-left">
				<label for="mail-login">Correo Electronico</label>
				<input id="mail-login" name="mail"class="form-control" type="text" placeholder="E-Mail" required>
			</div>
			
			<div class="form-group text-left">
				<label for="pass-login">Contraseña</label>
				<input id="pass-login" name="pass"class="form-control" type="password" placeholder="Contraseña" required>	
			</div>

			<div class="text-center mt-2">
				<button type="submit" class="btn btn-primary btn-block">Login</button>
			</div>	

			<?php if (isset($_GET['error'])) {
				echo '<hr>';
				echo ("<h6 class='alert-danger w-100 py-2'>Ocurrió un error intentando iniciar sesión. Por favor, reingrese su mail/contraseña.</h6>");
			}else{
				echo 'NO';
			} 
			?>		
			
		</div>
		

	</form>

		
	</div><!--./container -->
	
</body>
</html>