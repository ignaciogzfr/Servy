$(document).ready(function(){

	$(".btn-sancionar-publicacion").on("click",sancionarPublicacion)
	$(".btn-quitar-sancion-publicacion").on("click",quitarSancionPublicacion)
	$('#form-publicar-servicios').on('submit',publicarServicio);
	$('#form-publicar-servicio-invitado').on('submit',publicarServicioInvitado);
	$('#btn-aceptar-publicacion').on('click',aceptarPublicacion);
	$('#btn-aceptar-publicacion-invitado').on('click',aceptarPublicacionInvitado);
	$('#btn-servicio-solucionado').on('click',solucionarServicio);
	$('#btn-servicio-solucionado-invitado').on('click',solucionarServicioInvitado);
	$('#select-tipo-servicio').select2({
	width : 'resolve'
})

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
					})
					
	        		}
	        	}


		})

	}



	function sancionarPublicacion(event){
				var id = $(this).val();
				console.log(id);


		
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
				if($('#tipo-usuario-post')=='Cliente'){
					datos.set('tipo-publicacion-post','Demanda')
				}else if($('#tipo-usuario-post')=='Maestro'){
					
				}
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
						title : '¡Tu publicación ha sido enviada con éxito!',
						text : 'Ahora solo hay que esperar que se apruebe y que un Maestro la tome.',
						icon : 'success'
					})
					
	        		}
	        	}
			})
	}


		function publicarServicioInvitado(event){
			event.preventDefault();
				var datos = new FormData(this);
				console.log(datos.get('op'));
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
						title : '¡Tu publicación ha sido enviada con éxito!',
						text : 'Ahora solo hay que esperar que se apruebe y que un Maestro la tome.',
						icon : 'success'
					})
					
	        		}else{

	        					swal({
						title : 'oops, algo salio mal.',
						text : 'Por favor rellene todos los campos.',
						icon : 'error'
					})


	        		}
	        	}
			})
		
	}


})
