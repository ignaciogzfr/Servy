$(document).ready(function(){




$('.div-botones-certificado').on('click', '.btn-preparar-eliminar-c', prepararEliminarCertificados);
$('.div-botones-servicios').on('click','.btn-preparar-eliminar-s', prepararEliminarServicios);


$('.btn-agregar-certificados-edit').on('click',prepararAgregarCertificado);
$('.btn-agregar-servicios-edit').on('click',prepararAgregarServicio);

$('.certificados-edit').on('click','.btn-eliminar-fila-c',eliminarInputAgregarC)
$('.servicios-edit').on('click','.btn-eliminar-fila-s',eliminarInputAgregarS)

$('.div-botones-certificado').on('click','.btn-retroceder-c',cancelarAccionCertificado)
$('.div-botones-servicios').on('click','.btn-retroceder-s',cancelarAccionServicio)


function prepararEliminarCertificados(e){
var id = $(this).val();
$('.btn-eliminar-certificado').css('display','');
$('.div-botones-certificado').empty();

$('.div-botones-certificado').append(
`
<button class="btn btn-md btn-danger btn-agregar-c" value="${id}">Guardar Cambios</button>
<button class="btn btn-md btn-primary btn-retroceder-c">Cancelar</button>
`)
}


function prepararAgregarCertificado(e){
var id = $(this).val()
console.log(id)
$('.div-botones-certificado').empty();
$('.div-botones-certificado').append(
`
<button class="btn btn-md btn-success btn-agregar-c" value="${id}">Guardar Cambios</button>
<button class="btn btn-md btn-primary btn-retroceder-c" value="${id}">Cancelar</button>
`)
if($('.btn-agregar-certificados-edit').attr('total')==0){
	$('.alerta-c').remove();
}
$('.certificados-edit').append(`
	<div class="row fila-input-c">
	<input class="form-control col-md-8 mt-2 certificado-edit" type="text">
	<button class="btn btn-sm btn-danger btn-eliminar-fila-c" type="button"><i class="fas fa-times"></i></button></div>`)
}

function cancelarAccionCertificado(e){
var id = $('.div-botones-certificado .btn-agregar-c').val();
console.log(id)
$('.btn-eliminar-certificado').css('display','none');
$('.div-botones-certificado').empty();
$('.div-botones-certificado').append(`
<button type="button" class="btn btn-md btn-danger btn-preparar-eliminar-c" value="${id}">Eliminar Certificados</button>
`)
}

function eliminarInputAgregarC(e){
$(this).parent('.fila-input-c').remove();
}
function eliminarInputAgregarS(e){
$(this).closest('.fila-input-s').remove();
}

function agregarCertificado(e){
e.preventDefault();
var certificados = new Array();
$('.certificados-edit .certificado-edit').each(function(i){
	certificados.push($(this).val());
})
console.log(certificados)
}


function prepararEliminarServicios(e){
var id = $(this).val()
$('.btn-eliminar-servicio').css('display','');
$('.div-botones-servicios').empty();

$('.div-botones-servicios').append(
`
<button class="btn btn-md btn-danger btn-agregar-s" value="${id}">Guardar Cambios</button>
<button class="btn btn-md btn-primary btn-retroceder-s value="${id}"">Cancelar</button>
`)
console.log(id)
}


function cancelarAccionServicio(e){
var id = $(this).val();
console.log(id)
$('.btn-eliminar-servicio').css('display','none')
$('.serv-maestro-div').css('display','none');
$('.div-botones-servicios').empty();
$('.div-botones-servicios').append(`
<button type="button" class="btn btn-md btn-danger btn-preparar-eliminar-s" value="${id}">Dar Servicios de baja</button>
`)

}


function prepararAgregarServicio(e){
var id = $(this).val()
if($('.btn-agregar-servicios-edit').attr('total')==0){
	$('.alerta-s').remove();
}
$('.serv-maestro-div').css('display','');
$('.div-botones-servicios').empty();
$('.div-botones-servicios').append(
`
<button class="btn btn-md btn-success btn-agregar-s">Guardar Cambios</button>
<button class="btn btn-md btn-danger btn-retroceder-s">Cancelar</button>
`)


}

function agregarServicio(e){
e.preventDefault();
var servicios = new Array();
$('.servicios-edit .servicio-edit').each(function(i){
	servicios.push($(this).val());
})
console.log(servicios)
}

})