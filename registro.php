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

			<form action="modelos/modelo-registro.php" method="POST">

				<div class="form-row form-group">

					<div class="col-md-4">
						<label for="inputNombre">Tu Nombre</label>
						<input type="text" class="form-control"  placeholder="Nombre" name="nombre-registro">
					</div>
					<div class="col-md-8">
						<label for="inputDir">Correo Electrónico</label>
						<input type="email" class="form-control"  placeholder="ejemplo@gmail.com" name="mail-registro">
					</div>

				</div>
				<div class="form-row form-group">

					<div class="col-md-4">
						<label for="inputPass">Contraseña</label>
						<input id="inputPass" class="form-control" type="password"   placeholder="Nadie podrá ver" name="pass-registro">
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
					 
					  <button class="btn btn-success float-right" type="submit" name="tipo-registro" id="btn-registro-cliente" value="Cliente">Registrarme</button>
					 
					</form>										
		</div>	

			<div class="tab-pane fade mx-auto w-75" id="tab-maestro">
				<form action="modelos/modelo-registro.php" method="GET">

					  <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="nombre-maestro">Tu Nombre</label>
					      <input type="email" class="form-control"  placeholder="Nombre" name="mail-registro">
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

				
						 <div class="form-group">
					   		<label for="pass-maestro">Contraseña</label>
					    	<input type="password" class="form-control"  placeholder="Nadie podrá ver" name="pass-registro">
					 	</div>

						<div class="form-group">
						 <label for="serv-maestro">Tipo de servicio</label>
						      <select id="inputState" class="form-control" name="serv-registro">
						        <option selected>Seleccionar...</option>
						        <option>...</option>
     						 </select>
						</div>

						<div class="form-group">
  							<label for="exp-maestro">Experiencias</label>
 							 <textarea class="form-control" id="exampleFormControlTextarea3" rows="7" name="exp-registro"></textarea>
						</div>


						 <div class="form-group">
					    <label for="cert-maestro">Certificados</label>
					    <input type="text" class="form-control"  placeholder="Titulado en ..." name="certificados-registro">
					  </div>

					<div class="container">
						<div class="row">
							
							<div class="col text-center">
								 	<img src="img/placeholder.png" width="100" class="rounded">
							</div>


							<div class="col"> 
								<div class="custom-file mt-4">
								  <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="fp-registro">
								  <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
								</div>
							</div>

						</div>
					</div>
					
						



					<hr class="featurette-divider">
					 
					  <button type="submit" class="btn btn-success float-right" id="btn-registro-maestro" name="tipo-registro" value="Maestro">Registrarme</button>
					  
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