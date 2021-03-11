$(document).ready(function() {
  $('.DataTableJSB').each(function() {
    var source = $(this).attr("data-src");
    $(this).DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": source,
        "columnDefs": [ {
                    "targets"  : 'no-sort',
                    "orderable": false,
        }],
        "language":	{
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sSearch":         "Buscar:",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        }
    } );
  } );
  $('.DataTableJSB2').each(function() {
    var groupColumn = 1;
    var source = $(this).attr("data-src");
      var table = $(this).DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": source,
          "language":	{
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sSearch":         "Buscar:",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
          },
          "columnDefs": [
            { "visible": false, "targets": groupColumn },
            {
              "targets"  : 'no-sort',
              "orderable": false
            },
            {
              "targets"  : 'no-visible',
              "visible": false
            }
          ],
          "order": [[1, 'asc']],
          "rowGroup": {
            dataSrc: 1
          }
      } );

      $(this).find('tbody').on( 'click', 'tr.dtrg-group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            table.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            table.order( [ groupColumn, 'asc' ] ).draw();
        }
    } );
  } );
} );