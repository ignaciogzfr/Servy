<!DOCTYPE html>
<html lang="en">
<head>
	 <link rel="stylesheet" href="styles/styles.css">
<!-- Gooogle Fonts API-->
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet"> 
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.3/css/mdb.min.css" rel="stylesheet">


<!-- Toastr Alerts CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body style="font-family: 'Noto Sans JP', sans-serif; background-color: #fafafa;">

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="mdb-color  text-white border-right" id="sidebar-wrapper">
      <div class="sidebar-heading mdb-color">Menu</div>
      <div class="list-group list-group-flush text-white">
        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-1 text-white"> <img src="img/placeholder.png" width="30" class="rounded-circle" /> usuario</a>
        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Servicios</a>
        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Informacion</a>
        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-1 text-white">Contactanos</a>
        <a href="#" class="list-group-item list-group-item-action mdb-color lighten-2 text-white ">Cerrar sesion <i class="fas fa-power-off"></i></a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

     <nav class="navbar navbar-expand-lg navbar-dark main-color border-bottom">
        <button class="btn btn-primary" id="menu-toggle" ><i class="fas fa-bars"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item mr-4">
              <a class="nav-link" href="#">Ayuda</a>
            </li>
            <li class="nav-item mr-4">
              <a class="nav-link" href="#">Servicios</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">iniciar sesion<i class="fas fa-user-circle"></i></a>
            </li>
          </ul>
        </div>
      </nav>


			<div class="container text-center mt-2">	<h1> Registrate</h1> <hr class="featurette-divider"></div>

				<div class="container">
				 <div class="tab-content">

                		<nav>
		                    <div class="nav nav-tabs nav-fill mb-4">

		                    <a class="nav-item nav-link" id="nav-login" data-toggle="tab" href="#tab-cliente">Cliente</a>

		                    <a class="nav-item nav-link" id="nav-registro" data-toggle="tab" href="#tab-maestro">Maestro</a>

		                    </div>

                		</nav>

   <div class="tab-pane fade active show mx-auto w-75" id="tab-cliente">

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
					<div class="container">
						 
					    <label for="inputAddress">contraseña</label>
					    <input type="password" class="form-control"  placeholder="contraseña">
					 

					</div>
						



					<hr class="featurette-divider">
					 
					  <button type="button" class="btn btn-success" id="btn-enviarservicios">Registrarme</button>
					  
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
					   		<label for="inputAddress">contraseña</label>
					    	<input type="password" class="form-control"  placeholder="contraseña">
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
					 
					  <button type="button" class="btn btn-success" id="btn-enviarservicios">Registrarme</button>
					  
					</form>	
			</div>
		
	</div>
  </div>
</div>

    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->




<!-- Footer -->
<footer class="page-footer mdb-color font-small lighten-1 text-white">

  <!-- Copyright -->
  <div class="row text-center">
    
  <div class="col col-md-3 my-2"><img src="img/placeholder.png" width="90"></div>
  <div class="col col-md-3 mt-3">OJO, Servy provee un servicio de atencion, la aplicacion no se hace responsable si los tecnicos no cumplen satisfactoriamente con el servicio requerido.</div>
  <div class="col col-md-3 mt-2">Links</div>

  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<!-- Menu Toggle Script -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.3/js/mdb.min.js"></script>
<!-- Toastr Alerts JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>
</html>