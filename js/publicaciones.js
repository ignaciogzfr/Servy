$(document).ready(function(){

	$(".btn-sancionar-publicacion").on("click",sancionarPublicacion)
	$(".btn-quitar-sancion-publicacion").on("click",quitarSancionPublicacion)
	$('#form-publicar-servicio').on('submit',publicarServicio)


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

	function publicarServicio(event){
			event.preventDefault()
			var datos = new FormData(this);
			console.log(datos.get('id-usuario'));
		/*	$.ajax({

				method: 'POST',
				url: 'controladores/publicaciones-controller.php'
				data: datos,




			})*/


	}


})
