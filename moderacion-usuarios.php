<!DOCTYPE html>
<html lang="en">
<head>
	
<?php require_once("componentes/links.php");?>
<?php require_once 'componentes/verificar-admin.php'; ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/logo.png" />
  <title>Moderacion de usuarios</title>

 
</head>

<body>
<?php require_once 'componentes/sidenav.php' ?>

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
/*se importan los metodos del modelo de publicaciones y se crea un constructor de un metodo los resultados se almacenan en una variable que servira como una matriz*/
require_once("modelos/modelo-usuarios.php");
$user= usuarios::getUsuarios();
/*si existe almenos una publicacion o mas*/
if(count($user)){
  //para tupla en nuestra matriz se podra mostrar cada ves que se repita este ciclo
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
 <!-- sirve por si el usuario baja mucho y no puede destingir cual datos pertenece a cual fila-->
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

<!-- Footer -->
<?php require_once 'componentes/footer.php' ?>
<!-- Footer -->


	
</body>
<?php require_once 'componentes/scripts.php' ?>
</html>
