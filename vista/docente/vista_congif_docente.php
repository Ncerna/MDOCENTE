
<script type="text/javascript" src="../js/docente_config.js?rev=<?php echo time();?>"></script>

  <div class='col-lg-12' style='border-color: #f5c6cb;' id="tutotiales_Id">
      <div id='avisomanual' class='alert  sm' role='alert' style='color: #0e0102; background-color: #acefe4;'><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      .................____....
          
     </div>
   </div>

 <style type="text/css">
          #tabla_grados{
            border: 1px solid #d4f4f7;
            border-radius: 10px;
            background-color: #f5f7f7;
          }
          #add_cursos_btn{
                margin-top: 20px;
               width: auto;
          }
        </style>

<div class="col-md-6">
  <div class="box box-warning ">
    <div class="box-header titulosclass" id="Titulo_Center">
      <h3 class="box-title">Asisgnar Grados A Docentes</h3>
    </div>
    <div class="box-body">
      <div class="form-group pull-right">
        <div class="col-lg-10 pull-right">
          <div class="input-group pull-right">
            <input type="text" class="global_filter form-control pull-right" id="global_filter" placeholder="Ingresar dato a buscar" style="border-radius: 5px;">
          </div>
        </div>
      </div>
      <br><br>
      <table id="tabla_Docentes" class="display responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th>N°</th>
            <th>Apellidos</th>
            <th>Nombres</th>
            <th>Nivel</th>
            <th>Acci&oacute;n</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
         </tr>
       </tfoot>
     </table>
   </div>
 </div>
</div>
<div class="col-md-6" id='modal_agregar_curso' >
  <div class="box box-warning ">
    <div class="box-header titulosclass" id="Titulo_Center">
     <h3 class="box-title"> Docente<p class="box-title" id="nombrdocente"></p></h3>
     <div class="box-tools pull-right">
      <button type="button" onclick="Cancelar_registro();" class="btn btn-box-tool" data-widget="collapse"><em class="fa fa-times"></em>
      </button>
    </div>
  </div>
  <div class="box-body">
   <div class="col-lg-12">
    <input type="text" name="" id="text_idgrado" hidden>
    <div class="col-lg-12" style='border-color: #f5c6cb;'>


    </div>
    <div class="row">
      <div class="col-xs-10">
        <label for="">Grado</label>
        <div class="alin_global">
          <select class="js-example-basic-single" name="state" id="combo_grados" style="width:100%;" disabled>
          </select><br><br>
        </div>
      </div>
      <div class="col-xs-2">
       <button class="btn  btn-warning btn-sm" id="add_cursos_btn" onclick="Add_tr_table()" disabled><em class="glyphicon glyphicon-plus "></em></button>

       <br>
     </div>
   </div>
   <input type="text" name="" id="idDocentesselect" hidden>
   <div class="table-responsive">
     <table   style="width:100%" class="table table-ms">
      <thead class=" thead-drak" style="color: #721c24; background-color: #9fa5a4;">
        <th>Orden</th>
        <th>Nombre</th>
        <th>Quitar</th>
      </thead>
      <tbody id="tbody_tabla_lista_grado">   
      </tbody>
    </table>
    <div id="toasts"></div>

  </div>
</div>
</div>

<div class="modal-footer">
  <button class="btn btn-primary btn-sm " onclick="Registrar_Cursogrado()"><i class="fa fa-check"><b>&nbsp;Registrar</b></i></button>

</div>
</div>
</div>


<script>
$(document).ready(function() {
  $("#refres_add").hide();
    $('.js-example-basic-single').select2();

   listar_Docentes_Disponibles();
   listar_combo_Grados();

} );
</script>

