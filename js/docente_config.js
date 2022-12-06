var table;
function listar_Docentes_Disponibles() {
    table = $("#tabla_Docentes").DataTable({
        "ordering": true,
        "bLengthChange": false,
        "searching": {
            "regex": false
        },
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
         
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../controlador/docente/controlador_Listar_Docente.php",
            type: 'POST'
        },
        "columns": [{
            "data": "id_docente" },
             {"data": "nombres"},
             {"data": "apellidos"},
             {"data": "nombreNivell"},

        {
            "defaultContent":"<button  type='button' class='agregar btn btn-default btn-sm'><em class='fa fa-plus-circle' title='eliminar'></em></button>"
        }],
        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_Docentes_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function() {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function() {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
     $('#btn-place').html(table.buttons().container()); 
     table.column( 0 ).visible( false );
    
}


$('#tabla_Docentes').on('click', '.agregar', function() {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    } 

      $('#idDocentesselect').val(data.id_docente);
     $('#combo_grados').prop('disabled',false);
      $('#add_cursos_btn').prop('disabled',false);
     $("#nombrdocente").html(data.nombres+","+data.apellidos); 

})




 async function listar_combo_Grados(){
     var identi='';var nameCombo="--seleccione--";
        $.ajax({
            "url": "../controlador/docente/controlador_combo_grados.php",
            type: 'POST'
        }).done(function(resp) {
          
            var data = JSON.parse(resp);
            var cadena = "";
            if (data.length > 0) {

                cadena += "<option value='" + identi+ "'>" + nameCombo + "</option>";
                for (var i = 0; i < data.length; i++) {
                    cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + ",&nbsp;" + data[i][2] +  ",SECCION;" + data[i][3] +"</option>";
                }
                 $('#combo_grados').html(cadena);////lamndo en vista matricula
           
            } else {
                cadena += "<option value=''>NO HAY GRADOS</option>";
                $("#combo_grados").html(cadena);
            }
        })
}


//AÑADIR TABLAS CON CURSOS EN LA TABLA SE SECCION DE CURSOS

  function Add_tr_table(){
    var HTML='';
     var idgrado =$("#combo_grados").val();
     var nombreGrado = $('#combo_grados option:selected').text();
      if (verificaridcurso(idgrado)) {createNotification('GRADO YA SELECCIONADO:','info'); return; }
    HTML +=  "<tr>";  
    HTML += "<td class='mailbox-star' for='id'>" + idgrado + "</td>";
    HTML += "<td class='mailbox-star'>" + nombreGrado + "</td>";
    HTML += "<td><button class='btn btn-secondary' onclick = 'remove(this)' style='border-radius: 5px; font-size: 12px'><em class='fa fa-trash'></em></button></td>";
    HTML += "</tr>";
    $('#tbody_tabla_lista_grado').append(HTML);
 }

 function Cancelar_registro(){

    $('#idDocentesselect').val('');
     $('#combo_grados').prop('disabled',true);
      $('#add_cursos_btn').prop('disabled',true);
     $("#nombrdocente").html('');
      $("#tbody_tabla_lista_grado").html('');    
 }


 //REMOVER CURSOS DE LA TABALA
function remove(t) {
    var td = t.parentNode;
    var tr = td.parentNode;
    var table = tr.parentNode;
    table.removeChild(tr);
    
}

//VERIFICAR SI YA SE LECCIONO LOS CURSOS AL LA TABLA
function verificaridcurso(idgrado) {
    let ident = document.querySelectorAll('#tbody_tabla_lista_grado td[for="id"]');
    return [].filter.call(ident, td => td.textContent == idgrado).length == 1;
}


function createNotification(message = null, type = null) {
    const notif = document.createElement('div')
    notif.classList.add('toast')
    notif.classList.add(type ? type : 'info')
    notif.innerText = message ? message : 'No se Reconoció el tipo de Mensaje '
    toasts.appendChild(notif)

    setTimeout(() => {
        notif.remove()
    }, 3000)
}
