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
              <a class="nav-link" href="#">Cerrar sesion<i class="fas fa-user-circle"></i></a>
            </li>
          </ul>
        </div>
      </nav>

				<div class="container">
					<h1 class="text-center mt-2"> Moderacion - usuarios</h1>
					<hr class="featurette-divider">
				</div>
 <div class="container">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nombre de usuario</th>
                <th>Email</th>
                <th>Tipo usuario</th>
                <th>Estado</th>
                <th>Perfil</th>
                <th>Acciones</th>
            </tr>
        </thead>
         <tbody>

<?php 

require_once("modelos/modelo-usuarios.php");

$user= usuarios::getUsuarios();
if(count($user)){

  for($i=0;$i<count($user); $i++){

  echo(' <tr>
                <td>'.$user[$i]["nombre_usuario"].'</td>
                <td>'.$user[$i]["email_usuario"].'</td>
                <td>'.$user[$i]["tipo_usuario"].'</td>
                 <td>'.$user[$i]["estado_usuario"].'</td>


                <td>
                    <button class="btn btn-sm btn-info">ver perfil</button>
                </td>

                <td>     
                         <button class="btn btn-success  btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Moderar</button>
                        <div class="dropdown-menu">
                        <button class="dropdown-item btn-sancionar-usuario" type="button" value="'.$user[$i]["id_usuario"].'"><i class="fas fa-ban"></i> Sancionar</button>
                        <button class="dropdown-item btn-quitar-sancion-usuario" value="'.$user[$i]["id_usuario"].'"><i class="fas fa-lock-open"></i> Quitar sancion</button>
                        </div>
               </td>
               
            </tr>
    ');

  }


}


 ?>

         
       
           
           
        </tbody>
        <tfoot>
            <tr>
                <th>Nombre de usuario</th>
                <th>Email</th>
                <th>Tipo usuario</th>
                <th>Perfil</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
          </div>


	           


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->





<div id="resumen-maestro-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header mdb-color">

                <h4 id="titulo-loginregistro " class="text-center text-white"> Usuario</h4>

                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>

            </div>

            <div class="modal-body mx-auto text-center ">
                   

                        <div class="row">
                           
                           <div class="col">
                             
                           <img src="img/placeholder.png" width="100" class="rounded" />

                           </div> 

                            <div class="col text-left">
                              Nombre: usuario
                              correo: usuario@usuario.com
                            </div>

                            <div class="col text-left">
                              Telefono: +569 123423424

                            </div>



                        </div>

                    <div class="mt-3"> <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal" >Cerrar</button>
                     <button type="button" class="btn btn-sm btn-info" data-dismiss="modal" >ver detalles</button></div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php require_once 'componentes/footer.php' ?>
<!-- Footer -->


	
</body>
</html>
