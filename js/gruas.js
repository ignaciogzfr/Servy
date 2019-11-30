$(document).ready(function(){


$('#form-pedir-grua').on('submit',pedirGrua);
$('#select-tipo-vehiculo').select2({
	width : 'resolve'
})


function sancionarGrua(e){
		var id = $(this).val();
		console.log(id);


$.ajax({
	method: 'POST',
	url: 'controladores/gruas-controller.php',
	data: 'op=sancionarGrua&id='+id




})
}
// FIN FUNCION



function quitarSancionGrua(e){

var id = $(this).val();
console.log(id);

$.ajax({

	method: 'POST',
	url:'controladores/gruas-controller.php',
	data: 'op=quitarSancionGrua&id='+id


})
}


function pedirGrua(event){
				event.preventDefault();
				var datos = new FormData(this);
				console.log(datos.get('lat'));
			$.ajax({

				method: 'POST',
				url: 'controladores/gruas-controller.php',
				data: datos,
				cache: false,
    			contentType: false,
    			processData: false,
				success:function(response){
					console.log(response);
	        		if(response!=''){
	        			swal({
						title : '¡Tu publicación ha sido enviada con éxito!',
						text : 'Ahora solo hay que esperar que se apruebe y que una grua la tome.',
						icon : 'success'
					})
					
	        		}
	        	}
			})
	}














})