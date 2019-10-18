$(document).ready(function(){


	$(".btn-sancionar-usuario").on("click",sancionarUsuario)
	$(".btn-quitar-sancion-usuario").on("click",quitarSancionUsuario)


	function sancionarUsuario(event){
				var id = $(this).val();
				console.log(id);


		$.ajax({

			method: 'POST',
			url: 'controladores/usuarios-controller.php',
			data: 'op=sancionarUsuario&id='+id




		})
	}

	function quitarSancionUsuario(event){

		var id = $(this).val();
		console.log(id);

		$.ajax({

			method: 'POST',
			url:'controladores/usuarios-controller.php',
			data: 'op=quitarSancionUsuario&id='+id


		})
	}




})