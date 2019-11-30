//listener de js que se cargan como componente en las paginas que se necesiten
$(document).ready(function(){
	//Se referencia al elemento que debe ser escuchado, el metodo de como se escucha y la funcion a activar si se eschucha 
	$(".btn-sancionar-publicacion").on("click",sancionarPublicacion)
	$(".btn-quitar-sancion-publicacion").on("click",quitarSancionPublicacion)
	$('#form-publicar-servicios').on('submit',publicarServicio);
	$('#form-denunciar-p').on('submit',denunciarP);


$('#select-tipo-servicio').select2({
	width : 'resolve'
})

	//funciones de publicaciones
	function sancionarPublicacion(event){
				//al obtener el formulario completo su valor siempre es el id al cual se le
				//asigna a una varaible local
				var id = $(this).val();
				//validamos de que el campo que se toma sea correcto
				console.log(id);
		//Llamada a el controlador que arrojara una respuesta y segun lo retornado se realizaran acciones en la 
		//pagina
		$.ajax({
			method: 'POST',
			url: 'controladores/publicaciones-controller.php',
			data: 'op=sancionarPublicacion&id='+id
		})
	}

	function quitarSancionPublicacion(event){
		//al obtener el formulario completo su valor siempre es el id al cual se le
		//asigna a una varaible local
		var id = $(this).val();
		//validamos de que el campo que se toma sea correcto
		console.log(id);
		//Llamada a el controlador que arrojara una respuesta y segun lo retornado se realizaran acciones en la 
		//pagina
		$.ajax({
			method: 'POST',
			url:'controladores/publicaciones-controller.php',
			data: 'op=quitarSancionPublicacion&id='+id
		})
	}
	//funcion en proceso
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
