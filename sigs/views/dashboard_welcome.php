<div id="wrapper"> 


    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand"><a><span class="glyphicon glyphicon-user"> <?php echo USER ?></span></a></li>
            <li><a href="<?php echo base_url('dashboard/index');?>"><span class="glyphicon glyphicon-home"> Bienvenido</span></a></li>
            <li><a href="<?php echo base_url('dashboard/total_solicitudes');?>"><span class="glyphicon glyphicon-object-align-bottom"> Total Solicitudes</span></a></li>
            <li><a href="<?php echo base_url('dashboard/por_distrito');?>"><span class="glyphicon glyphicon-object-align-bottom"> Por Distrito</span></a></li>
            <li><a href="<?php echo base_url('dashboard/por_status');?>"><span class="glyphicon glyphicon-object-align-bottom"> Por Status</span></a></li>
            <li><a href="<?php echo base_url('dashboard/por_dependencia');?>"><span class="glyphicon glyphicon-object-align-bottom"> Por Dependencias</span></a></li>
            <li><a href="<?php echo base_url('dashboard/top10_dependencia');?>"><span class="glyphicon glyphicon-object-align-bottom"> Top10 Dependencias</span></a></li>
            <li><a href="<?php echo base_url('admin/logout');?>"><span class="glyphicon glyphicon-off"> Salir</span></a></li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">                
                <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-success">
                        <div class="panel-heading">
                          <h2 class="panel-title"><a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-fullscreen"></span></a></h2>
                        </div>
                        <div class="panel-body">
                          <h2>Bienvenido al Módulo de Gráficas</h2>
                          <hr>
                          <p>Aquí encontrará de forma visual y amigable los resultados más significativos de la Gestión en los Distritos Federales del Estado de Aguascalientes.</p>
                          <p>Las gráficas pueden responden preguntas como:
                            <ul>
                              <li>¿Cual es el <strong>Total de Solicitudes</strong> que tenemos?</li>
                              <li>¿Cuantas <strong>Solicitudes</strong> se han generado en el Distrito 01?</li>
                              <li>¿Que <strong>Status</strong> guardan las Solicitudes en el Distrito 02?</li>
                              <li>¿Qué <strong>Dependencias</strong> tienen Solicitudes Canalizadas?</li>
                              <li>¿Qué Status guarda cada una de las <strong>Dependencias</strong> y sus Solicitudes?</li>
                            </ul>
                          </p>
                          <p>El Menú del lado izquierdo le ayudará a responder estas y otras preguntas al respecto.</p>
                          <hr>
                          <p>Para generar gráficas adicionales contacte a la Secretaría de Gestión Social del PRI en Aguascalientes.</p>
                        </div>
                      </div>   
                  </div>
                </div><!-- row well -->
        </div>
    </div>
    <!-- /#page-content-wrapper -->


</div>
<!-- /#wrapper -->