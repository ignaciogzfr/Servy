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
				var lat = (datos.get('lat'));
			if(lat == ""){
						$('#error').text('Por favor, asegurese de establecer su ubicacion.');
			}else{
						console.log('si se hizo');
			$.ajax({

				method: 'POST',
				url: 'controladores/gruas-controller.php',
				data: datos,
				cache: false,
    			contentType: false,
    			processData: false,
				success:function(response){
					console.log(response);
	        		if(response=='ok'){
	        			swal({
						title : '¡Tu publicación ha sido enviada con éxito!',
						text : 'Ahora solo hay que esperar que se apruebe y que una grua la tome.',
						icon : 'success'
					}).then(function(){
						location.href="vista-gruas.php"
					})
	        		}else{
	        			swal({
						title : 'Se produjo un error al hacer la solicutud',
						text : 'Asegurate de ingresas el tipo de automobil',
						icon : 'error'
					}).then(function(){
						location.href="index.php"
					})
	        		}
	        	}
			})
				}
			
	}














})