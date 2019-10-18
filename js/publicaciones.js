$(document).ready(function(){


	$(".btn-sancionar-publicacion").on("click",sancionarPublicacion)
	$(".btn-quitar-sancion-publicacion").on("click",quitarSancionPublicacion)


	function sancionarPublicacion(event){
				var id = $(this).val();
				console.log(id);


		$.ajax({

			method: 'POST',
			url: 'controladores/publicaciones-controller.php',
			data: 'op=sancionarPublicacion&id='+id




		})
	}

	function quitarSancionPublicacion(event){

		var id = $(this).val();
		console.log(id);

		$.ajax({

			method: 'POST',
			url:'controladores/publicaciones-controller.php',
			data: 'op=quitarSancionPublicacion&id='+id


		})
	}




})