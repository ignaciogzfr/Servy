<!DOCTYPE html>
<html lang="es">
<head>

<?php require_once("componentes/links.php");?>
<?php require_once 'componentes/verificar-admin.php'; ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Servy 2</title>

</head>

<body>
<?php require_once 'componentes/sidenav.php' ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
<?php require_once 'componentes/navbar.php' ?>

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
                <th>Perfil/denuncias</th>
                <th>Acciones</th>
            </tr>
        </thead>
         <tbody>

<?php 

require_once("modelos/modelo-usuarios.php");

$user= usuarios::getUsuarios();



if(count($user)){

  for($i=0;$i<count($user); $i++){
  $den = usuarios::getDenunciasUsuario($user[$i]["id_usuario"]);

  echo('
    <tr>
      <td>'.$user[$i]["nombre_usuario"].'</td>
      <td>'.$user[$i]["email_usuario"].'</td>
      <td>'.$user[$i]["tipo_usuario"].'</td>
      <td>'.$user[$i]["estado_usuario"].'</td>
');

      if (count($den)==0) {
    echo('
    <td>
    <a class="btn btn-sm btn-info" href="vista-usuario.php?id='.$user[$i]['id_usuario'].'" target="_blank" >Ver perfil</a>
    </td>');
      }else{
    echo('
    <td>
    <a class="btn btn-sm btn-info" href="vista-usuario.php?id='.$user[$i]['id_usuario'].'" target="_blank" >Ver perfil </a><span class="badge badge-danger ml-2" >'.count($den).'</span>
    </td>');
      }
        echo(' 
    <td>     
      <button class="btn btn-success  btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Moderar</button>

      <div class="dropdown-menu">
      <button class="dropdown-item btn-sancionar-usuario" type="button" value="'.$user[$i]["id_usuario"].'"><i class="fas fa-ban"></i> Sancionar</button>
      <button class="dropdown-item btn-quitar-sancion-usuario" value="'.$user[$i]["id_usuario"].'"><i class="fas fa-lock-open"></i> Quitar sancion</button>
      </div>

    </td>
                   
    </tr>');
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

<!-- Footer -->
<?php require_once 'componentes/footer.php' ?>
<!-- Footer -->


	
</body>
<?php require_once 'componentes/scripts.php' ?>
</html>
