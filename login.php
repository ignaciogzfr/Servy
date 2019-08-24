<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<?php require_once 'componentes/links.php' ?>
</head>

<body>
	<?php require_once 'componentes/navbar.php'; ?>
	<div class="container p-5">
		
		<div class="titulo text-center">
		<h1>Iniciar Sesión</h1>
		</div>
	<form class="text-center container py-5">
	

		<div class="form-group">
		<input class="form-control col-md-6" type="text" placeholder="CORREO">
		</div>

		<div class="form-group">
		<input class="form-control col-md-6" type="password" placeholder="contraseña">
		</div>

		<button class="btn btn-primary">Login</button>

	</form>
	</div>
</body>
	<?php require_once 'componentes/footer.php' ?>
</html>