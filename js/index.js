$(document).ready(function(){
$('#form-publicar-servicio-invitado').on('submit',publicarServicioInvitado);
function publicarServicioInvitado(event){
      event.preventDefault();
      var datos = $(this).serialize();
      console.log(datos)
      $.ajax({
        method: 'POST',
        url: 'controladores/publicaciones-controller.php',
        data: datos,
        success:function(response){
          console.log(response);
              if(response!=''){
                swal({
            title : '¡Tu publicación ha sido enviada con éxito!',
            text : 'Sera visualizada por todos nuestros Maestros.',
            icon : 'success'
          }).then(function(){
            location.href="index.php"
          })
              }else{
          swal({
            title : 'oops, algo salio mal.',
            text : 'Por favor rellene todos los campos.',
            icon : 'error'
          })
              }
            }
      })
  }
$("#btn-enviarservicios").on("click", function(){
  toastr.info("Espere a que un Maestro acepte su solicitud, esto puede tardar, sea paciente.", "Gracias",{

  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "10000",
  "extendedTimeOut": "10000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"


  })


  });


})