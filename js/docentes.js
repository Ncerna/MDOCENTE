var table;
function listar_usuario() {
    table = $("#tabla_docente").DataTable({
        "ordering": true,
        "bLengthChange": false,
        "searching": {
            "regex": false
        },
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
         "responsive": true,
         "dom":'Bfrtilp',
       
        buttons:[
            { extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i> ',
                titleAttr: 'Exportar a Excel'
            }, {extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i> ',
                titleAttr: 'Exportar a PDF'
            }],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../controlador/docente/controlador_docente_listar.php",
            type: 'POST'
        },
        "columns": [
             {"data": "id_docente" },
             {"data": "nombres"},
             {"data": "apellidos"},
             {"data": "dni"},
             {"data": "email"},
             {"data": "telefono"},
             {"data": "codigo"},
        {
            "defaultContent":"<button  type='button' class='eliminar btn btn-default btn-sm'><em class='fa fa-close' title='eliminar'></em></button>"
        }],
        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_docente_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function() {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function() {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
     $('#btn-place').html(table.buttons().container()); 
     table.column( 0 ).visible( false );
    
}