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
	 <hr class="featurette-divider"></div>
		<div class="tab-content">

    		<nav>
                <div class="nav nav-tabs nav-fill mb-4">

                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-cliente">Cliente</a>

                <a class="nav-item nav-link" data-toggle="tab" href="#tab-maestro">Maestro</a>

                </div>

    		</nav>

  <div class="tab-pane active fade  show mx-auto w-75" id="tab-cliente">

			<form>

				<div class="form-row form-group">

					<div class="col-md-4">
						<label for="inputNombre">Tu Nombre</label>
						<input type="text" class="form-control"  placeholder="Nombre">
					</div>
					<div class="col-md-8">
						<label for="inputDir">Correo Electrónico</label>
						<input type="email" class="form-control"  placeholder="ejemplo@gmail.com">
					</div>

				</div>
				<div class="form-row form-group">

					<div class="col-md-4">
						<label for="inputPass">Contraseña</label>
						<input id="inputPass" class="form-control" type="password"   placeholder="Nadie podrá ver">
					</div>

					<div class="col-md-8">
							<label for="inputFono">Numero telefonico</label>
							<input type="text" class="form-control" placeholder="+56 9 12345678">
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
							<input type="file" class="custom-file-input" id="customFileLang" lang="es">
							<label class="custom-file-label" for="customFileLang">Foto de Perfil</label>
							</div>
						</div>

					</div>
				</div>
						<br>
						<hr>
				<div class="container">
					<label for="inputDir">Dirección</label>
					<input id="inputDir" type="text" class="form-control"  placeholder="Direccion Siempreviva #321 Pobl. Avenida 123">
				</div>
						



					<hr class="featurette-divider">
					 
					  <button type="button" class="btn btn-success float-right" id="btn-enviarservicios">Registrarme</button>
					 
					</form>										
		</div>	

			<div class="tab-pane fade mx-auto w-75" id="tab-maestro">
				<form>

					  <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="inputEmail4">Tu Nombre</label>
					      <input type="email" class="form-control"  placeholder="Nombre">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="inputPassword4">Numero telefonico</label>
					      <input type="text" class="form-control" placeholder="+569 11223344">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputAddress">Direccion</label>
					    <input type="text" class="form-control"  placeholder="Avenida Siempreviva 2001">
					  </div>

				
						 <div class="form-group">
					   		<label for="inputAddress">Contraseña</label>
					    	<input type="password" class="form-control"  placeholder="Nadie podrá ver">
					 	</div>

						<div class="form-group">
						 <label for="inputState">Tipo de servicio</label>
						      <select id="inputState" class="form-control">
						        <option selected>Seleccionar...</option>
						        <option>...</option>
     						 </select>
						</div>

						<div class="form-group">
  							<label for="exampleFormControlTextarea3">Experiencias</label>
 							 <textarea class="form-control" id="exampleFormControlTextarea3" rows="7"></textarea>
						</div>


						 <div class="form-group">
					    <label for="">Certificados</label>
					    <input type="text" class="form-control"  placeholder="Titulado en ...">
					  </div>

					<div class="container">
						<div class="row">
							
							<div class="col text-center">
								 	<img src="img/placeholder.png" width="100" class="rounded" />
							</div>


							<div class="col"> 
								<div class="custom-file mt-4">
								  <input type="file" class="custom-file-input" id="customFileLang" lang="es">
								  <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
								</div>
							</div>

						</div>
					</div>
					
						



					<hr class="featurette-divider">
					 
					  <button type="button" class="btn btn-success float-right" id="btn-enviarservicios">Registrarme</button>
					  
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