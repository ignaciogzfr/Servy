//escucha eventos en el formulario que es llamado como un componente y cargado en la pagina donde se necesite
$('document').ready(function(){
 $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
}) 
