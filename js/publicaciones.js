$(document).ready(function(){

	$(".btn-sancionar-publicacion").on("click",sancionarPublicacion)
	$(".btn-quitar-sancion-publicacion").on("click",quitarSancionPublicacion)
	$('#form-publicar-servicios').on('submit',publicarServicio);
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
				if($('#tipo-usuario-post')=='Cliente'){
					datos.set('tipo-publicacion','Demanda')
				}else if($('#tipo-usuario-post')=='Maestro'){
					datos.set('tipo-publicacion','Oferta')
				}
			$.ajax({

				method: 'POST',
				url: 'controladores/publicaciones-controller.php',
				data: datos,
				cache: false,
    			contentType: false,
    			processData: false,
				success:function(response){
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


})
