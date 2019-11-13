<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'componentes/links.php'; ?>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/logo.png" />
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
		<h6 class="text-primary">Las contraseñas deben tener un minimo de 6 caracteres, recomendamos uso de Mayusculas y numeros. No se permiten espacios ni caracteres especiales(!"#$%-_ etc...)</h6>
		<h6 class="text-primary">Si eres un Maestro/Profesional, necesitamos minimo 1 tipo de servicio que ofrezca.</h6>

		</div>
	 <hr class="featurette-divider"></div>
		<div class="tab-content">

    		<nav>
                <div class="nav nav-tabs nav-fill mb-4">

                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-cliente">Cliente</a>

                <a class="nav-item nav-link" data-toggle="tab" href="#tab-maestro">Maestro</a>

                </div>

    		</nav>
    		<!--inicio form cliente-->
  <div class="tab-pane active fade  show mx-auto w-75" id="tab-cliente" >

			<form id="form-registro-cliente" autocomplete="off" method="POST">

				<div class="form-row form-group">

					<div class="col-md-7">
						<label for="mail-registro-cliente">Correo Electrónico *</label>
						<input type="mail-registro-cliente" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control"  placeholder="ejemplo@gmail.com" name="mail-registro" required="">
					</div>

					<div class="col-md-4">
						<label for="pass-registro-cliente">Contraseña *</label>
						<input id="pass-registro-cliente" class="form-control" type="password" pattern="^(?!.* ).{6,20}$"  name="pass-registro" required="" maxlength="20" >
					</div>



				</div>
				<div class="form-row form-group">

					<div class="col-md-6">
						<label for="nombre-registro-cliente">Tu Nombre *</label>
						<input id="nombre-registro-cliente" type="text" class="form-control"  placeholder="Nombre" name="nombre-registro" required="">
					</div>

					<div class="col-md-6">
							<label for="fono-registro-cliente">Numero telefonico *</label>
							<input id="fono-registro-cliente" type="text" pattern="[0-9]" class="form-control" placeholder="99999999" style="font-style:italic" maxlength="8" name="fono-registro" required="">
					</div>

				</div>
				<div class="form-group">
					<label for="dir-registro-cliente">Dirección *</label>
					<input id="dir-registro-cliente" type="text" class="form-control" name="dir-registro" required="">
				</div>
				<div class="containe mt-3">
					<h6 class="text-center">Foto de Perfil</h6>
					<div class="row mt-5">

						<div class="col-md-2 text-center">
						<img src="img/placeholder.png" width="100" class="rounded" id="fp-cliente-preview" />
						</div>


						<div class="col-md-10"> 
							<div class="custom-file mt-4">
							<input type="file" class="custom-file-input fp-registro" id="fp-registro-cliente" lang="es" name="fp-registro" value="img/placeholder.png" accept="image/png,image/jpeg,image/jpg">
							<label class="custom-file-label" for="fp-registro-cliente">Seleccionar Imagen</label>
							</div>
						</div>

					</div>

				</div>
				<br>
				<hr>
						
 					  <input type="hidden" name="op" value="registrarUsuario">
					  <input type="hidden" class="tipo-registro" name="tipo-registro" value="Cliente">
					  <button class="btn btn-success float-right mb-5" type="submit" id="btn-registro-cliente">Registrarme</button>

					</form>										
		</div>	
		<!--termino form Cliente  -->











		<!--inicio de form maestro-->
		<div class="tab-pane fade mx-auto w-75" id="tab-maestro">
				<form id="form-registro-maestro" method="POST" autocomplete="off">
					
					<div class="form-group">
						<label for="mail-registro-maestro">Correo Electrónico *</label>
						<input id="mail-registro-maestro" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control"  placeholder="ejemplo@gmail.com" name="mail-registro" required>						
					</div>


					  <div class="form-row">

						 <div class="form-group">
					   		<label for="pass-maestro">Contraseña *</label>
					    	<input type="password" id="pass-maestro" pattern="[0-9a-zA-Z_.-]*.{6,}" class="form-control" name="pass-registro" required>
					 	</div>
					    <div class="form-group col-md-6">
					      <label for="nombre-maestro">Tu Nombre *</label>
					      <input id="nombre-maestro" type="text" class="form-control"  placeholder="Nombre" name="nombre-registro" required>
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="dir-maestro">Direccion *</label>
					    <input id="dir-maestro" type="text" id="dir-maestro" class="form-control"  name="dir-registro" required>
					  </div>

					<div class="row">
							
					<div class="col-md-5">
						<div class="form-group">
							<label for="fono-maestro">Numero telefonico *</label>
							<input id="fono-maestro" type="text" class="form-control" placeholder="99999999" pattern="[0-9]" maxlength="8" style="font-style:italic" name="fono-registro" required>
						</div>


						<div class="form-group">
						 <label for="serv-maestro">Servicio(s) que proporciona</label>
						 
						      <select id="serv-maestro" class="form-control" name="serv-registro" multiple="" style="width:100%" required="">

						      	<option value="" disabled="">Puede escribir en la caja de texto para buscar</option>

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
								 	<img src="img/placeholder.png" width="100" class="rounded" id="fp-maestro-preview">
							</div>


							<div class="col"> 
								<div class="custom-file mt-3">
								  <input type="file" class="custom-file-input fp-registro" id="fp-registro-maestro" lang="es" name="fp-registro" accept="image/x-png,image/jpeg" value="img/placeholder.png">
								  <label class="custom-file-label" for="fp-registro-maestro">Seleccionar Imagen</label>
								</div>
							</div>
					</div>

					</div>
					</div>

			 	<div class="form-group">
					    <label for="cert-maestro">Certificados</label>
					    <div class="container row">
					    <input id="cert-maestro" type="text" class="form-control col-md-11 mt-2"  placeholder="Titulado en..." name="certificados-registro">
						<button type="button" class="btn btn-success btn-agregar-certificado"><i class="fas fa-plus-circle" style="font-size: 20px"></i></button>
						<div class="container">
							<ul id="lista-certificados-maestro">
								<!--listado de certificados -->
							</ul>
						</div>
						</div>
			  	</div>

				<div class="form-group mt-5">
  							<label for="exp-maestro">Experiencias</label>
 							 <textarea class="form-control" id="exampleFormControlTextarea3" rows="4" name="exp-registro" placeholder="Describa las labores que ha completado, años de experiencia, datos extra, etc..."></textarea>
				</div>



					<hr class="featurette-divider">
					 
					  <button type="submit" class="btn btn-success float-right mb-5" id="btn-registro-maestro">Registrarme</button>
					  <input type="hidden" name="op" value="registrarUsuario">
					  <input type="hidden" class="tipo-registro" name="tipo-registro" value="Maestro">
					</form>	

					<!-- termino form Maestro -->
			</div>
		</div>
	</div>
</div>

<!-- Footer -->
<?php require_once 'componentes/footer.php'; ?>
<?php require_once 'componentes/scripts.php' ?>


</body>
</html>