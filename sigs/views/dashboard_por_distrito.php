<div id="wrapper">
<?php
/* Include all the classes */ 
include("pChart214/class/pDraw.class.php"); 
include("pChart214/class/pImage.class.php"); 
include("pChart214/class/pData.class.php");
include("pChart214/class/pPie.class.php");
$TotalStatusPendientesd01 = ($TotalAbiertod01+$TotalPendiented01+$TotalLatentesd01);
$TotalStatusPendientesd02 = ($TotalAbiertod02+$TotalPendiented02+$TotalLatentesd02);
$TotalStatusPendientesd03 = ($TotalAbiertod03+$TotalPendiented03+$TotalLatentesd03);

?>

<?php
/* pData object creation */
$MyData2 = new pData();    
/* Data definition */
$MyData2->addPoints(array($TotalAtendidoPositivod01,$TotalAtendidoNegativod01,$TotalStatusPendientesd01,$TotalCanalizadod01),"Status");  
/* Labels definition */
$MyData2->addPoints(array("Atendido Positivo","Atendido Negativo","Abierto","Canalizados"),"Legend");
$MyData2->setAbscissa("Legend"); 
/* Create the pChart object */
$myPicture2 = new pImage(500,230,$MyData2);
/* Draw a solid background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture2->drawFilledRectangle(0,0,500,230,$Settings);
/* Draw a gradient overlay */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture2->drawGradientArea(0,0,500,230,DIRECTION_VERTICAL,$Settings);
$myPicture2->drawGradientArea(0,0,500,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
/* Add a border to the picture */
$myPicture2->drawRectangle(0,0,499,229,array("R"=>0,"G"=>0,"B"=>0));
/* Write the picture title */ 
$myPicture2->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>11));
$myPicture2->drawText(180,18,"Solicitudes Distrito 01",array("R"=>255,"G"=>255,"B"=>255));
/* Set the default font properties */ 
$myPicture2->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>9,"R"=>80,"G"=>80,"B"=>80));
/* Enable shadow computing */ 
$myPicture2->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>150,"G"=>150,"B"=>150,"Alpha"=>50));
/* Create the pPie object */ 
$PieChart2 = new pPie($myPicture2,$MyData2);
/* Draw a simple pie chart */ 
//$PieChart3->draw2DPie(140,125,array("SecondPass"=>FALSE));
/* Draw an AA pie chart */ 
$PieChart2->draw2DPie(250,125,array("WriteValues"=>TRUE,"DrawLabels"=>FALSE,"LabelStacked"=>FALSE,"Border"=>TRUE));
/* Write the legend */
//$myPicture3->setFontProperties(array("FontName"=>"pChart214/fonts/Forgotte.ttf","FontSize"=>20));
//$myPicture3->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
//$myPicture->drawText(140,200,"Single AA pass",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
//$myPicture3->drawText(340,200,"Solicitudes por Status y Distrito",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
/* Write the legend box */  
$myPicture2->setShadow(FALSE); 
/* Draw a JPG object */ 
$myPicture2->drawFromPNG(2,2,"logoGS_result2.png");

$PieChart2->drawPieLegend(15,40,array("Alpha"=>20)); 
/* Render the picture to a file */
$myPicture2->render("pChart214/pieStatusd01.png");
?>

<?php
/* pData object creation */
$MyData3 = new pData();    
/* Data definition */
$MyData3->addPoints(array($TotalAtendidoPositivod02,$TotalAtendidoNegativod02,$TotalStatusPendientesd02,$TotalCanalizadod02),"Status");  
/* Labels definition */
$MyData3->addPoints(array("Atendido Positivo","Atendido Negativo","Abierto","Canalizados"),"Labels");
$MyData3->setAbscissa("Labels"); 
/* Create the pChart object */
$myPicture3 = new pImage(500,230,$MyData3);
/* Draw a solid background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture3->drawFilledRectangle(0,0,500,230,$Settings);
/* Draw a gradient overlay */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture3->drawGradientArea(0,0,500,230,DIRECTION_VERTICAL,$Settings);
$myPicture3->drawGradientArea(0,0,500,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
/* Add a border to the picture */
$myPicture3->drawRectangle(0,0,499,229,array("R"=>0,"G"=>0,"B"=>0));
/* Write the picture title */ 
$myPicture3->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>11));
$myPicture3->drawText(180,18,"Solicitudes Distrito 02",array("R"=>255,"G"=>255,"B"=>255));
/* Set the default font properties */ 
$myPicture3->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>9,"R"=>80,"G"=>80,"B"=>80));
/* Enable shadow computing */ 
$myPicture3->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>150,"G"=>150,"B"=>150,"Alpha"=>50));
/* Create the pPie object */ 
$PieChart3 = new pPie($myPicture3,$MyData3);
/* Draw a simple pie chart */ 
//$PieChart3->draw2DPie(140,125,array("SecondPass"=>FALSE));
/* Draw an AA pie chart */ 
$PieChart3->draw2DPie(250,125,array("WriteValues"=>TRUE,"DrawLabels"=>FALSE,"LabelStacked"=>FALSE,"Border"=>TRUE));
/* Write the legend */
//$myPicture3->setFontProperties(array("FontName"=>"pChart214/fonts/Forgotte.ttf","FontSize"=>20));
//$myPicture3->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
//$myPicture->drawText(140,200,"Single AA pass",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
//$myPicture3->drawText(340,200,"Solicitudes por Status y Distrito",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
/* Write the legend box */  
$myPicture3->setShadow(FALSE); 
/* Draw a JPG object */ 
$myPicture3->drawFromPNG(2,2,"logoGS_result2.png");

$PieChart3->drawPieLegend(15,40,array("Alpha"=>20)); 
/* Render the picture to a file */
$myPicture3->render("pChart214/pieStatusd02.png");
?>

<?php
/* pData object creation */
$MyData4 = new pData();    
/* Data definition */
$MyData4->addPoints(array($TotalAtendidoPositivod03,$TotalAtendidoNegativod03,$TotalStatusPendientesd03,$TotalCanalizadod03),"Status");  
/* Labels definition */
$MyData4->addPoints(array("Atendido Positivo","Atendido Negativo","Abierto","Canalizados"),"Legend");
$MyData4->setAbscissa("Legend"); 
/* Create the pChart object */
$myPicture4 = new pImage(500,230,$MyData4);
/* Draw a solid background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture4->drawFilledRectangle(0,0,500,230,$Settings);
/* Draw a gradient overlay */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture4->drawGradientArea(0,0,500,230,DIRECTION_VERTICAL,$Settings);
$myPicture4->drawGradientArea(0,0,500,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
/* Add a border to the picture */
$myPicture4->drawRectangle(0,0,499,229,array("R"=>0,"G"=>0,"B"=>0));
/* Write the picture title */ 
$myPicture4->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>11));
$myPicture4->drawText(180,18,"Solicitudes Distrito 03",array("R"=>255,"G"=>255,"B"=>255));
/* Set the default font properties */ 
$myPicture4->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>9,"R"=>80,"G"=>80,"B"=>80));
/* Enable shadow computing */ 
$myPicture4->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>150,"G"=>150,"B"=>150,"Alpha"=>50));
/* Create the pPie object */ 
$PieChart4 = new pPie($myPicture4,$MyData4);
/* Draw a simple pie chart */ 
//$PieChart3->draw2DPie(140,125,array("SecondPass"=>FALSE));
/* Draw an AA pie chart */ 
$PieChart4->draw2DPie(250,125,array("WriteValues"=>TRUE,"DrawLabels"=>FALSE,"LabelStacked"=>FALSE,"Border"=>TRUE));
/* Write the legend */
//$myPicture3->setFontProperties(array("FontName"=>"pChart214/fonts/Forgotte.ttf","FontSize"=>20));
//$myPicture3->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
//$myPicture->drawText(140,200,"Single AA pass",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
//$myPicture3->drawText(340,200,"Solicitudes por Status y Distrito",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
/* Write the legend box */  
$myPicture4->setShadow(FALSE);
/* Draw a JPG object */ 
$myPicture4->drawFromPNG(2,2,"logoGS_result2.png");

$PieChart4->drawPieLegend(15,40,array("Alpha"=>20)); 
/* Render the picture to a file */
$myPicture4->render("pChart214/pieStatusd03.png");
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

                        <div class="col-md-2">                       
                          <div class="panel panel-success">
                            <div class="panel-heading">
                              <h3 class="panel-title"><strong>Totales Distrito 01</strong></h3>
                            </div>
                            <div class="panel-body">
                              <h1> <strong><?php echo $TotalSolicitudesD01;?></strong> </h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">                       
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Atendido Positivo</h3>
                            </div>
                            <div class="panel-body">
                              <h1> <strong><?php echo $TotalAtendidoPositivod01;?></strong> </h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">                       
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Atendido Negativo</h3>
                            </div>
                            <div class="panel-body">
                              <h1> <strong><?php echo $TotalAtendidoNegativod01;?></strong> </h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">                       
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Abierto</h3>
                            </div>
                            <div class="panel-body">
                              <h1> <strong><?php echo $TotalStatusPendientesd01;?></strong> </h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">                       
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Canalizado</h3>
                            </div>
                            <div class="panel-body">
                              <h1> <strong><?php echo $TotalCanalizadod01;?></strong> </h1>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- GRAFICA STATUS -->
                      <div align="center">
                        <img src="<?php echo base_url();?>pChart214/pieStatusd01.png" width="80%">
                      </div>
                    </div><!-- panel - success -->
                  </div><!-- col - 12 -->   
                </div><!-- row well -->


                  <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-success">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            
                            <div class="col-md-2">                       
                              <div class="panel panel-success">
                                <div class="panel-heading">
                                  <h3 class="panel-title"><strong>Totales Distrito 02</strong></h3>
                                </div>
                                <div class="panel-body">
                                  <h1> <strong><?php echo $TotalSolicitudesD02;?></strong> </h1>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">                       
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h3 class="panel-title">Atendido Positivo</h3>
                                </div>
                                <div class="panel-body">
                                  <h1> <strong><?php echo $TotalAtendidoPositivod02;?></strong> </h1>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">                       
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h3 class="panel-title">Atendido Negativo</h3>
                                </div>
                                <div class="panel-body">
                                  <h1> <strong><?php echo $TotalAtendidoNegativod02;?></strong> </h1>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">                       
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h3 class="panel-title">Abierto</h3>
                                </div>
                                <div class="panel-body">
                                  <h1> <strong><?php echo $TotalStatusPendientesd02;?></strong> </h1>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">                       
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h3 class="panel-title">Canalizado</h3>
                                </div>
                                <div class="panel-body">
                                  <h1> <strong><?php echo $TotalCanalizadod02;?></strong> </h1>
                                </div>
                              </div>
                            </div>

                        </div><!-- panel - body -->
                        <!-- GRAFICA STATUS -->
                        <div align="center">
                          <img src="<?php echo base_url();?>pChart214/pieStatusd02.png" width="80%">
                        </div>
                      </div><!-- panel - success -->
                    </div><!-- col - 12 -->   
                  </div><!-- row well -->

                
                <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-success">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            
                        <div class="col-md-2">                       
                          <div class="panel panel-success">
                            <div class="panel-heading">
                              <h3 class="panel-title"><strong>Totales Distrito 03</strong></h3>
                            </div>
                            <div class="panel-body">
                              <h1> <strong><?php echo $TotalSolicitudesD03;?></strong> </h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">                       
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Atendido Positivo</h3>
                            </div>
                            <div class="panel-body">
                              <h1> <strong><?php echo $TotalAtendidoPositivod03;?></strong> </h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">                       
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Atendido Negativo</h3>
                            </div>
                            <div class="panel-body">
                              <h1> <strong><?php echo $TotalAtendidoNegativod03;?></strong> </h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">                       
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Abierto</h3>
                            </div>
                            <div class="panel-body">
                              <h1> <strong><?php echo $TotalStatusPendientesd03;?></strong> </h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">                       
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h3 class="panel-title">Canalizado</h3>
                            </div>
                            <div class="panel-body">
                              <h1> <strong><?php echo $TotalCanalizadod03;?></strong> </h1>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- GRAFICA STATUS -->
                      <div align="center">
                        <img src="<?php echo base_url();?>pChart214/pieStatusd03.png" width="80%">
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