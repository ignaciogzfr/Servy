<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'componentes/links.php'; ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img/logo.png" />
  <title>Mis servicios pendientes</title>
</head>

<body>
<?php require_once 'componentes/verificar-sesion.php'; ?>
<?php require_once 'componentes/sidenav.php'; ?>
<!--Contenido de la pagina -->
    <div id="page-content-wrapper">

<?php require_once 'componentes/navbar.php'; ?>

		<div class="container">
		<?php if($_SESSION['tipo']=='Maestro'){
			echo '<h1 class="text-center mt-2"> Mis Servicios | Pedidos</h1>';
		}else{
			echo '<h1 class="text-center mt-2"> Mis Publicaciones';
		} ?>
							
			<hr class="featurette-divider">
		</div>


<div class="container">

	<div class="container mt-2"><!-- INICIO LISTA DE SERVICIOS-->
		<div class="list-group">

		<?php 
		
		require_once 'modelos/modelo-usuarios.php';
		require_once 'modelos/modelo-publicaciones.php';
		if(isset($_GET['tipo'])){
			switch ($_GET['tipo']) {
				case 'Oferta':
				$publi = Usuarios::getMisPublicacionesOferta($_SESSION['id']);	
					break;
				case 'oferta':
				$publi = Usuarios::getMisPublicacionesOferta($_SESSION['id']);	
					break;
				case 'Demanda':
				$publi = Usuarios::getMisPublicacionesDemanda($_SESSION['id']);					
				break;
				case 'demanda':
				$publi = Usuarios::getMisPublicacionesDemanda($_SESSION['id']);
				break;
			}
		}else{
			$publi = Usuarios::getMisPublicaciones($_SESSION['id']);
		}
		if(count($publi)>0){

			for($i=0;$i<count($publi);$i++){

			$denuncias = Publicaciones::getDenunciasPublicacion($publi[$i]['id_publicacion']);
			if($publi[$i]['tipo_publicacion']=='Demanda'){
			if(count($denuncias)>0){
			echo (' <a class="list-group-item list-group-item-action flex-column align-items-start mt-3 card" href="vista-publicacion.php?publicacion='.$publi[$i]['id_publicacion'].'" target="_blank">

							    <div class="d-flex w-100 justify-content-between">
							      <h5 class="mb-2">'.$publi[$i]["titulo_publicacion"].'</h5>
							      <small>Tipo de Servicio: '.$publi[$i]["tipo_servicio"].'</small>
							      <small>Fecha y hora de Publicacion: '.$publi[$i]["fecha_hora_publicacion"].'</small>
							    </div>
							    <p class="mb-2 text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias asperiores nostrum optio nam praesentium obcaecati sequi repellendus corrupti, cum temporibus culpa explicabo. Nobis reprehenderit tenetur accusantium repellendus ipsum esse minus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus odio animi esse, sequi maxime recusandae similique. Expedita deleniti nemo adipisci at eveniet molestiae molestias accusantium fuga, eum, perferendis ipsam fugiat.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus aperiam, aliquam beatae, deleniti possimus iure velit architecto excepturi quaerat ipsa nemo doloremque laborum? Laborum commodi odio, magni dicta facilis amet.'.$publi[$i]["detalle_publicacion"].'</p>
							    <small>Ofertas: <button class="btn btn-info btn-sm" data-target="#resumen-maestro-modal" data-toggle="modal">0</button></small>
							    <div><small>'.count($denuncias).'</small></div>

							  </a>');		
			}else{
			echo (' <a class="list-group-item list-group-item-action flex-column align-items-start mt-3 card" href="vista-publicacion.php?publicacion='.$publi[$i]['id_publicacion'].'" target="_blank">

							    <div class="d-flex w-100 justify-content-between">
							      <h5 class="mb-2">'.$publi[$i]["titulo_publicacion"].'</h5>
							      <small>Tipo de Servicio: '.$publi[$i]["tipo_servicio"].'</small>
							      <small>Fecha y hora de Publicacion: '.$publi[$i]["fecha_hora_publicacion"].'</small>
							    </div>
							    <p class="mb-2 text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique saepe nostrum doloremque exercitationem, facere officiis ducimus error nihil, delectus dicta suscipit dolorum praesentium aspernatur inventore, qui quod facilis tempore a.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia labore dignissimos dolore in, fugiat harum quaerat cum adipisci iste aliquid provident facilis, consectetur distinctio sapiente nostrum. Asperiores a obcaecati ipsam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae quasi, rerum, officiis inventore eos, asperiores aliquam labore, commodi facilis nulla temporibus. Quibusdam, atque, cupiditate? Necessitatibus est esse, ratione fuga natus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus inventore laboriosam laudantium reprehenderit in magnam voluptates modi. Officia minus, ea molestias necessitatibus modi, tenetur sint nam quae qui provident sed.'.$publi[$i]["detalle_publicacion"].'</p>
							    
							    <small>Ofertas:<button class="btn btn-info btn-sm" data-target="#resumen-maestro-modal" data-toggle="modal">0</button></small>
							    <div><small>Espacio Denuncias</small></div>
							    

							  </a>');				
			}



		}else{
			if(count($denuncias)>0){
			echo (' <a class="list-group-item list-group-item-action flex-column align-items-start mt-3 card" href="vista-publicacion.php?publicacion='.$publi[$i]['id_publicacion'].'" target="_blank">

							    <div class="d-flex w-100 justify-content-between">
							      <h5 class="mb-2">'.$publi[$i]["titulo_publicacion"].'</h5>
							      <small>Tipo de Servicio: '.$publi[$i]["tipo_servicio"].'</small>
							      <small>Fecha y hora de Publicacion: '.$publi[$i]["fecha_hora_publicacion"].'</small>
							    </div>
							    <p class="mb-2 text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias asperiores nostrum optio nam praesentium obcaecati sequi repellendus corrupti, cum temporibus culpa explicabo. Nobis reprehenderit tenetur accusantium repellendus ipsum esse minus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus odio animi esse, sequi maxime recusandae similique. Expedita deleniti nemo adipisci at eveniet molestiae molestias accusantium fuga, eum, perferendis ipsam fugiat.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus aperiam, aliquam beatae, deleniti possimus iure velit architecto excepturi quaerat ipsa nemo doloremque laborum? Laborum commodi odio, magni dicta facilis amet.'.$publi[$i]["detalle_publicacion"].'</p>
							    <div><small>'.count($denuncias).'</small></div>

							  </a>');		
			}else{
			echo (' <a class="list-group-item list-group-item-action flex-column align-items-start mt-3 card" href="vista-publicacion.php?publicacion='.$publi[$i]['id_publicacion'].'" target="_blank">

							    <div class="d-flex w-100 justify-content-between">
							      <h5 class="mb-2">'.$publi[$i]["titulo_publicacion"].'</h5>
							      <small>Tipo de Servicio: '.$publi[$i]["tipo_servicio"].'</small>
							      <small>Fecha y hora de Publicacion: '.$publi[$i]["fecha_hora_publicacion"].'</small>
							    </div>
							    <p class="mb-2 text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique saepe nostrum doloremque exercitationem, facere officiis ducimus error nihil, delectus dicta suscipit dolorum praesentium aspernatur inventore, qui quod facilis tempore a.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia labore dignissimos dolore in, fugiat harum quaerat cum adipisci iste aliquid provident facilis, consectetur distinctio sapiente nostrum. Asperiores a obcaecati ipsam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae quasi, rerum, officiis inventore eos, asperiores aliquam labore, commodi facilis nulla temporibus. Quibusdam, atque, cupiditate? Necessitatibus est esse, ratione fuga natus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus inventore laboriosam laudantium reprehenderit in magnam voluptates modi. Officia minus, ea molestias necessitatibus modi, tenetur sint nam quae qui provident sed.'.$publi[$i]["detalle_publicacion"].'</p>
							    <div><small>Espacio Denuncias</small></div>
							    

							  </a>');				
			}
		}


		}

		echo ('<div class="text-center mb-3"><button class="btn btn-primary"> ver mas</button></div>');

		}else{

			echo ('<h6 class=" text-center alert-success w-100 py-2">No tiene servicios pendientes.</h6>');
		}
		
	 ?>	

							
			</div>
	</div><!-- FINLISTA DE SERVICIOS-->

</div>



    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->



<?php require_once 'componentes/footer.php'; ?>

<?php require_once'componentes/scripts.php' ?>

<?php require_once  'componentes/modal-resumen-maestro.php' ?>



</body>
</html>
