$(document).ready(function(){

$('[data-toggle="popover-hover"]').popover({
  html: true,
  trigger: 'hover',
  title: 'Informacion',
  placement: 'right',
  content: function () { return 'No te preocupes, la informacion puesta aqui no sera guardada o utilizada.'; }
});
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