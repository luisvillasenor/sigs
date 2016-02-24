<div id="wrapper"> 
<?php
/* Include all the classes */ 
include("pChart214/class/pDraw.class.php"); 
include("pChart214/class/pImage.class.php"); 
include("pChart214/class/pData.class.php");
include("pChart214/class/pPie.class.php");
?>
<?php
///////////////////////////// GRAFICAS PIE TOP10 DEPENDENCIAS
/* pData object creation */
$MyData11 = new pData();    
/* Data definition */
foreach ($top10_dependencia as $item) {
  $MyData11->addPoints(array($item->total),"Solicitudes");  
}
/* Labels definition */
foreach ($top10_dependencia as $item) {
  foreach ($get_dependencias as $value) {
    if ($item->canalizado == $value->id) {
      $MyData11->addPoints(array($value->entidad),"Legend");
    }
  }
}
$MyData11->setAbscissa("Legend"); 
/* Create the pChart object */
$myPicture11 = new pImage(400,230,$MyData11);
/* Draw a solid background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture11->drawFilledRectangle(0,0,400,230,$Settings);
/* Draw a gradient overlay */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture11->drawGradientArea(0,0,400,230,DIRECTION_VERTICAL,$Settings);
$myPicture11->drawGradientArea(0,0,400,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
/* Add a border to the picture */
$myPicture11->drawRectangle(0,0,399,229,array("R"=>0,"G"=>0,"B"=>0));
/* Write the picture title */ 
$myPicture11->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>9));
$myPicture11->drawText(120,18,"Top10 Dependencias",array("R"=>255,"G"=>255,"B"=>255));
/* Set the default font properties */ 
$myPicture11->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>5,"R"=>80,"G"=>80,"B"=>80));
/* Enable shadow computing */ 
$myPicture11->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>150,"G"=>150,"B"=>150,"Alpha"=>50));
/* Create the pPie object */ 
$PieChart11 = new pPie($myPicture11,$MyData11);
/* Draw a simple pie chart */ 
//$PieChart3->draw2DPie(140,125,array("SecondPass"=>FALSE));
/* Draw an AA pie chart */ 
$PieChart11->draw2DPie(300,120,array("WriteValues"=>PIE_VALUE_PERCENTAGE,"DrawLabels"=>FALSE,"DataGapAngle"=>10,"LabelStacked"=>TRUE,"Border"=>TRUE));
/* Write the legend */
$myPicture11->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>5));
$myPicture11->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
$myPicture11->drawText(140,200,"",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
$myPicture11->drawText(350,210,"",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
/* Write the legend box */  
$myPicture11->setShadow(FALSE);
/* Draw a JPG object */ 
$myPicture11->drawFromPNG(2,2,"logoGS_result2.png");

$PieChart11->drawPieLegend(15,40,array("Alpha"=>20)); 
/* Render the picture to a file */
$myPicture11->render("pChart214/pieTop10Deps.png");
?>

<?php    
/* Create and populate the pData object */ 
 $MyData = new pData();   
 /* Data definition */
foreach ($top10_dependencia as $item) {
  $MyData->addPoints(array($item->total),"Solicitudes");  
}
/* Labels definition */
foreach ($top10_dependencia as $item) {
  foreach ($get_dependencias as $value) {
    if ($item->canalizado == $value->id) {
      $MyData->addPoints(array($value->entidad),"Legend");
    }
  }
}

$MyData->setAxisName(0,"Solicitudes"); 
$MyData->setSerieDescription("Legend","Legend"); 
$MyData->setAbscissa("Legend"); 
$MyData->setAbscissaName("Legend"); 
$MyData->setAxisDisplay(0,AXIS_FORMAT_METRIC,1); 

 /* Create the pChart object */ 
 $myPicture = new pImage(500,500,$MyData); 
 $myPicture->drawGradientArea(0,0,500,500,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100)); 
 $myPicture->drawGradientArea(0,0,500,500,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
 $myPicture->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>6)); 

 /* Draw the chart scale */  
 $myPicture->setGraphArea(180,30,480,480); 
 $myPicture->drawScale(array("CycleBackground"=>TRUE,"DrawSubTicks"=>TRUE,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10,"Pos"=>SCALE_POS_TOPBOTTOM)); //  

 /* Turn on shadow computing */  
 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 

 /* Draw the chart */  
 $myPicture->drawBarChart(array("DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"Rounded"=>TRUE,"Surrounding"=>30)); 

 /* Write the legend */  
 $myPicture->drawLegend(570,215,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL)); 
/* Draw a JPG object */ 
$myPicture->drawFromPNG(2,2,"logoGS_result2.png");

 /* Render the picture (choose the best way) */ 
 $myPicture->render("pChart214/ChartTop10Deps.png"); 
 //$myPicture11->render("pChart214/pieTop10Deps.png");
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

<div class="row" align="center">
<p class="navbar-text navbar-left"><a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-fullscreen"></span></a> Pantalla Completa</p>
</div><!-- row well -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">                
            <div class="row" align="center">
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-4">                       
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h3 class="panel-title">Tabla de Datos</h3>
                                </div>
                                <div class="panel-body" align="center">
                                  <!-- Table -->
                                  <div class="table-responsive">
                                  <table class="table table-bordered table-striped table-responsive">
                                    <thead>
                                      <th>Status</th>
                                      <th>Solicitudes</th>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    foreach ($top10_dependencia as $item) {
                                      foreach ($get_dependencias as $value) {
                                        if ($item->canalizado == $value->id) {
                                          $MyData11->addPoints(array($value->entidad),"Legend");
                                          echo "<tr>";
                                            echo "<td>";
                                            echo "$value->entidad";
                                            echo "</td>";
                                            echo "<td>";
                                            echo "$item->total";
                                            echo "</td>";
                                          echo "</tr>";
                                        }
                                      }
                                    }
                                    ?>
                                    </tbody>
                                  </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-8">                       
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h3 class="panel-title">Graficas de Datos</h3>
                                </div>
                                <div class="panel-body">
                                    <!-- GRAFICA STATUS -->
                                    <div align="center">
                                      <img src="<?php echo base_url();?>pChart214/pieTop10Deps.png" width="99%">
                                    </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  
                                </div>
                                <div class="panel-body">
                                    <!-- GRAFICA STATUS -->
                                    <div align="center">
                                      <img src="<?php echo base_url();?>pChart214/ChartTop10Deps.png" width="99%">
                                    </div>
                                </div>
                              </div>
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