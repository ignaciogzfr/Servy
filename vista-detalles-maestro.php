<!DOCTYPE html>
<html lang="en">
<head>

		
<?php require_once("componentes/links.php");
      require_once("componentes/scripts.php");
  ?>

	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/logo.png" />
	<title>Detalles del maestro</title>
</head>
<body style="background-color: #45526e;">

<div class="container bg-white my-4" style="min-height: 700px">
	<?php require_once 'modelos/modelo-usuarios.php';
		  $user = Usuarios::getPerfilUsuario($_GET['id']);
	 ?>
	<div class="container text-center w-70" style="padding-top:70px;">
		<h3> Usuario</h3>
		<hr class="featurette-divider">
	</div>
		

		<div class="row text-center w-70 mx-auto">
			
		<div class="col">
			<h6><i class="fas fa-phone"></i> Contactos del Maestro:</h6>

			

		</div>

		<div class="col"> Email: <?php echo $user[0]['email_usuario']; ?></div>


		<div class="col"><h6>Telefono: +56 9 <?php echo $user[0]['fono_usuario']; ?> </h6></div>

		</div>
		

		<div class="container text-center w-70 mt-4">
			<hr class="featurette-divider">
			<h3> -Informacion extra-</h3>

			<div class="row mt-4">
				
				<div class="col"><h6>Certificados</h6></div>
				<div class="col"><h6>Experiencias</h6></div>
			</div>
				
			<div class="row border-top	">
				
				 <div class="col mt-4">
				 		
				 	<ul class="list-group list-group-flush">
				 		  <?php $certificados = Usuarios::getCertificadosMaestro($_GET['id']);
				 		  $experiencia = Usuarios::getExperienciaMaestro($_GET['id']);
				 		  for ($i=0; $i <count($certificados) ; $i++){
				 		  	echo '<li class="list-group list-group-item bg-transparent">'.$certificados[$i]['nombre_certificado'].'</li>';
						  } ?>
				 </div>

				 <div class="col mt-4 border-left">
				 	<p><?php echo $experiencia[0]['detalle_experiencia']; ?></p>
				 </div>
			</div>
				

		</div>
		<div class="text-right mt-4"><a class="btn btn-md btn-secondary mt-4 float-right" href="vista-servicios.php"><i class="fas fa-arrow-left"></i> volver</a></div>
			
</div>



	
</body>
</html>
