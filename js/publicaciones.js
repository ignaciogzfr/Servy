//listener de js que se cargan como componente en las paginas que se necesiten
$(document).ready(function(){
	console.log("Se carga correctamente publicaciones.js");
	//Se referencia al elemento que debe ser escuchado, el metodo de como se escucha y la funcion a activar si se eschucha 
	$(".btn-sancionar-publicacion").on("click",sancionarPublicacion);
	$(".btn-quitar-sancion-publicacion").on("click",quitarSancionPublicacion);
	$('#form-publicar-servicios').on('submit',publicarServicio);
	$('#btn-aceptar-publicacion').on('click',aceptarPublicacion);
	$('#btn-aceptar-publicacion-invitado').on('click',aceptarPublicacionInvitado);
	$('#btn-servicio-solucionado').on('click',solucionarServicio);
	$('#btn-servicio-solucionado-invitado').on('click',solucionarServicioInvitado);
	$('#form-denunciar-p').on('submit',denunciarPublicacion);
	$('#select-tipo-servicio').select2({
	width : 'resolve'
	})

	function sancionarPublicacion(event){
	        var id = $(this).val();
    		//al obtener el formulario completo su valor siempre es el id al cual se le
			//asigna a una varaible local
	        console.log(id);

			//validamos de que el campo que se toma sea correcto
			//Llamada a el controlador que arrojara una respuesta y segun lo retornado se realizaran acciones en la 
			//pagina
	        $.ajax({

	            method: 'POST',
	            url:'controladores/publicaciones-controller.php',
	            data: 'op=sancionarPublicacion&id='+id,
	            success:function(r){
           		if(r=='ok'){
           			swal({
           				title: 'La publicacion ha sido sancionada con exito',
           				icon : 'success'
           			}).then(()=>{
           				location.reload()
           			})
           		}
	            }
	        })

	    }
	function solucionarServicio(event){
		console.log('click');	
		var id = $(this).val();
		console.log(id);
		$.ajax({

			method: 'POST',
			url:'controladores/publicaciones-controller.php',
			data: 'op=solucionarServicio&id='+id,
				success:function(response){
					console.log(response);
	        		if(response!=''){
	        			swal({
						title : '¡Todo listo!',
						text : 'Este servicio se ha solucionado',
						icon : 'success'
					}).then(function(){
						location.reload();
					})
	        		}
	        	}


		})

	}

	function solucionarServicioInvitado(event){
		console.log('click');	
		var id = $(this).val();
		console.log(id);
		$.ajax({

			method: 'POST',
			url:'controladores/publicaciones-controller.php',
			data: 'op=solucionarServicioInvitado&id='+id,
				success:function(response){
					console.log(response);
	        		if(response!=''){
	        			swal({
						title : '¡Todo listo!',
						text : 'Este servicio se ha solucionado',
						icon : 'success'
					})
					
	        		}
	        	}


		})

	}

	function aceptarPublicacion(event){

		var id = $(this).val();
		var idp = $('#id-publicacion').val();
		console.log(idp);
		console.log(id);

		$.ajax({
			method: 'POST',
			url:'controladores/publicaciones-controller.php',
			data: 'op=aceptarPublicacion&id='+id+'&idp='+idp,
				success:function(response){
					console.log(response);
	        		if(response!=''){
	        			swal({
						title : '¡Has aceptado la publicacion!',
						text : 'Ponte en contacto con tu cliente :)',
						icon : 'success'
					}).then(()=>{
						location.href="servicios-a-realizar.php"
					})
					
	        		}
	        	}


		})

	}

	function aceptarPublicacionInvitado(event){

		var id = $(this).val();
		var idp = $('#id-publicacion').val();
		console.log(idp);
		console.log(id);

		$.ajax({

			method: 'POST',
			url:'controladores/publicaciones-controller.php',
			data: 'op=aceptarPublicacionInvitado&id='+id+'&idp='+idp,
				success:function(response){
					console.log(response);
	        		if(response!=''){
	        			swal({
						title : '¡Has aceptado la publicacion!',
						text : 'Ponte en contacto con tu cliente :)',
						icon : 'success'
					}).then(function(){
						location.href="servicios-a-realizar.php"
					})
					
	        		}
	        	}


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
			data: 'op=quitarSancionPublicacion&id='+id,
			success:function(response){
			if(response='ok'){
				swal({
					title: 'Todo hecho',
					text: 'La publicacion ha sido modificada',
					icon: 'info'
				}).then(()=>{
					location.reload();
				})
			}
			}
		

		})
	}
	//funcion en proceso
	function publicarServicio(event){
		console.log("Se llama a la funcion publicar");
				event.preventDefault();
				var datos = new FormData(this);
			$.ajax({
				method: 'POST',
				url: 'controladores/publicaciones-controller.php',
				data: datos,
				cache: false,
    			contentType: false,
    			processData: false,
    			
				success:function(response){
					console.log(response);
	        		if(response='ok'){
	        			swal({
						title : '¡Tu publicacion ha sido enviada con exito!',
						icon : 'success'
						}).then(function(){
							location.href = 'servicios-pendientes.php'
						})
	        		}else{
	        			swal({
						title : '¡Ha ocurrido un herror porfavor ingrese nuevamente!',
						icon : 'success'
						}).then(function(){
							location.href = 'servicios-pendientes.php'
						})

	        		}
	        	}

			})
			//fin caso insertar
	}


	function denunciarPublicacion(e){
	event.preventDefault();
	var datos = $(this).serialize();
	$.ajax({

		method: 'POST',
		url: 'controladores/publicaciones-controller.php',
		data: datos,
		success:function(response){
			if(response=='ok'){
			swal({
				title : 'La denuncia se ha realizado con exito',
				text : 'Solo queda esperar que un administrador observe los detalles',
				icon : 'success'
			})
			}		
		}

	})
	}



})
