//cuando se llama a este archivo, este se encarga de "escuchar" las funciones del docuemnto donde esta siendo llamado
//y a traves de este metodo puede obtener informacion del formulario o campos y carga una funcion para administrarla
//correctamente
$(document).ready(function(){
$('#serv-maestro-edit').select2({
	width : 'resolve'
})

$('.btn-agregar-certificados-edit').on('click',prepararAgregarCertificado);
$('.btn-agregar-servicios-edit').on('click',prepararAgregarServicio);

$('.div-botones-certificado').on('click','.btn-agregar-c',editarPerfilCertificados);
$('.div-botones-servicios').on('click','.btn-agregar-s',editarPerfilServicios)


$('.certificados-edit').on('click','.btn-agregar-fila-c',agregarFilaCertificado)
$('.serv-maestro-div').on('click', '.btn-agregar-fila-s', agregarFilaServicio)


$('.certificados-edit').on('click','.btn-eliminar-fila-c',cancelarAccionCertificado)
$('.serv-maestro-div').on('click','.btn-eliminar-fila-s',cancelarAccionServicio)


$('.certificados-edit').on('click','.btn-eliminar-certificado',eliminarFilaC)
$('.servicios-edit').on('click','.btn-eliminar-servicio',eliminarFilaS)


$('.div-botones-certificado').on('click','.btn-retroceder-c',cancelarAccionCertificado)
$('.div-botones-servicios').on('click','.btn-retroceder-s',cancelarAccionServicio)



function prepararAgregarCertificado(e){
$('.btn-eliminar-certificado').css('display','')
$('.fila-input-c').css('display','')
$('.btn-agregar-certificados-edit').css('display','none');
$('.div-botones-certificado').empty();
$('.div-botones-certificado').append(
`
<button class="btn btn-md btn-success btn-agregar-c" >Guardar Cambios</button>
<button class="btn btn-md btn-primary btn-retroceder-c" >Cancelar</button>
`)
if($('.btn-agregar-certificados-edit').attr('total')==0){
	$('.alerta-c').css('display','none');
}

}
function cancelarAccionCertificado(e){
var id = $('.div-botones-certificado .btn-agregar-c').val();
console.log(id)
$('.div-botones-certificado').empty();
$('.btn-agregar-certificados-edit').css('display','')
$('.fila-edit-nuevo-c').remove();
$('.btn-eliminar-certificado').css('display','none');
$('.fila-input-c').css('display','none');
if($('.btn-agregar-certificados-edit').attr('total')==0){
	$('.alerta-c').css('display','');
}
}

function agregarFilaCertificado(e){
var cert = $('.certificado-agregar-edit').val();
if(cert == '' || cert.length <= 10){
		swal({
			title : '¡Alto!',
			text : 'No puedes ingresar certificados vacios ni de una palabra. Por favor, intente ingresar el nombre completo de su certificado',
			icon: 'warning'
		})
}
else{
$('.certificados-edit').append(`
                <div class="row fila-edit-nuevo-c text-center">
                    <button class="btn btn-danger btn-eliminar-certificado" style="width:38px; height:40px;">
                    <i class="fas fa-trash"></i>
                    </button>
                    <li class="my-3 listado-certificados list-group-item list-group-item-secondary">${cert}</li>
                    </div>
`);
$('.btn-agregar-certificado-edit').css('display','')
$('.fila-input-c').css('display','none');
$('.btn-agregar-certificados-edit').css('display','');	
}

}

function eliminarInputAgregarC(e){
$(this).parent('.fila-input-c').remove();
$('.btn-agregar-certificado-edit').css('display','')
}
function eliminarInputAgregarS(e){
$(this).closest('.fila-input-s').remove();
$('.btn-agregar-servicio-edit').css('display','')
}
function eliminarFilaC(e){
	$(this).parent().remove();
}
function eliminarFilaS(e){
	$(this).parent().remove();
}









function editarPerfilCertificados(e){
e.preventDefault();
var id = $('#id-perfil-edit').val()
var certificados = new Array();

$('.certificados-edit .listado-certificados').each(function(i){
	certificados.push($(this).text());
})
$.ajax({
	method : 'POST',
	url : 'controladores/usuarios-controller.php',
	data : 'op=editarPerfilCertificados&id='+id+'&certificados='+JSON.stringify(certificados),
	success:function(response){
		if(response == 'OK'){
		swal({
			title : 'Todo bien',
			text : 'Recargaremos la sesion para que veas los cambios',
			icon : 'succes'
		})			
		$('#form-editar-sesion').submit();
		}
	}
})
}


function editarPerfilServicios(e){
e.preventDefault();
var id = $('#id-perfil-edit').val();
var servicios = new Array()
$('.servicios-edit .listado-servicios').each(function(i){
	servicios.push($(this).val())
})
$('.btn-eliminar-servicio').css('display','none')
console.log(servicios)
$.ajax({
	method : 'POST',
	url : 'controladores/usuarios-controller.php',
	data : 'op=editarPerfilServicios&id='+id+'&servicios='+JSON.stringify(servicios),
	success:function(r){
		swal({
			title : 'Todo bien',
			text : 'Recargaremos la sesion para que veas los cambios',
			icon : 'succes'
		})
		$('#form-editar-sesion').submit();
	}
})

}

function cancelarAccionServicio(e){
var id = $(this).val();
console.log(id)
$('.btn-eliminar-servicio').css('display','none')
$('.serv-maestro-div').css('display','none');
$('.div-botones-servicios').empty();
$('.fila-edit-nuevo-s').remove();
if($('.btn-agregar-servicios-edit').attr('total')==0){
	$('.alerta-s').css('display','')
}

}


function prepararAgregarServicio(e){
var id = $(this).val()
if($('.btn-agregar-servicios-edit').attr('total')==0){
	$('.alerta-s').remove();
}
$('.btn-eliminar-servicio').css('display','')
$('.serv-maestro-div').css('display','');
$('.div-botones-servicios').empty();
$('.div-botones-servicios').append(
`
<button class="btn btn-md btn-success btn-agregar-s">Guardar Cambios</button>
<button class="btn btn-md btn-danger btn-retroceder-s">Cancelar</button>
`)


}

function agregarFilaServicio(e){
var id = $('#serv-maestro-edit option:selected').val();
var condicion = ''
var nombre = $('#serv-maestro-edit option:selected').text();
if($('.servicios-edit').has('.servicio-'+id).length){
swal({
	title : '¡Alto!',
	text : 'No puedes repetir el mismo tipo de servicio',
	icon : 'warning'
})
}else{
$('.servicios-edit').append(`
                <div class="row my-3 fila-edit-nuevo-s">
                    
                    <li class="listado-servicios servicio-${id} col-md-8 text-center list-group-item list-group-item-secondary" value="${id}">${nombre}</li>
                    <button class="btn btn-danger btn-eliminar-servicio" style="width:38px; height:40px;">
                    <i class="fas fa-trash"></i>
                    </button>
                 </div>
`);
}
console.log(condicion);

}



})