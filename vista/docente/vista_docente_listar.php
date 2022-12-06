
<script type="text/javascript" src="../js/docentes.js?rev=<?php echo time();?>"></script>
<div class="col-md-12" id="div_tabla_usuario">
    <div class="box box-warning ">
        <style type="text/css">
        #tabla_usuario {
            border: 1px solid #d4f4f7;
            border-radius: 10px;
            background-color: #f5f7f7;
        }
        </style>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-4 clasbtn_exportar">
                    <div class="alin_global">
                        <div class="input-group" id="btn-place"></div>
                    </div>
                </div>
                <div class="col-xs-1">
                </div>
                <div class="col-xs-7 pull-right">
                    <div class="alin_global">
                        <input type="text" class="global_filter form-control " id="global_filter"
                            placeholder="Ingresar dato a buscar" style=" width: 100%">&nbsp;&nbsp;<button
                            onclick="AbrirModalRegistro();" class="btn-sm" id="but_alin_global">
                            <em class="glyphicon glyphicon-plus"></em>
                        </button>
                    </div>
                </div>
            </div><br>
            <table id="tabla_docente" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Telfono</th>
                        <th>Codigo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>




<script>
$(document).ready(function() {
    $("#refres_add").hide();
    listar_usuario();
    $('.js-example-basic-single').select2();
});
</script>