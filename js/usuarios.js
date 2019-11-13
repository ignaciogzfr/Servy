//cuando se llama a este archivo, este se encarga de "escuchar" las funciones del docuemnto donde esta siendo llamado
//y a traves de este metodo puede obtener informacion del formulario o campos y carga una funcion para administrarla
//correctamente
$(document).ready(function(){
$(".btn-sancionar-usuario").on("click",sancionarUsuario)
$(".btn-quitar-sancion-usuario").on("click",quitarSancionUsuario)


$('#form-registro-cliente').on('submit',registrarUsuario);
$('#form-registro-maestro').on('submit',registrarUsuario);
$('.fp-registro').on('change',function(){
	previewFP(this)
})
$('#serv-maestro').select2({
	width : 'resolve'
})

$('.btn-agregar-certificado').on('click',function(e){
	var linea = '<li>'+$("#cert-maestro").val()+'<button type="button" class="btn btn-quitar-certificado btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></button>'+'</li>'
	$('#lista-certificados-maestro').append(linea)
	$('#cert-maestro').val("")
})

$('#lista-certificados-maestro').on('click','.btn-quitar-certificado',function(e){
	$(this).closest('li').remove()
})



$('.div-botones-editar').on('click','.btn-preparar-edit',prepararFormEditar);
$('.div-botones-editar').on('click','.btn-cancelar-edit',cancelarFormEditar)
$('.div-botones-editar').on('click','.btn-editar-perfil',editarPerfil)
$('#form-cambiar-fp').on('submit',editarPerfilFP)
// asignacion de datos tomados del formulario registro-cliente





function registrarUsuario(e){
	e.preventDefault()
	var datos = new FormData(this);
	var fpc = $('#fp-registro-cliente')[0].files[0]
	var fpm = $('#fp-registro-maestro')[0].files[0]
		//Registro caso cliente
	if($(this).find(".tipo-registro").val()=="Cliente"){
		//Animacion del boton registro
	$('#btn-registro-cliente').attr('disabled','disabled')
	$('#btn-registro-cliente').text("")
	$('#btn-registro-cliente').append('<i class="fas fa-spinner fa-spin"></i> Registrando Cuenta...')
		//Si la variable que se le entrego la ruta de la imagen esta sin definir o nula se asignara 
		//al paquete de datos un valor predeterminado
	if(fpc === undefined){
		datos.set('fp-registro','img/placeholder-person.jpg')
		console.log('cambiado')
	}
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
			console.log(response)
			//una ves que obtine la respuesta puede tener 2 resultados 
			//1) se crea el usuario y obtiene su id de usuario lo que carga su pagina de perfil
			//2) no se registra o obtubo un error lo que muestra un error a traves del metodo get
			if($.isNumeric(response)){
				location.href= 'perfil.php?id='+response;
			}else{
				location.href= 'registro.php?error=1';
			}
		}
	})


	}
		//registro caso maestro
	else{

		//Animacion del boton registro
	$('#btn-registro-maestro').attr('disabled','disabled')
	$('#btn-registro-maestro').text("")
	$('#btn-registro-maestro').append('<i class="fas fa-spinner fa-spin"></i> Registrando Cuenta...')
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
	if(fpm === undefined){
		datos.set('fp-registro','img/placeholder-person.jpg')
		console.log('cambiado')
	}
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
				location.href= 'perfil.php?id='+response;
			}else{
				location.href= 'registro.php?error=1';
			}
		}
	})

	}

}
// FIN FUNCION


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
// FIN FUNCION



function sancionarUsuario(e){
		var id = $(this).val();
		console.log(id);
	//Llamada a el controlador para que este obtenga los datos del formulario y esta realize
	//la llamada al modelo para que realize la consulta con el id obtenido del boton
$.ajax({
	method: 'POST',
	url: 'controladores/usuarios-controller.php',
	data: 'op=sancionarUsuario&id='+id
})
}
// FIN FUNCION



function quitarSancionUsuario(e){

function quitarSancionUsuario(event){
	//al sancionar un usuario su id se encuentra en el boton
var id = $(this).val();
console.log(id);
	//Llamada a el controlador para que este obtenga los datos del formulario y esta realize
	//la llamada al modelo para que realize la consulta con el id obtenido del boton
$.ajax({
	method: 'POST',
	url:'controladores/usuarios-controller.php',
	data: 'op=quitarSancionUsuario&id='+id
})
}
// FIN FUNCION



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
// FIN FUNCION

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
}
// FIN FUNCION


function editarPerfil(e){
if($('#tipo-editar-perfil').val()==='Cliente'){
	console.log(1)
	var datos = $('.form-editar-cliente').serialize();
}else if($('#tipo-editar-perfil').val()==='Maestro'){
	console.log(2)
	var datos = $('.form-editar-maestro').serialize();
}
	//envio de paquete con los datos obtenido del controlador para que se ejecuten las consultas en modelo-usuarios
$.ajax({
	method : 'POST',
	url: 'controladores/usuarios-controller.php',
	data: datos,
	success:function(response){
	//una ves que se realiza la consulta y obtiene una respuesta, los campos ya cambiados son bloqueados 
		if(response=='OK'){
			console.log('CAMBIADO');
			$('.input-dato-basico').attr('disabled','disabled');
			alert('Fue cambiado con exito!')
		}
	}

})
}
// Fin funcion


function editarPerfilFP(e){
e.preventDefault();
var imagen = new FormData(this);
$.ajax({
	method: 'POST',
	url: 'controladores/usuarios-controller.php',
	data: imagen,
    cache: false,
	contentType: false,
	processData: false,
	success:function(r){
		console.log(r)
	}
})
}





// FIN FUNCION READY DOCUMENT 
}) 
