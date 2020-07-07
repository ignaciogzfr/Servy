//cuando se llama a este archivo, este se encarga de "escuchar" las funciones del docuemnto donde esta siendo llamado
//y a traves de este metodo puede obtener informacion del formulario o campos y carga una funcion para administrarla
//correctamente
$(document).ready(function(){
$('#serv-maestro').select2({
	width : 'resolve'
})

$("#form-verificacion-mail").on("submit",verificarMail);
$(".btn-sancionar-usuario").on("click",sancionarUsuario);
$(".btn-quitar-sancion-usuario").on("click",quitarSancionUsuario);
$('#form-registro-cliente').on('submit',registrarUsuario);
$('#form-registro-maestro').on('submit',registrarUsuario);
$('.fp-registro').on('change',function(){
	previewFP(this);
})

$('#form-denunciar-u').on('submit',denunciarUsuario);


$('.btn-agregar-certificado').on('click',function(e){
	if($('#cert-maestro').val()=='' || $('#cert-maestro').val().length < 7){
	swal({
			title : 'Tienes que ingresar un certificado completo, o sea, más de una palabra',
			icon : 'info'
	})
	}else{
	var linea = '<li>'+$("#cert-maestro").val()+'<button type="button" class="btn btn-quitar-certificado btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>'+'</li>';
	$('#lista-certificados-maestro').append(linea);
	$('#cert-maestro').val("");
	}

})

$('#lista-certificados-maestro').on('click','.btn-quitar-certificado',function(e){
	$(this).closest('li').remove();
})

$('.div-botones-editar').on('click','.btn-preparar-edit',prepararFormEditar);
$('.div-botones-editar').on('click','.btn-cancelar-edit',cancelarFormEditar);
$('.div-botones-editar').on('click','.btn-editar-perfil',editarPerfil);
$('#form-cambiar-fp').on('submit',editarPerfilFP);


// asignacion de datos tomados del formulario registro-cliente



function verificarMail(event){
event.preventDefault();

}


// funciones de usuarios
function registrarUsuario(event){
	event.preventDefault();
	var datos = new FormData(this);
	var mail = datos.get('mail-registro')
		//Registro caso cliente
	$.ajax({
		method : 'POST',
		url : 'controladores/usuarios-controller.php',
		data: "op=verificarMail&mail-registro="+mail,
		success:function(r){
			if(r==1){
			swal({
				title : 'Espera un momento',
				text : 'Esta direccion de correo ya está en uso, verifica si te has creado una cuenta antes',
				icon : 'warning'
			})
			}else{
	if($(this).find(".tipo-registro").val()=="Cliente"){
		//Animacion del boton registro
	$('#btn-registro-cliente').attr('disabled','disabled');
	$('#btn-registro-cliente').text("");
	$('#btn-registro-cliente').append('<i class="fas fa-spinner fa-spin"></i> Registrando Cuenta...');
		//Si la variable que se le entrego la ruta de la imagen esta sin definir o nula se asignara 
		//al paquete de datos un valor predeterminado
		//Se llama al componente de usuarios-controller entregandole el paquete de datos y esperar
		//de este una respuesta
	$.ajax({
		method: 'POST',
		url: 'controladores/usuarios-controller.php',
		data: datos,
        cache: false,
    	contentType: false,
    	processData: false,
		success:function(response){
			console.log(response);
			//una ves que obtine la respuesta puede tener 2 resultados 
			//1) se crea el usuario y obtiene su id de usuario lo que carga su pagina de perfil
			//2) no se registra o obtubo un error lo que muestra un error a traves del metodo get
			if($.isNumeric(response)){

				swal({
						title : '¡Te has registrado exitosamente!',
						text : 'Bienvenido a nuestra familia de trabajadores.',
						icon : 'success'
					})
					.then(function(){
						location.href="perfil.php?id="+response;
					})	
			}else{
				location.href= 'registro.php?error=1';
				 }
								}
			})
	}
		//registro caso maestro
	else{

		//Animacion del boton registro
	$('#btn-registro-maestro').attr('disabled','disabled');
	$('#btn-registro-maestro').text("");
	$('#btn-registro-maestro').append('<i class="fas fa-spinner fa-spin"></i> Registrando Cuenta...');
		//se crean vectores para acomodar la lista de todos los certificados y servicios
	var servicios = new Array();
	var certificados = new Array();
	$('#serv-maestro option:selected').each(function(i){
		servicios.push($(this).val())
	})
	$('#lista-certificados-maestro li').each(function(i){
		certificados.push($(this).text())
	})
		//caso de foto de perfil nula
		//aqui se asignan los vectores como objetos json y se almacenan el el paquete de datos
	datos.append('servicios',JSON.stringify(servicios))
	datos.append('certificados',JSON.stringify(certificados))
		//Se llama al componente de usuarios-controller entregandole el paquete de datos y 
		//esperar de este una respuesta
	$.ajax({
		method: 'POST',
		url: 'controladores/usuarios-controller.php',
		data: datos,
		datatype:'JSON',
        cache: false,
    	contentType: false,
    	processData: false,
		success:function(response){
			console.log(response)
			//una ves que obtine la respuesta puede tener 2 resultados 
			//1) se crea el usuario y obtiene su id de usuario lo que carga su pagina de perfil
			//2) no se registra o obtubo un error lo que muestra un error a traves del metodo get
			if($.isNumeric(response)){
					swal({
						title : '¡te has registrado exitosamente!',
						text : 'bienvenido a nuestra familia de trabajadores.',
						icon : 'success'
					})
					.then(function(){
						location.href="perfil.php?id="+response;
					})
			}else{
				location.href= 'registro.php?error=1';
			}
		}
	})

	}			
			}
		}
	})
	

}



function previewFP(input){
	console.log(input.id);
	if(input.files && input.files[0]){

			console.log(input.files);

			var reader = new FileReader();

			reader.onload = function(e){
				if(input.id == 'fp-registro-cliente'){
					$('#fp-cliente-preview').attr('src', e.target.result)
				}else 
				if(input.id == 'fp-registro-maestro'){
					$('#fp-maestro-preview').attr('src', e.target.result)
				}else
				if(input.id == 'fp-cambiar-imagen'){
					$('#fp-cambio-preview').attr('src', e.target.result)
				}

			}
			reader.readAsDataURL(input.files[0]);
		}	
}


function denunciarUsuario(e){
	event.preventDefault();
	var datos = $(this).serialize();
	$.ajax({

		method: 'POST',
		url: 'controladores/usuarios-controller.php',
		data: datos,
		success:function(response){
			if(r='Denunciado papu'){
			swal({
				title : 'Denunciado con exito!',
				icon : 'success'
			})
			}
		}
	})

}

function sancionarUsuario(event){
		event.preventDefault();
		var id = $(this).val();
		console.log(id);
	//Llamada a el controlador para que este obtenga los datos del formulario y esta realize
	//la llamada al modelo para que realize la consulta con el id obtenido del boton
$.ajax({
	method: 'POST',
	url: 'controladores/usuarios-controller.php',
	data: 'op=sancionarUsuario&id='+id,
	success:function(response){
		console.log(response);
		if(response == 'ok'){
			swal({
						title : '¡Sancion existosa!',
						text : 'El usuario fue sancionado con exito.',
						icon : 'success'
					})
					.then(function(){
						location.reload()
					})
		}
		else{
			swal({
						title : '¡Esto no deberia pasar!',
						text : 'error interno, contacta con el programador.',
						icon : 'error'
					})
					.then(function(){
						location.reload();
					})
		}
	}
})
}



function quitarSancionUsuario(event){
	//al sancionar un usuario su id se encuentra en el boton
var id = $(this).val();
console.log(id);
	//Llamada a el controlador para que este obtenga los datos del formulario y esta realize
	//la llamada al modelo para que realize la consulta con el id obtenido del boton
$.ajax({
	method: 'POST',
	url:'controladores/usuarios-controller.php',
	data: 'op=quitarSancionUsuario&id='+id,
	success:function(response){
		console.log(response);
		if(response == 'ok'){
			swal({
						title : '¡La sancion a sido levantada!',
						text : 'El usuario puede publicar nuevamente.',
						icon : 'success'
					})
					.then(function(){
						location.reload();
					})
		}
		else{
			swal({
						title : '¡Esto no deberia pasar!',
						text : 'error interno, contacta con el programador.',
						icon : 'error'
					})
					.then(function(){
						location.reload();
					})
		}	
	}
})
}




function prepararFormEditar(e){
	var id = $(this).val();
	//Esta funcion cuando se llama del perfil, habilita los campos para que puedan ser editados, elimina el boton editar
	//y añade los botone "cancelar" y "confirmar" en ambos de ellos se encuentra sla id del usuario para que se utilicen em modelo-usuario
	$('.input-dato-basico').removeAttr('disabled');
	$('.exp-maestro').removeAttr('disabled');
	$('.div-botones-editar').children().remove();
	$('.div-botones-editar').append(`
		<button type="button" class="btn btn-success btn-md btn-editar-perfil" value="${id}">Confirmar</button>
		<button type="button" class="btn btn-danger btn-md btn-cancelar-edit" value="${id}">Cancelar</button>`);
}




function cancelarFormEditar(e){
var id = $(this).val()
	//Cuando se cancela una modificacion los atributos los inputs se deshabilitan los botones de confirmar y calcelar
	//se eliminan y se vuelve a cargar el boton editar
$('.input-dato-basico').attr('disabled','disabled');
	$('.div-botones-editar').children().remove();
	$('.div-botones-editar').append(`
		<button type="button" class="btn btn-md btn-primary btn-preparar-edit" value="${id}">
		<i class="fas fa-edit"></i> Editar
		</button>
		`);
	$('.nombre-editar-perfil').val($('.nombre-editar-perfil').attr('original'))
	$('.fono-editar-perfil').val($('.fono-editar-perfil').attr('original'))
	$('.dir-editar-perfil').val($('.dir-editar-perfil').attr('original'))
	$('.exp-maestro').val($('.exp-maestro').attr('original'))
}



function editarPerfil(e){
var id = $('#id-perfil-edit').val();
if($('.nombre-editar-perfil').val()=='' || $('.fono-editar-perfil').val()=='' || $('.dir-editar-perfil').val()==''){
	swal({
		title: 'Espera un momento',
		text : 'No puedes ingresar datos vacios',
		icon : 'info'
	})
}else{
if($('#tipo-editar-perfil').val()==='Cliente'){
	console.log(1);
	var datos = $('.form-editar-cliente').serialize();
}else if($('#tipo-editar-perfil').val()==='Maestro'){
	console.log(2);
	var datos = $('.form-editar-maestro').serialize();
	console.table(datos);
}
	//envio de paquete con los datos obtenido del controlador para que se ejecuten las consultas en modelo-usuarios
$.ajax({
	method : 'POST',
	url: 'controladores/usuarios-controller.php',
	data: datos,
	success:function(response){
		console.log(response)
	//una ves que se realiza la consulta y obtiene una respuesta, los campos ya cambiados son bloqueados 
		if(response=='OK'){
			console.log('CAMBIADO');
			$('.input-dato-basico').attr('disabled','disabled');
			alert('Fue cambiado con exito! Vamos a reiniciar sesion para efectuar los cambios');
			$('#form-editar-sesion').submit();
		}
	}

})	
}

}
// Fin funcion


function editarPerfilFP(e){
e.preventDefault();
var imagen = new FormData(this);
if (imagen.get('fp')==''){
	alert('No se pueden realizar cambios si el campo está vacio')
}
else{
$.ajax({
	method: 'POST',
	url: 'controladores/usuarios-controller.php',
	data: imagen,
    cache: false,
	contentType: false,
	processData: false,
	success:function(r){
		console.log(r)
		if(r=='OK'){
			swal({
				title : 'Se ve bien!',
				text : 'Se realizo el cambio de foto sin problemas, vamos a recargar la pagina para comprobarlo.',
				icon : 'success'
			}).then(function(){
				$('#form-editar-sesion').submit();
			})
			
		}
	}
})
}
}
//fin funcion




// FIN FUNCION READY DOCUMENT 
})
