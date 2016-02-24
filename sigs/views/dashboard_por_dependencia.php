<div id="wrapper"> 
<?php
/* Include all the classes */ 
include("pChart214/class/pDraw.class.php"); 
include("pChart214/class/pImage.class.php"); 
include("pChart214/class/pData.class.php");
include("pChart214/class/pPie.class.php");

$i = 0;
foreach ($get_all_deps as $dep) {
///////////////////////////// GRAFICAS LATENTES
/* pData object creation */
$MyData1 = new pData();    
/* Data definition */

foreach ($TotalSolicitudesPorDependencia as $item) { 
  if ($dep->id == $item->canalizado) { 
    foreach ($get_all_status as $stat) { 
        if ($stat->status_id == $item->status) { 
          $MyData1->addPoints(array($item->total),"Solicitudes");  
          $MyData1->addPoints(array($stat->status),"Legend");  
        }   
    } 
  }  
}  


$MyData1->setAbscissa("Legend"); 
/* Create the pChart object */
$myPicture1 = new pImage(460,220,$MyData1);
/* Draw a solid background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture1->drawFilledRectangle(0,0,460,220,$Settings);
/* Draw a gradient overlay */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture1->drawGradientArea(0,0,460,220,DIRECTION_VERTICAL,$Settings);
$myPicture1->drawGradientArea(0,0,460,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
/* Add a border to the picture */
$myPicture1->drawRectangle(0,0,459,219,array("R"=>0,"G"=>0,"B"=>0));
/* Write the picture title */ 
$myPicture1->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>11));
$myPicture1->drawText(180,18,"Solicitudes por Status",array("R"=>255,"G"=>255,"B"=>255));
/* Set the default font properties */ 
$myPicture1->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>9,"R"=>80,"G"=>80,"B"=>80));
/* Enable shadow computing */ 
$myPicture1->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>150,"G"=>150,"B"=>150,"Alpha"=>50));
/* Create the pPie object */ 
$PieChart1 = new pPie($myPicture1,$MyData1);
/* Draw a simple pie chart */ 
//$PieChart3->draw2DPie(140,125,array("SecondPass"=>FALSE));
/* Draw an AA pie chart */ 
$PieChart1->draw2DPie(250,120,array("WriteValues"=>TRUE,"DrawLabels"=>FALSE,"LabelStacked"=>FALSE,"Border"=>TRUE));
/* Write the legend */
$myPicture1->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>9));
$myPicture1->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
$myPicture1->drawText(140,200,"",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
$myPicture1->drawText(250,210,"",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
/* Write the legend box */  
$myPicture1->setShadow(FALSE); 
/* Draw a JPG object */ 
$myPicture1->drawFromPNG(2,2,"logoGS_result2.png");

$PieChart1->drawPieLegend(15,40,array("Alpha"=>20)); 
/* Render the picture to a file */
$myPicture1->render("pChart214/p_".$i.".png");

$arrayName[] = $i;
$i = $i + 1; 

} 


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


<?php 
$i = 0;
foreach ($get_all_deps as $dep) {  ?>

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">                
            <div class="row">
              <div class="col-lg-12">
                  <div class="panel panel-success">
                    <div class="panel-heading">
                      <h2 class="panel-title"><strong><?php echo $dep->entidad; ?></strong></h2>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-4">                       
                          <div class="panel panel-success">
                            <div class="panel-heading">
                              <h3 class="panel-title">Solicitudes por Status</h3>
                            </div>
                            <div class="panel-body">
                            
                              <table class="table table-bordered table-striped table-responsive">
                                <tr>
                                  <th>Status</th>
                                  <th>TOTAL</th>
                                </tr>
                                <?php foreach ($TotalSolicitudesPorDependencia as $item) { ?>
                                <?php if ($dep->id == $item->canalizado) { ?>
                                <?php foreach ($get_all_status as $stat) { ?>
                                  <tr>
                                    <?php if ($stat->status_id == $item->status) { ?>
                                      <td><?php echo $stat->status;?></td>
                                      <td><?php echo $item->total;?></td>
                                    <?php } ?>
                                  </tr>
                                 <?php } ?>
                                 <?php } ?> 
                                 <?php } ?> 
                              </table>                                                        
                            </div>
                          </div>
                        </div>
                        <div class="col-md-8">                       
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">GRAFICA</h3>
                            </div>
                            <div class="panel-body">
                                <img src="<?php echo base_url();?>pChart214/p_<?php echo $i;?>.png" width="98%">
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

<?php $i = $i + 1; 


} ?>





</div>
<!-- /#wrapper -->