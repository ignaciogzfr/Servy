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


$('.certificados-edit').on('click','.btn-eliminar-certificados', prepararEditCertificados);
$('.servicios-edit').on('click','.btn-servicios-edit', prepararEditServicios);
$('.btn-agregar-certificados').on('click',prepararAgregarCertificado);
$('.btn-agregar-servicios').on('click',prepararAgregarServicio);
$('.div-botones-editar').on('click','.btn-preparar-edit',prepararFormEditar);
$('.div-botones-editar').on('click','.btn-cancelar-edit',cancelarFormEditar)
$('.div-botones-editar').on('click','.btn-editar-perfil',editarPerfil)
$('#form-cambiar-fp').on('submit',editarPerfilFP)






function registrarUsuario(e){
	e.preventDefault()
	var datos = new FormData(this);
	var fpc = $('#fp-registro-cliente')[0].files[0]
	var fpm = $('#fp-registro-maestro')[0].files[0]
	if($(this).find(".tipo-registro").val()=="Cliente"){

	$('#btn-registro-cliente').attr('disabled','disabled')
	$('#btn-registro-cliente').text("")
	$('#btn-registro-cliente').append('<i class="fas fa-spinner fa-spin"></i> Registrando Cuenta...')
	if(fpc === undefined){
		datos.set('fp-registro','img/placeholder-person.jpg')
		console.log('cambiado')
	}
	$.ajax({
		method: 'POST',
		url: 'controladores/usuarios-controller.php',
		data: datos,
        cache: false,
    	contentType: false,
    	processData: false,
		success:function(response){
			console.log(response)
			if($.isNumeric(response)){
				location.href = 'login.php'
			}else{
				location.href= 'registro.php?error=1'
			}
		}
	})


	}

	else{


	$('#btn-registro-maestro').attr('disabled','disabled')
	$('#btn-registro-maestro').text("")
	$('#btn-registro-maestro').append('<i class="fas fa-spinner fa-spin"></i> Registrando Cuenta...')

	var servicios = new Array();
	var certificados = new Array();
	$('#serv-maestro option:selected').each(function(i){
		servicios.push($(this).val())
	})
	$('#lista-certificados-maestro li').each(function(i){
		certificados.push($(this).text())
	})
	if(fpm === undefined){
		datos.set('fp-registro','img/placeholder-person.jpg')
		console.log('cambiado')
	}
	datos.append('servicios',JSON.stringify(servicios))
	datos.append('certificados',JSON.stringify(certificados))
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
			if($.isNumeric(response)){
				location.href= 'perfil.php?id='+response
			}
		}
	})

	}

}
// FIN FUNCION


function previewFP(input){
	console.log(input.id)
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


$.ajax({
	method: 'POST',
	url: 'controladores/usuarios-controller.php',
	data: 'op=sancionarUsuario&id='+id




})
}
// FIN FUNCION



function quitarSancionUsuario(e){

var id = $(this).val();
console.log(id);

$.ajax({

	method: 'POST',
	url:'controladores/usuarios-controller.php',
	data: 'op=quitarSancionUsuario&id='+id


})
}
// FIN FUNCION



function prepararFormEditar(e){
	var id = $(this).val();
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
$.ajax({
	method : 'POST',
	url: 'controladores/usuarios-controller.php',
	data: datos,
	success:function(response){
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


function prepararEditCertificados(e){
var certificados = new Array();
var id = $(this).val();
$('.certificados-edit .certificado-edit').each(function(i){
		certificados.push($(this).val())
	})
console.log(certificados)

}
function prepararAgregarCertificado(e){
$('.certificados-edit').append(`
	<div class="row">
	<input class="form-control col-md-8 mt-2" type="text">
	<button class="btn btn-sm btn-success btn-agregar-c"><i class="fas fa-check"></i></button>
	<button class="btn btn-sm btn-danger btn-cancelar-c"><i class="fas fa-times"></i></button></div>`)
}

function cancelarAgregarCertificado(e){
$(this).closest('.row').empty();
}


function editPerfilCertificados(e){
e.preventDefault();
var certificados = new Array();
$('.certificados-edit .certificado-edit').each(function(i){
	certificados.push($(this).val());
})
console.log(certificados)
}


function prepararEditServicios(e){
console.log('HOLA MUNDO')
var servicios = new Array();
var id = $(this).val();
$('.servicios-edit .servicio-edit').each(function(i){
		servicios.push($(this).val())
	})
console.log(servicios)
}

function prepararAgregarServicio(e){
$('.servicios-edit').append('<li>HOLA MUNDO!</li>')
}

function editarPerfilServicios(e){
e.preventDefault();
var servicios = new Array();
$('.servicios-edit .servicio-edit').each(function(i){
	servicios.push($(this).val());
})
console.log(servicios)
}




// FIN FUNCION READY DOCUMENT 
}) 
