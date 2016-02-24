<div id="wrapper">
<?php 
/* Include all the classes */ 
include("pChart214/class/pDraw.class.php"); 
include("pChart214/class/pImage.class.php"); 
include("pChart214/class/pData.class.php");
include("pChart214/class/pPie.class.php");

?>
<?php
$total = $TotalSolicitudesD01+$TotalSolicitudesD02+$TotalSolicitudesD03;
$avgD01 = ($TotalSolicitudesD01/$total)*100;
$avgD02 = ($TotalSolicitudesD02/$total)*100;
$avgD03 = ($TotalSolicitudesD03/$total)*100;
/* pData object creation */
$MyData = new pData();    
/* Data definition */
$MyData->addPoints(array($avgD01,$avgD02,$avgD03),"Value");  
/* Labels definition */
$MyData->addPoints(array("Distrito 01","Distrito 02","Distrito 03",),"Legend");
$MyData->setAbscissa("Legend"); 
/* Create the pChart object */
$myPicture = new pImage(500,230,$MyData);
/* Draw a solid background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture->drawFilledRectangle(0,0,500,230,$Settings);
/* Draw a gradient overlay */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture->drawGradientArea(0,0,500,230,DIRECTION_VERTICAL,$Settings);
$myPicture->drawGradientArea(0,0,500,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
/* Add a border to the picture */
$myPicture->drawRectangle(0,0,499,229,array("R"=>0,"G"=>0,"B"=>0));
/* Write the picture title */ 
$myPicture->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>11));
$myPicture->drawText(180,18,"Solicitudes por Distrito",array("R"=>255,"G"=>255,"B"=>255));
/* Set the default font properties */ 
$myPicture->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>9,"R"=>80,"G"=>80,"B"=>80));
/* Enable shadow computing */ 
$myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>150,"G"=>150,"B"=>150,"Alpha"=>50));
/* Create the pPie object */ 
$PieChart = new pPie($myPicture,$MyData);
/* Draw a simple pie chart */ 
//$PieChart3->draw2DPie(140,125,array("SecondPass"=>FALSE));
/* Draw an AA pie chart */ 
$PieChart->draw2DPie(250,125,array("WriteValues"=>TRUE,"DrawLabels"=>FALSE,"LabelStacked"=>FALSE,"Border"=>TRUE));
/* Write the legend */
//$myPicture3->setFontProperties(array("FontName"=>"pChart214/fonts/Forgotte.ttf","FontSize"=>20));
//$myPicture3->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
//$myPicture->drawText(140,200,"Single AA pass",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
//$myPicture3->drawText(340,200,"Solicitudes por Status y Distrito",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
/* Write the legend box */  
$myPicture->setShadow(FALSE); 

/* Draw a JPG object */ 
$myPicture->drawFromPNG(2,2,"logoGS_result2.png");

$PieChart->drawPieLegend(15,40,array("Alpha"=>20)); 
/* Render the picture to a file */
$myPicture->render("pChart214/pie.png");
?>  



  
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
                        <div class="col-md-3">                       
                          <div class="panel panel-success">
                            <div class="panel-heading">
                              <h3 class="panel-title"><strong>Total Solicitudes</strong></h3>
                            </div>
                            <div class="panel-body">
                              <h1><strong><?php echo $TotalSolicitudes;?></strong></h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">                       
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Distrito 01</h3>
                            </div>
                            <div class="panel-body">
                              <h1> <strong><?php echo $TotalSolicitudesD01;?></strong> </h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">                       
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Distrito 02</h3>
                            </div>
                            <div class="panel-body">
                              <h1> <strong><?php echo $TotalSolicitudesD02;?></strong> </h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">                       
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Distrito 03</h3>
                            </div>
                            <div class="panel-body">
                              <h1> <strong><?php echo $TotalSolicitudesD03;?></strong> </h1>
                            </div>
                          </div>
                        </div>
                        <!-- GRAFICA STATUS -->
                        <div align="center">
                          <img src="<?php echo base_url();?>pChart214/pie.png" width="80%">
                        </div>

                        </div>
                      </div>   
                  </div>
                </div><!-- row well -->


        </div>
    </div>
    <!-- /#page-content-wrapper -->


    </div>
    <!-- /#wrapper -->