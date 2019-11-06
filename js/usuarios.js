$(document).ready(function(){
$(".btn-sancionar-usuario").on("click",sancionarUsuario)
$(".btn-quitar-sancion-usuario").on("click",quitarSancionUsuario)
$('#form-registro-cliente').on('submit',registrarUsuario);
$('#form-registro-maestro').on('submit',registrarUsuario);
$('.btn-preparar-edit').on('click',prepararFormEditar);
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



function registrarUsuario(event){
	event.preventDefault()
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
			if(response != "ERROR"){
				location.href = 'perfil.php?id='+response;
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

function previewFP(input){
	console.log(input.id)
	if(input.files && input.files[0]){
			console.log(input.files);
			var reader = new FileReader();
			reader.onload = function(e){
				if(input.id == 'fp-registro-cliente'){
					$('#fp-cliente-preview').attr('src', e.target.result)
				}else if(input.id == 'fp-registro-maestro'){
					$('#fp-maestro-preview').attr('src', e.target.result)
				}

			}
			reader.readAsDataURL(input.files[0]);
		}	
}




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

function prepararFormEditar(event){
	$('.input-dato-basico').removeAttr('disabled');
	$('.exp-maestro').removeAttr('disabled');
	$('.div-botones-editar').children().remove();
	$('.div-botones-editar').append(`<button type="button" class="btn btn-success btn-md btn-editar-perfil">AAAAAA</button><button type="button" class="btn btn-danger btn-md">CANCELAR</button>`);
}


})
