<!DOCTYPE html>
<html lang="es">
<head>
	


<?php require_once("componentes/links.php");


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

<body>

 <?php require_once 'componentes/sidenav.php' ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">

<?php require_once 'componentes/navbar.php' ?>

				<div class="container">
					<h1 class="text-center mt-2"> Moderacion - Publicaciones</h1>
					<hr class="featurette-divider">
				</div>


         <div class="container">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nombre de usuario</th>
                <th>Servicio</th>
                <th>Tipo de publicacion</th>
                <th>Estado</th>
                <th>ver</th>
                <th>Acciones</th>
            
            </tr>
        </thead>
         <tbody>

<?php 

require_once("modelos/modelo-publicaciones.php");

$publi = Publicaciones::getPublicaciones();
if(count($publi)){

  for($i=0;$i<count($publi); $i++){
  $den = Publicaciones::getDenunciasPublicacion($publi[$i]["id_publicacion"]);

  echo(' <tr>
                <td>'.$publi[$i]["nombre_usuario"].'</td>
                <td>'.$publi[$i]["tipo_servicio"].'</td>
                <td>'.$publi[$i]["tipo_publicacion"].'</td>
                <td>'.$publi[$i]["estado_publicacion"].'</td>
');

   if (count($den)==0) {
    echo(' <td>
                    <a class="btn btn-sm btn-info" href="vista-publicacion.php?publicacion='.$publi[$i]['id_publicacion'].'" target="_blank" >Ver publicacion</a>
                </td>');
  }else{
    echo(' <td>
                    <a class="btn btn-sm btn-info" href="vista-publicacion.php?publicacion='.$publi[$i]['id_publicacion'].'" target="_blank" >Ver publicacion </a><span class="badge badge-danger ml-2" >'.count($den).'</span>
                </td>');
  }

             echo('
                <td>     
                   <button class="btn btn-success  btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Moderar</button>

                    <div class="dropdown-menu">
                    <button class="dropdown-item btn-sancionar-publicacion" type="button" value="'.$publi[$i]["id_publicacion"].'"><i class="fas fa-ban"></i> Sancionar</button>
                    
                    <button class="dropdown-item btn-quitar-sancion-publicacion" value="'.$publi[$i]["id_publicacion"].'"><i class="fas fa-lock-open"></i> Quitar sancion</button>
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
                <th>Servicio</th>
                <th>Tipo de publicacion</th>
                <th>ver</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
          </div>
       


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /d-flex wrapper -->


<?php require_once 'componentes/footer.php' ?>


	
</body>
<?php require_once 'componentes/scripts.php' ?>
</html>
