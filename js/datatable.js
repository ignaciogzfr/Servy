$(document).ready(function() {
    $('#example').DataTable({

     language: {
        search: "Buscar en la tabla",
        lengthMenu:     "Mostrar _MENU_ entradas",
        info:           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
        emptyTable:     "No se han encontrado datos",
        zeroRecords:    "No se han encontrado datos",
        infoFiltered:   "(Filtrado de _MAX_ total  de entradas)",
         paginate: {
            first:      "Primero",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Ultimo"
        }
        }


    });
} );