<aside class="main-sidebar" >
    <!-- sidebar: style can be found in sidebar.less  style="position: fixed;"-->
    <section class="sidebar" ><br>
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img  class="img-circle" alt="User Image" id="fotouserhorz"style="width: 50px;height:50px;" >
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['S_USER']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form class="sidebar-form"  onsubmit="return false">
        <div class="input-group">
          <input type="text"  class="form-control" placeholder="Search..." autocomplete="false">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       <!-- <li class="header">MAIN NAVIGATION</li>-->
       <?php 

        if ($_SESSION['S_ROL'] =='ADMINISTRADOR') {
          ?>

          <li class=" treeview">
          <a onclick="cargar_contenido('contenido_principal','usuario/vista_usuario_listar.php')">
            <i class="glyphicon glyphicon-user"></i> <span style="cursor: pointer;">Usuario</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li> 

        <style type="text/css">
          .treeview-menu li a:hover{
            background-color: #2fe3d7;
            border-radius: 5px;
          }
        </style>

        <li class="treeview">
          <a>
            <i class=" fa   fa-cog"></i> <span style="cursor: pointer;">Acad&eacute;mico</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>

            <ul class="treeview-menu">
                  <li><a  onclick="cargar_contenido('contenido_principal','docente/vista_docente_listar.php')"style="cursor: pointer;"><i class="fa fa-circle-o"></i> Docente</a></li>
                   
              </ul>
          </a>
        </li>
        <li>

       </li>
      
    
         

        <?php
          }
         ?>

    </ul>
     
    </section>
    <!-- /.sidebar -->
  </aside>