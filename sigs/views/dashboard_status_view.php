<div id="wrapper">

    <?php
    /* Include all the classes */ 
    include("pChart214/class/pDraw.class.php"); 
    include("pChart214/class/pImage.class.php"); 
    include("pChart214/class/pData.class.php");
    include("pChart214/class/pPie.class.php");
    ?>

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand"><a><?php echo USER ?></a></li>
            <li><a href="<?php echo base_url('dashboard/index');?>">Bienvenido</a></li>                  
            <li><a href="<?php echo base_url('dashboard/status');?>">Status</a></li>
            <li><a href="<?php echo base_url('admin/logout');?>">Salir</a></li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content TOTAL STATUS -->
    <div id="page-content-wrapper">
        <div class="container-fluid">                
            <div class="row">
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Zoom</a>
            <hr>
                <div class="row well">
                <h2 class="well">Total de Solicitudes por Status Todos los Distritos</h2>
                  <div class="col-lg-16">
                    <div class="col-md-3">                       
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h3 class="panel-title">Total Solicitudes</h3>
                        </div>
                        <div class="panel-body">
                          <h1> <strong><?php echo $TotalSolicitudes;?></strong> </h1>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- GRAFICA STATUS -->
                  <div align="center">

                  </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->