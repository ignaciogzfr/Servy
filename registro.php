<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'componentes/links.php'; ?>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/logo.png" />
	<title>Registro</title>
</head>
<body>

<?php 
@session_start();
if(isset($_SESSION['id'])){
	echo '<script>location.href="index.php"</script>';
} ?>
    
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
		<h6 class="text-primary">El número de telefono asume que está utilizando un telefono movil, o "Smartphone", asi que por defecto es +56 9 (Numero)</h6>
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
						<input id="mail-registro-cliente" type="email" pattern="[a-z0-9._%+-]+@([a-z0-9.-].{2,20})+(\.[a-z].{1,7})$" class="form-control"  placeholder="ejemplo@gmail.com" name="mail-registro" required="" maxlength="60" minlength="5">
					</div>

					<div class="col-md-5">
						<label for="pass-registro-cliente">Contraseña *</label>
						<input id="pass-registro-cliente" class="form-control" type="password" placeholder="************" pattern="^^[a-zA-Z0-9\d]{6,20}$"  name="pass-registro" required="" maxlength="20" minlength="6">
					</div>



				</div>
				<div class="form-row form-group">

					<div class="col-md-6">
						<label for="nombre-registro-cliente">Tu Nombre *</label>
						<input id="nombre-registro-cliente" type="text" class="form-control" pattern="^\b(?!.*?\s{2})[A-Za-z ]{1,25}\b$" placeholder="Nombre" name="nombre-registro" required="" minlength="3" maxlength="25">
					</div>

					<div class="col-md-6">
							<label for="fono-registro-cliente">Numero telefonico *</label>
							<input id="fono-registro-cliente" type="tel" pattern="^[9876543]\d{7}$" class="form-control" maxlength="8" placeholder="1234 5678" style="font-style:italic" name="fono-registro" required="">
					</div>

				</div>
				<div class="form-group">
					<label for="dir-registro-cliente">Dirección *</label>
					<input id="dir-registro-cliente" type="text" class="form-control" placeholder="Calle siempre viva #752" name="dir-registro" required   maxlength="80" minlength="5">
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
						<input id="mail-registro-maestro" type="email" pattern="[a-z0-9._%+-]+@([a-z0-9.-].{2,20})+(\.[a-z].{1,7})$" class="form-control"  placeholder="ejemplo@gmail.com" name="mail-registro" required="" maxlength="40" minlength="5">						
					</div>


					  <div class="form-row">

						 <div class="form-group col-md-3">
					   		<label for="pass-maestro">Contraseña *</label>
					    	<input type="password" id="pass-maestro" pattern="^[a-zA-Z0-9\d]{6,20}$" class="form-control" name="pass-registro" required="" maxlength="30" minlength="6" placeholder="************">
					 	</div>
					    <div class="form-group col-md-9">
					      <label for="nombre-maestro">Tu Nombre *</label>
					      <input id="nombre-maestro" type="text" class="form-control"  placeholder="Nombre"
					      name="nombre-registro" required=""  minlength="3" maxlength="25" pattern="[a-zA-Z/s]{1,25}">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="dir-maestro">Direccion *</label>
					    <input id="dir-maestro" type="text" id="dir-maestro" placeholder="Calle siempre viva #752" class="form-control" maxlength="80" minlength="5" name="dir-registro" required="">
					  </div>

					<div class="row">
							
						<div class="form-group col-md-6">
							<label for="fono-maestro">Numero telefonico *</label>
							<input id="fono-maestro" type="text" class="form-control" placeholder="99999999" pattern="^[9876543]\d{7}$" maxlength="8" style="font-style:italic" name="fono-registro" required>
						</div>


						<div class="form-group col-md-6">
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

			 	<div class="form-group">
					    <label for="cert-maestro">Certificados</label>
					    <div class="container row">
					    <input id="cert-maestro" type="text" class="form-control col-md-11 mt-2"  placeholder="Ingrese nombre del titulo....." name="certificados-registro" maxlength="40">
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
 							 <textarea class="form-control" id="exampleFormControlTextarea3" rows="4"  maxlength="200" cols="5" name="exp-registro" placeholder="Describa las labores que ha completado, años de experiencia, datos extra, etc..." required=""></textarea>
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
<?php require_once 'componentes/scripts.php'; ?>


</body>
</html>
