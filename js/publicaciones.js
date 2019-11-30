$(document).ready(function(){

	$(".btn-sancionar-publicacion").on("click",sancionarPublicacion)
	$(".btn-quitar-sancion-publicacion").on("click",quitarSancionPublicacion)
	$('#form-publicar-servicios').on('submit',publicarServicio);
	$('#form-denunciar-p').on('submit',denunciarP);


$('#select-tipo-servicio').select2({
	width : 'resolve'
})


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
				event.preventDefault();
				var datos = new FormData(this);
				console.log(datos.get('lat'));
				console.log(datos.get('titulo-publi'));
			$.ajax({

				method: 'POST',
				url: 'controladores/publicaciones-controller.php',
				data: datos,
				cache: false,
    			contentType: false,
    			processData: false,
				success:function(response){
					console.log(response);
	        		if(response!=''){
	        			swal({
						title : '¡Tu publicacion ha sido enviada con excito!',
						text : 'Ahora solo hay que esperar que se apruebe y que un Maestro la tome.',
						icon : 'success'
					})
					.then(function(){
						location.href = 'index.php'
					})
	        		}
	        	}
			})
	}


	function denunciarP(e){
	event.preventDefault();
	var datos = $(this).serialize();
	console.log(datos);
	$.ajax({

		method: 'POST',
		url: 'controladores/publicaciones-controller.php',
		data: datos,
		success:function(response){
			console.log(response)
		}

	})
	}
})
