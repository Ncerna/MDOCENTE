<?php
session_start();
if(!isset($_SESSION['S_IDUSUARIO'])){
	header('Location: ../Login/index.php');
}

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COLEGIO | Particular</title>
  <!-- Tell the browser to be responsive to screen width -->


  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   
  <!-- Bootstrap 3.3.7 -->

 <link rel="stylesheet" href="../Plantilla/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Plantilla/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../Plantilla/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Plantilla/dist/css/AdminLTE.min.css">
   <!-- color de la navegacion navV navH -->
  <link rel="stylesheet" href="../Plantilla/dist/css/skins/_all-skins.min.css">

  <!-- Morris chart -->
  
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../Plantilla/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../Plantilla/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="../Plantilla/plugins/DataTables/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="../Plantilla/dist/css/checkbox.css">

<!--booton imprimir-->

  <link rel="stylesheet" href="../Plantilla/plugins/select2/select2.min.css">
           
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<style>
.swal2-popup{
  font-size:1.0.5em !important;
}
</style>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

<?php 
    include ('menu/navV.php');
    include ('menu/navH.php');
     ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
  <section class="content">
    <div class="row" id="contenido_principal">
        <div class="col-md-12">
          <div class="box box-warning ">
          
            <input type="text" id="textId"  value="<?php echo $_SESSION['S_IDUSUARIO'] ?>" hidden>
            <input type="text" id="UserNom" value="<?php echo $_SESSION['S_USER'] ?>" hidden>
            <input type="text" id="Userrol" value="<?php echo $_SESSION['S_ROL'] ?>" hidden >
            <input type="text" id="AlumIDgrado" value="<?php echo $_SESSION['S_TOKEN'] ?> " hidden>
            <div class="box-header with-border">
              <h3 class="box-title">BIENVENIDO AL CONTENIDO PRINCIPAL</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              CONTENIDO PRINCIPAL

              

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <center><div class="loader" hidden>
               <img src="../login/vendor/loader.gif" alt="" style="width: 100px;height:100px;">
              </div></center>
    </div>
  </div>
<!-- /modal del index -->
<!-- /modificar contraceña -->
  <form autocomplete="false" onsubmit="return false"  method="POST" action="#" enctype="multipart/form-data" onsubmit="return false">
    <div class="modal fade" id="modal_Camb_contra" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b><i class="glyphicon glyphicon-user"></i> Mi Perfil</b></h4>
            </div>
            <div class="modal-body">
          <!--CUADRO PARA LA FOTO-->
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header" style="background-color:">
              <div class="widget-user-image">
                <img  class="img-circle" alt="User Image" id="mostrarimagen">
                
              </div>
              <h3 class="widget-user-username"><b><?php echo $_SESSION['S_USER']; ?></b> </h3>
              <h5 class="widget-user-desc"><?php echo $_SESSION['S_ROL']; ?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <input type="text"  id="fotoActual" hidden>
                <input type="file" class="form-control" id="seleccionararchivo" accept="image/x-png,image/gif,image/jpeg"  style="border-radius: 5px;"><br>

              </ul>
            </div>
          </div>
          <!-- FIN CUADRO-->

                <div class="col-lg-12">

                     <style type="text/css">
                       .col-lg-12 input:focus:invalid{ 
                               box-shadow: 0 0 5px #d45252;
                               border-color: #b03535
                                } 
                                .col-lg-12 input:required:valid {                                
                                   background: #fff
                                   box-shadow: 0 0 5px #5cd053;
                                   border-color: #28921f;
                               }                          
                     </style>
                    <input type="text" id="textId" value="<?php echo $_SESSION['S_IDUSUARIO'] ?>"hidden >
                       
                            <div id="notif" class="  " role="alert" hidden style="border-radius: 5px;background: #F5890E"><ul>las contraceñas nuevas no coisiden!</ul>
                             </div>

                             <div id="llenecamp"  role="alert" hidden style="border-radius: 5px;background: #2DD2BB"><ul>Llene los campos vacios!</ul> 
                              </div>
                              <div id="noexiste" class="" role="alert" hidden style="border-radius: 5px;background: #F52A0E"><ul>la Contraceña anterior es diferente a lo que estas ingresando!</ul>
                               </div>
                      <input type="text"  id="contra_bd" hidden>
                    
                  </div><br>
                 <div class="col-lg-12">
                    <label for="">Contrase&ntilde;a Actual</label>
                    <input type="password" class="form-control" id="txt_cont_act" placeholder="Ingrese contrase&ntilde;a Actual"  required><br>
                </div>
                 <div class="col-lg-12">
                    <button class="btn btn-block" style="width:100%; background:#05ccc4" onclick="addcontranew()" id="botonaddcontra"><i class=""></i>¿Deseas cambiar contrase&ntilde;a?</button>
                </div><br>


                 <div id="cambiarcontratambien" hidden>
                <div class="col-lg-12">
                    <label for="">Contrase&ntilde;a Nueva</label>
                    <input type="password" class="form-control" id="txt_cont_nuw" placeholder="Ingrese contrase&ntilde;a Nueva" ><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Repita la Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="repcontra" placeholder="Repita contrase&ntilde;a Repetida" ><br>
                </div>
                </div>
            </div><br><br><br><br><br>

            <div class="modal-footer">
                <button class="btn btn-primary" onclick="Modificar_Contrasena()"><i class="fa fa-check"><b>&nbsp;Guardar</b></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
            </div>
        </div>
        </div>
    </div>
</form>



  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <a href="https://www.facebook.com/nimer.cernaespinoza"><i class="fa fa-facebook-square fa-2x"></i></a>&nbsp;&nbsp;&nbsp;
      <a href="https://wa.link/yyqh93"><i class="fa fa-whatsapp fa-2x" style="color: green"></i></a>&nbsp;&nbsp;&nbsp;
      <b>Version</b> 1.2.0
    </div>
    <strong>Desallollador  <a href="https://www.facebook.com/nimer.cernaespinoza">NCE</a>.</strong>estudia y trabaja.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="../Plantilla/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../Plantilla/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	var idioma_espanol = {
			select: {
			rows: "%d fila seleccionada"
			},
			"sProcessing":     "<span class='fa-stack fa-lg'>\n\
                            <i class='fa fa-spinner fa-spin fa-stack-2x fa-fw'></i>\n\
                       </span>&emsp;Procesando....",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ning&uacute;n dato disponible en esta tabla",
			"sInfo":           "Registros del (_START_ al _END_) total de _TOTAL_ registros",
			"sInfoEmpty":      "Registros del (0 al 0) total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "<b>No se encontraron datos</b>",
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
  function cargar_contenido(contenedor,contenido){
    $("#refres_add").show();
      $("#"+contenedor).load(contenido);
  }
 // SemstreActual();//semestre actual esta en index.js

//FUNCION TRAER CONTRA Y FOTO USER
  var id_usu =$("#textId").val();
  var rol_usu =$("#Userrol").val();
  // Extraer_contracena(id_usu,rol_usu);


  $.widget.bridge('uibutton', $.ui.button);
  $("#modal_Camb_contra").on('shown.bs.modal',function(){
        $("#txt_cont_act").focus();  
    });

  $("#modal_semestre").on('shown.bs.modal',function(){
        $("#cbm_semestre").focus();  
    });


//FUNCION DE FOTO

document.getElementById("seleccionararchivo").addEventListener("change", () => {
             $("#idfoto").show();
            var archivoseleccionado = document.querySelector("#seleccionararchivo");
            var archivos = archivoseleccionado.files;
            var imagenPrevisualizacion = document.querySelector("#mostrarimagen");
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
            imagenPrevisualizacion.src = "";
            return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            var primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            var objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            imagenPrevisualizacion.src = objectURL;
        });
  
</script>

<!-- Bootstrap 3.3.7 -->
<script src="../Plantilla/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts 
<script src="../Plantilla/bower_components/raphael/raphael.min.js"></script>-->
<!-- Sparkline 
<script src="../Plantilla/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>-->
<!-- jvectormap 
<script src="../Plantilla/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../Plantilla/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- jQuery Knob Chart -->
<script src="../Plantilla/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../Plantilla/bower_components/moment/min/moment.min.js"></script>
<script src="../Plantilla/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../Plantilla/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../Plantilla/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../Plantilla/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../Plantilla/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../Plantilla/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="../Plantilla/dist/js/demo.js"></script>
<script src="../Plantilla/plugins/DataTables/datatables.min.js"></script>

   <!-- imprimir--> 
    <script src="../Plantilla/plugins/DataTables//pdfmake-0.1.36/vfs_fonts.js"></script>
    
<script src="../Plantilla/plugins/select2/select2.min.js"></script>
<script src="../Plantilla/plugins/sweetalert2/sweetalert2.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
  // listar_combo_AnioActiveWiev();
} );

    //COMBO DE AÑO ESCOLAR
  function listar_combo_AnioActiveWiev() {
     $("#nombreYearactivo").html("<i class='fa fa-spin fa-refresh'></i>");
    $.ajax({
        "url": "../controlador/configuracion/configuracion_extrae_AnioActivo.php",
        type: 'POST'
    }).done(function(resp) {
        var data = JSON.parse(resp);
        if(data.length>0){
          $("#YearActualActivo").val(data[0]['id_year']);
          $("#nombreYearactivo").html(data[0]['yearScolar']);
          $("#tex_YearActual_").val(data[0]['yearScolar']);
        }
        
        
    })
}

</script>

</body>
</html>
