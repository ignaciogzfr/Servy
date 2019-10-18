<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'componentes/links.php'; ?>
	<meta charset="UTF-8">
	<title>Registro</title>
</head>
<body style="font-family: 'Noto Sans JP', sans-serif; background-color: #fafafa;">


	<?php require_once 'componentes/sidenav.php'; ?>		

    <!-- Page Content -->
    <div id="page-content-wrapper">

	<?php require_once 'componentes/navbar.php'; ?>


	<div class="container text-center mt-2">
		<h1> Registrate</h1>
		<div class="alert alert-dark">
		<h6>Recuerda seguir las siguientes reglas al ingresar informacion:</h6>
		<h6 class="text-primary">Los campos que contienen el simbolo * son obligatorios.</h6>
		<h6 class="text-primary">Para iniciar sesión, necesitamos que tu correo electronico sea autentico</h6>
		<h6 class="text-primary">Las contraseñas deben tener un minimo de 6 caracteres, recomendamos uso de Mayusculas y numeros</h6>

		</div>
	 <hr class="featurette-divider"></div>
		<div class="tab-content">

    		<nav>
                <div class="nav nav-tabs nav-fill mb-4">

                <a class="nav-item nav-link" data-toggle="tab" href="#tab-cliente">Cliente</a>

                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-maestro">Maestro</a>

                </div>

    		</nav>

  <div class="tab-pane fade  show mx-auto w-75" id="tab-cliente">

			<form action="modelos/modelo-registro.php" method="POST">

				<div class="form-row form-group">

					<div class="col-md-4">
						<label for="inputNombre">Tu Nombre</label>
						<input type="text" class="form-control"  placeholder="Nombre" name="nombre-registro">
					</div>
					<div class="col-md-8">
						<label for="inputDir">Correo Electrónico</label>
						<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control"  placeholder="ejemplo@gmail.com" name="mail-registro">
					</div>

				</div>
				<div class="form-row form-group">

					<div class="col-md-4">
						<label for="inputPass">Contraseña</label>
						<input id="inputPass" class="form-control" type="password" pattern=".{6,}"  placeholder="Nadie podrá ver" name="pass-registro">
					</div>

					<div class="col-md-8">
							<label for="inputFono">Numero telefonico</label>
							<input type="text" class="form-control" placeholder="+56 9 12345678" name="fono-registro">
					</div>

				</div>
<br>
<hr>

				<div class="container">
					<div class="row">

						<div class="col text-center">
						<img src="img/placeholder.png" width="100" class="rounded" />
						</div>


						<div class="col"> 
							<div class="custom-file mt-4">
							<input type="file" class="custom-file-input" id="customFileLang" lang="es" name="fp-registro" value="img/placeholder.png">
							<label class="custom-file-label" for="customFileLang">Foto de Perfil</label>
							</div>
						</div>

					</div>
				</div>
						<br>
						<hr>
				<div class="container">
					<label for="inputDir">Dirección</label>
					<input id="inputDir" type="text" class="form-control"  placeholder="Direccion Siempreviva #321 Pobl. Avenida 123" name="dir-registro">
				</div>
						



					<hr class="featurette-divider">
					 
					  <button class="btn btn-success float-right mb-5" type="submit" name="tipo-registro" id="btn-registro-cliente" value="Cliente">Registrarme</button>
					 
					</form>										
		</div>	

		<div class="tab-pane active show fade mx-auto w-75" id="tab-maestro">
				<form action="modelos/modelo-registro.php" method="GET">
					
					<div class="form-group">
						<label for="mail-registro">Correo Electrónico</label>
						<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control"  placeholder="ejemplo@gmail.com" name="mail-registro">						
					</div>


					  <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="nombre-maestro">Tu Nombre</label>
					      <input type="text" class="form-control"  placeholder="Nombre" name="nombre-registro">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="fono-maestro">Numero telefonico</label>
					      <input type="text" class="form-control" placeholder="+569 11223344" name="fono-registro">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="dir-maestr">Direccion</label>
					    <input type="text" class="form-control"  placeholder="Avenida Siempreviva 2001" name="dir-registro">
					  </div>

					<div class="row">

						<div class="col-md-5">
						 <div class="form-group">
					   		<label for="pass-maestro">Contraseña</label>
					    	<input type="password" class="form-control"  placeholder="Nadie podrá ver" name="pass-registro">
					 	</div>

						<div class="form-group">
						 <label for="serv-maestro">Servicio(s) que proporciona</label>
						      <select id="inputState" class="form-control" name="serv-registro" multiple="">
						      	<?php 
						      	require_once 'modelos/modelo-servicios.php';
						      	$tipos = Servicios::getServicios();
						      	for ($i=0; $i<count($tipos); $i++){ 
						      		echo('<option value="'.$tipos[$i]["id_tipo_servicio"].'">'.$tipos[$i]["tipo_servicio"].'');
						      	}
						      	 ?>
     						 </select>
						</div>

						</div>
					
					<div class="col-md-7 mt-1">
						<h6 class="text-center">Foto de Perfil</h6>
						<div class="container row mt-5">
							
							<div class="col text-center">
								 	<img src="img/placeholder.png" width="100" class="rounded img">
							</div>


							<div class="col"> 
								<div class="custom-file mt-3">
								  <input type="file" class="custom-file-input" id="fp-registro" lang="es" name="fp-registro">
								  <label class="custom-file-label" for="fp-registro">Seleccionar Archivo</label>
								</div>
							</div>
					</div>

					</div>

				</div>

			 	<div class="form-group">
					    <label for="cert-maestro">Certificados</label>
					    <div class="container row">
					    <input id="cert-maestro" type="text" class="form-control col-md-11 mt-2"  placeholder="Titulado en..." name="certificados-registro">
						<button class="btn btn-success"><i class="fas fa-plus-circle" style="font-size: 20px"></i></button>
						</div>
			  	</div>

				<div class="form-group mt-5">
  							<label for="exp-maestro">Experiencias</label>
 							 <textarea class="form-control" id="exampleFormControlTextarea3" rows="4" name="exp-registro" placeholder="Describa las labores que ha completado, años de experiencia, datos extra, etc..."></textarea>
				</div>



					
						



					<hr class="featurette-divider">
					 
					  <button type="submit" class="btn btn-success float-right mb-5" id="btn-registro-maestro" name="tipo-registro" value="Maestro">Registrarme</button>
					  
					</form>	
			</div>
		
		</div>
	</div>

</div>





<!-- Footer -->
<?php require_once 'componentes/footer.php'; ?>
<?php require_once 'componentes/scripts.php' ?>


</body>
</html>