$(document).ready(function(){
	$('.lista-publicaciones').on('click','.card-resumen-maestro',cargarModalResumen)

	function cargarModalResumen(e){
		var id = $(this).attr('maestro');
		var publicacion = $(this).attr('publicacion')
		$.ajax({
			method : 'POST',
			url : 'controladores/usuarios-controller.php',
			data : 'op=getResumenMaestro&id='+id,
			datatype : 'json',
			success:function(r){
				var response = JSON.parse(r);
				var linkd = 'vista-detalles-maestro.php?id='+id
				var linkp = 'vista-publicacion.php?publicacion='+publicacion
				$('.nombre-resumen-maestro').html('Nombre: '+response[0]['nombre_usuario'])
				$('.fono-resumen-maestro').html('Telefono: +56 9 '+response[0]['fono_usuario'])
				$('.correo-resumen-maestro').html('Correo: '+response[0]['email_usuario'])
				$('.imagen-resumen-maestro').attr('src',response[0]['foto_perfil'])
				$('.btn-link-publicacion').attr('href',linkp)
				$('.btn-link-detalles-maestro').attr('href',linkd)		
			}

		})
	}
})