<!DOCTYPE html>
<html lang="en">
<head>
	
<?php require_once("componentes/links.php");
      require_once("componentes/scripts.php");

  ?>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Servy 2</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

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

				<div class="container">
					<h1 class="text-center mt-2"> Servicios - todos</h1>
					<hr class="featurette-divider">
				</div>
<div class="container">

		<div class="row text-center">

				<div class="col col-sm" >
					<select class="custom-select">
				 	 <option selected>seleccionar servicio</option>
				 	 <option>1</option>
				 	 <option>2</option>
				 	 <option>3</option>
					</select>
				</div>

			<div class="col col-sm">		
        		 <input type="date" class="form-control" id="" name="">
         	 </div>


         	<div class="col col-sm">
         		<div class="form-inline">
 				 <i class="fas fa-search" aria-hidden="true"></i>
  					<input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="buscar">
				</div>

         	</<div></div>

		</div>
	</div>	


					<div class="container mt-2"><!-- INICIO LISTA DE SERVICIOS-->
						<div class="list-group">

						 <?php 
                require_once("modelos/modelo-publicaciones.php");

                  $publi = publicaciones::getPublicaciones();


                  if(count($publi)==0){

                      echo('<div class="alert alert-primary" role="alert">
                                          No hay publicaciones 
                                  </div>');

                  }else{
                      var_dump($publi);
              //         for ($i=0; $i<count($publi); $i++){

              //           echo (' <a href="#!" class="list-group-item list-group-item-action flex-column align-items-start mt-3">
              //   <div class="d-flex w-100 justify-content-between">
              //     <h5 class="mb-2">'.$publi[$i]["titulo_publicacion"].'</h5>
              //     <small>tipo de servicio</small>
              //     <small> fecha</small>
              //   </div>
              //   <p class="mb-2">DESCRIPCION: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat blanditiis sint mollitia quam veniam quod harum, sequi, animi, voluptatum impedit ex maxime cumque magni eius ipsam facere dolorum laudantium laborum.</p>
              //   <small>Pedido por : Usuario</small>
              // </a>');


              //         }
                  }


              ?>


				</div>
			</div><!-- FINLISTA DE SERVICIOS-->


				<div class="text-center mb-3"><button class="btn btn-primary"> ver mas</button></div>
</div>


	


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->




<!-- Footer -->
<?php require_once 'componentes/footer.php' ?>
<!-- Footer -->

	
</body>
</html>


