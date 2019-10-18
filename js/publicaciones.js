$(document).ready(function(){

	console
	$(".btn-sancionar-publicacion").on("click",sancionarPublicacion)



	function sancionarPublicacion(event){
				var id = $(this).val();
				console.log(id);


		$.ajax({

			method: 'POST',
			url: 'controladores/publicaciones-controller.php',
			data: 'op=sancionarPublicacion&id='+id




		})
	}




})