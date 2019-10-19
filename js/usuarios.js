$(document).ready(function(){

$('#form-registro-cliente').on('submit',registrarUsuario);
$('#form-registro-maestro').on('submit',registrarUsuario);
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

	$('.btn-registro-maestro').attr('disabled','disabled')
	$('.btn-registro-maestro').text("")
	$('.btn-registro-maestro').append('<i class="fas fa-spinner fa-spin"></i> Registrando Cuenta...')
	var datos = new FormData(this);

	if($(this).find(".tipo-registro").val()=="Cliente"){
	var datos = new FormData(this);


	if(datos.get('fp-registro') == "" ){
		datos.set('fp-registro','img/placeholder-person.png')
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
			if(response == "CREADO"){
				location.href = 'perfil.php';
			}
		}
	})


	}

	else{



	var servicios = new Array();
	var certificados = new Array();
	$('#serv-maestro option:selected').each(function(i){
		servicios.push($(this).val())
	})
	$('#lista-certificados-maestro li').each(function(i){
		certificados.push($(this).text())
	})


	if(datos.get('fp-registro') == "" ){
		datos.set('fp-registro','img/placeholder-person.png')
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
			if(response=='Listo'){
				location.href= 'perfil.php'
			}
		}
	})

	}

}

})