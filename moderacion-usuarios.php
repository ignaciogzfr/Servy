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
  <link rel="shortcut icon" href="img/logo.png" />
  <title>Moderacion de usuarios</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body style="font-family: 'Noto Sans JP', sans-serif; background-color: #fafafa;">

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php require_once('componentes/sidenav.php'); ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
    <!--navegador superior-->
    <?php require_once('componentes/navbar.php'); ?>
    <!--fin de navegador principal-->
    
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
                    <a class="btn btn-sm btn-info" href="perfil.php?id='.$user[$i]['id_usuario'].'" target="_blank" >Ver perfil</a>
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