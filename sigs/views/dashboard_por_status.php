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

$TotalAbierto = $TotalAbiertod01 + $TotalAbiertod02 + $TotalAbiertod03 ;
$TotalLatentes = $TotalLatentesd01 + $TotalLatentesd02 + $TotalLatentesd03 ;
$TotalCanalizado = $TotalCanalizadod01 + $TotalCanalizadod02 + $TotalCanalizadod03;
$TotalAtendidoPositivo = $TotalAtendidoPositivod01 + $TotalAtendidoPositivod02 + $TotalAtendidoPositivod03;
$TotalAtendidoNegativo = $TotalAtendidoNegativod01 + $TotalAtendidoNegativod02 + $TotalAtendidoNegativod03;
$TotalPendiente = $TotalPendiented01 + $TotalPendiented02 + $TotalPendiented03 ;

/* pData object creation */
$MyData = new pData();    
/* Data definition */
$MyData->addPoints(array($TotalAbierto,$TotalLatentes,$TotalCanalizado,$TotalAtendidoPositivo,$TotalAtendidoNegativo),"Value");  
/* Labels definition */
$MyData->addPoints(array("Abierto","Latente","Canalizado","Atendido+","Atendido-"),"Legend");
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
$myPicture->drawText(180,18,"Solicitudes TOTALES por STATUS",array("R"=>255,"G"=>255,"B"=>255));
/* Set the default font properties */ 
$myPicture->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>9,"R"=>80,"G"=>80,"B"=>80));
/* Enable shadow computing */ 
$myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>150,"G"=>150,"B"=>150,"Alpha"=>50));
/* Create the pPie object */ 
$PieChart = new pPie($myPicture,$MyData);
/* Draw a simple pie chart */ 
//$PieChart3->draw2DPie(140,125,array("SecondPass"=>FALSE));
/* Draw an AA pie chart */ 
$PieChart->draw2DPie(250,125,array("WriteValues"=>PIE_VALUE_PERCENTAGE,"DrawLabels"=>FALSE,"DataGapAngle"=>10,"LabelStacked"=>TRUE,"Border"=>TRUE));
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
$myPicture->render("pChart214/pieStatus.png");
?>  
<?php
///////////////////////////// GRAFICAS ABIERTO
/* pData object creation */
$MyData11 = new pData();    
/* Data definition */
foreach ($grafica_canalizados_abiertas as $item) {
  $MyData11->addPoints(array($item->total),"Solicitudes");  
}
/* Labels definition */
foreach ($grafica_canalizados_abiertas as $item) {
  foreach ($get_dependencias as $value) {
    if ($item->canalizado == $value->id) {
      $MyData11->addPoints(array($value->entidad),"Legend");
    }
  }
}
$MyData11->setAbscissa("Legend"); 
/* Create the pChart object */
$myPicture11 = new pImage(500,430,$MyData11);
/* Draw a solid background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture11->drawFilledRectangle(0,0,500,430,$Settings);
/* Draw a gradient overlay */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture11->drawGradientArea(0,0,500,430,DIRECTION_VERTICAL,$Settings);
$myPicture11->drawGradientArea(0,0,500,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
/* Add a border to the picture */
$myPicture11->drawRectangle(0,0,499,429,array("R"=>0,"G"=>0,"B"=>0));
/* Write the picture title */ 
$myPicture11->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>9));
$myPicture11->drawText(180,18,"Dependencias con Solicitudes",array("R"=>255,"G"=>255,"B"=>255));
/* Set the default font properties */ 
$myPicture11->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>5,"R"=>80,"G"=>80,"B"=>80));
/* Enable shadow computing */ 
$myPicture11->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>150,"G"=>150,"B"=>150,"Alpha"=>50));
/* Create the pPie object */ 
$PieChart11 = new pPie($myPicture11,$MyData11);
/* Draw a simple pie chart */ 
//$PieChart3->draw2DPie(140,125,array("SecondPass"=>FALSE));
/* Draw an AA pie chart */ 
$PieChart11->draw2DPie(350,120,array("WriteValues"=>PIE_VALUE_PERCENTAGE,"DrawLabels"=>FALSE,"DataGapAngle"=>10,"LabelStacked"=>TRUE,"Border"=>TRUE));
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
$myPicture11->render("pChart214/pieCanalizacionAbierto.png");
?>

<?php
///////////////////////////// GRAFICAS LATENTES
/* pData object creation */
$MyData1 = new pData();    
/* Data definition */
foreach ($grafica_canalizados_latente as $item) {
  $MyData1->addPoints(array($item->total),"Solicitudes");  
}
/* Labels definition */
foreach ($grafica_canalizados_latente as $item) {
  foreach ($get_dependencias as $value) {
    if ($item->canalizado == $value->id) {
      $MyData1->addPoints(array($value->entidad),"Legend");
    }
  }
}
$MyData1->setAbscissa("Legend"); 
/* Create the pChart object */
$myPicture1 = new pImage(500,430,$MyData1);
/* Draw a solid background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture1->drawFilledRectangle(0,0,500,430,$Settings);
/* Draw a gradient overlay */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture1->drawGradientArea(0,0,500,430,DIRECTION_VERTICAL,$Settings);
$myPicture1->drawGradientArea(0,0,500,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
/* Add a border to the picture */
$myPicture1->drawRectangle(0,0,499,429,array("R"=>0,"G"=>0,"B"=>0));
/* Write the picture title */ 
$myPicture1->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>9));
$myPicture1->drawText(180,18,"Dependencias con Solicitudes",array("R"=>255,"G"=>255,"B"=>255));
/* Set the default font properties */ 
$myPicture1->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>5,"R"=>80,"G"=>80,"B"=>80));
/* Enable shadow computing */ 
$myPicture1->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>150,"G"=>150,"B"=>150,"Alpha"=>50));
/* Create the pPie object */ 
$PieChart1 = new pPie($myPicture1,$MyData1);
/* Draw a simple pie chart */ 
//$PieChart3->draw2DPie(140,125,array("SecondPass"=>FALSE));
/* Draw an AA pie chart */ 
$PieChart1->draw2DPie(350,120,array("WriteValues"=>PIE_VALUE_PERCENTAGE,"DrawLabels"=>FALSE,"DataGapAngle"=>10,"LabelStacked"=>TRUE,"Border"=>TRUE));
/* Write the legend */
$myPicture1->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>5));
$myPicture1->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
$myPicture1->drawText(140,200,"",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
$myPicture1->drawText(350,210,"",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
/* Write the legend box */  
$myPicture1->setShadow(FALSE); 
/* Draw a JPG object */ 
$myPicture1->drawFromPNG(2,2,"logoGS_result2.png");

$PieChart1->drawPieLegend(15,40,array("Alpha"=>20)); 
/* Render the picture to a file */
$myPicture1->render("pChart214/pieCanalizacionLatente.png");
?>

<?php
///////////////////////////// GRAFICAS CANALIZACION
/* pData object creation */
$MyData2 = new pData();    
/* Data definition */
foreach ($grafica_canalizados_canalizado as $item) {
  $MyData2->addPoints(array($item->total),"Solicitudes");  
}
/* Labels definition */
foreach ($grafica_canalizados_canalizado as $item) {
  foreach ($get_dependencias as $value) {
    if ($item->canalizado == $value->id) {
      $MyData2->addPoints(array($value->entidad),"Legend");
    }
  }
}
$MyData2->setAbscissa("Legend"); 
/* Create the pChart object */
$myPicture2 = new pImage(500,430,$MyData2);
/* Draw a solid background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture2->drawFilledRectangle(0,0,500,430,$Settings);
/* Draw a gradient overlay */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture2->drawGradientArea(0,0,500,430,DIRECTION_VERTICAL,$Settings);
$myPicture2->drawGradientArea(0,0,500,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
/* Add a border to the picture */
$myPicture2->drawRectangle(0,0,499,429,array("R"=>0,"G"=>0,"B"=>0));
/* Write the picture title */ 
$myPicture2->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>9));
$myPicture2->drawText(180,18,"Dependencias con Solicitudes",array("R"=>255,"G"=>255,"B"=>255));
/* Set the default font properties */ 
$myPicture2->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>5,"R"=>80,"G"=>80,"B"=>80));
/* Enable shadow computing */ 
$myPicture2->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>150,"G"=>150,"B"=>150,"Alpha"=>50));
/* Create the pPie object */ 
$PieChart2 = new pPie($myPicture2,$MyData2);
/* Draw a simple pie chart */ 
//$PieChart3->draw2DPie(140,125,array("SecondPass"=>FALSE));
/* Draw an AA pie chart */ 
$PieChart2->draw2DPie(350,120,array("WriteValues"=>PIE_VALUE_PERCENTAGE,"DrawLabels"=>FALSE,"DataGapAngle"=>10,"LabelStacked"=>TRUE,"Border"=>TRUE));
/* Write the legend */
$myPicture2->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>5));
$myPicture2->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
$myPicture2->drawText(140,200,"",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
$myPicture2->drawText(350,210,"",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
/* Write the legend box */  
$myPicture2->setShadow(FALSE); 
/* Draw a JPG object */ 
$myPicture2->drawFromPNG(2,2,"logoGS_result2.png");

$PieChart2->drawPieLegend(15,40,array("Alpha"=>20)); 
/* Render the picture to a file */
$myPicture2->render("pChart214/pieCanalizacion.png");
?>

<?php
///////////////////////////// GRAFICAS ATENDIDAS POSITOVO
/* pData object creation */
$MyData3 = new pData();    
/* Data definition */
foreach ($grafica_canalizados_atendido_pos as $item) {
  $MyData3->addPoints(array($item->total),"Solicitudes");  
}
/* Labels definition */
foreach ($grafica_canalizados_atendido_pos as $item) {
  foreach ($get_dependencias as $value) {
    if ($item->canalizado == $value->id) {
      $MyData3->addPoints(array($value->entidad),"Legend");
    }
  }
}
$MyData3->setAbscissa("Legend"); 
/* Create the pChart object */
$myPicture3 = new pImage(500,430,$MyData3);
/* Draw a solid background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture3->drawFilledRectangle(0,0,500,430,$Settings);
/* Draw a gradient overlay */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture3->drawGradientArea(0,0,500,430,DIRECTION_VERTICAL,$Settings);
$myPicture3->drawGradientArea(0,0,500,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
/* Add a border to the picture */
$myPicture3->drawRectangle(0,0,499,429,array("R"=>0,"G"=>0,"B"=>0));
/* Write the picture title */ 
$myPicture3->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>9));
$myPicture3->drawText(180,18,"Dependencias con Solicitudes",array("R"=>255,"G"=>255,"B"=>255));
/* Set the default font properties */ 
$myPicture3->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>5,"R"=>80,"G"=>80,"B"=>80));
/* Enable shadow computing */ 
$myPicture3->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>150,"G"=>150,"B"=>150,"Alpha"=>50));
/* Create the pPie object */ 
$PieChart3 = new pPie($myPicture3,$MyData3);
/* Draw a simple pie chart */ 
//$PieChart3->draw2DPie(140,125,array("SecondPass"=>FALSE));
/* Draw an AA pie chart */ 
$PieChart3->draw2DPie(350,120,array("WriteValues"=>PIE_VALUE_PERCENTAGE,"DrawLabels"=>FALSE,"DataGapAngle"=>10,"LabelStacked"=>TRUE,"Border"=>TRUE));
/* Write the legend */
$myPicture3->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>5));
$myPicture3->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
$myPicture3->drawText(140,200,"",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
$myPicture3->drawText(350,210,"",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
/* Write the legend box */  
$myPicture3->setShadow(FALSE); 
/* Draw a JPG object */ 
$myPicture3->drawFromPNG(2,2,"logoGS_result2.png");

$PieChart3->drawPieLegend(15,40,array("Alpha"=>20)); 
/* Render the picture to a file */
$myPicture3->render("pChart214/pieCanalizacionAtenPos.png");
?>

<?php
///////////////////////////// GRAFICAS ATENDIDAS NEGATIVO
/* pData object creation */
$MyData4 = new pData();    
/* Data definition */
foreach ($grafica_canalizados_atendido_neg as $item) {
  $MyData4->addPoints(array($item->total),"Solicitudes");  
}
/* Labels definition */
foreach ($grafica_canalizados_atendido_neg as $item) {
  foreach ($get_dependencias as $value) {
    if ($item->canalizado == $value->id) {
      $MyData4->addPoints(array($value->entidad),"Legend");
    }
  }
}
$MyData4->setAbscissa("Legend"); 
/* Create the pChart object */
$myPicture4 = new pImage(500,430,$MyData4);
/* Draw a solid background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture4->drawFilledRectangle(0,0,500,430,$Settings);
/* Draw a gradient overlay */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture4->drawGradientArea(0,0,500,430,DIRECTION_VERTICAL,$Settings);
$myPicture4->drawGradientArea(0,0,500,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>100));
/* Add a border to the picture */
$myPicture4->drawRectangle(0,0,499,429,array("R"=>0,"G"=>0,"B"=>0));
/* Write the picture title */ 
$myPicture4->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>9));
$myPicture4->drawText(180,18,"Dependencias con Solicitudes",array("R"=>255,"G"=>255,"B"=>255));
/* Set the default font properties */ 
$myPicture4->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>5,"R"=>80,"G"=>80,"B"=>80));
/* Enable shadow computing */ 
$myPicture4->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>150,"G"=>150,"B"=>150,"Alpha"=>50));
/* Create the pPie object */ 
$PieChart4 = new pPie($myPicture4,$MyData4);
/* Draw a simple pie chart */ 
//$PieChart3->draw2DPie(140,125,array("SecondPass"=>FALSE));
/* Draw an AA pie chart */ 
$PieChart4->draw2DPie(350,120,array("WriteValues"=>PIE_VALUE_PERCENTAGE,"DrawLabels"=>FALSE,"DataGapAngle"=>10,"LabelStacked"=>TRUE,"Border"=>TRUE));
/* Write the legend */
$myPicture4->setFontProperties(array("FontName"=>"pChart214/fonts/verdana.ttf","FontSize"=>5));
$myPicture4->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
$myPicture4->drawText(140,200,"",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
$myPicture4->drawText(350,210,"",array("R"=>0,"G"=>0,"B"=>0,"Align"=>TEXT_ALIGN_TOPMIDDLE));
/* Write the legend box */  
$myPicture4->setShadow(FALSE); 
/* Draw a JPG object */ 
$myPicture4->drawFromPNG(2,2,"logoGS_result2.png");

$PieChart4->drawPieLegend(15,40,array("Alpha"=>20)); 
/* Render the picture to a file */
$myPicture4->render("pChart214/pieCanalizacionAtenNeg.png");
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
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-fullscreen"></span></a> Pantalla Completa</p>                

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
                                      <th>Total de Solicitudes</th>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Abierto</td>
                                        <td><?php echo $TotalAbierto;?></td>
                                      </tr>
                                      <tr>
                                        <td>Latente</td>
                                        <td><?php echo $TotalLatentes;?></td>
                                      </tr>
                                      <tr>
                                        <td>Canalizado</td>
                                        <td><?php echo $TotalCanalizado;?></td>
                                      </tr>
                                      <tr>
                                        <td>Atendido +</td>
                                        <td><?php echo $TotalAtendidoPositivo;?></td>
                                      </tr>
                                      <tr>
                                        <td>Atendido -</td>
                                        <td><?php echo $TotalAtendidoNegativo;?></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-8">                       
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h3 class="panel-title">Grafica de Datos</h3>
                                </div>
                                <div class="panel-body">
                                    <!-- GRAFICA STATUS -->
                                    <div align="center">
                                      <img src="<?php echo base_url();?>pChart214/pieStatus.png" width="80%">
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>   
                  </div>
</div><!-- row well -->


<!-- DESACTIVACION TEMPORAL, REMOVER CUANDO SEA NECESARIO -->
<div class="row" align="center">
                      <div class="col-lg-12">
                            <!-- GRAFICA STATUS
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title">
                                  <h2>Solicitudes <strong>ABIERTAS</strong></h2>
                                  <p></p>
                                </h3>
                              </div>
                              <div class="panel-body">
                                <img src="<?php echo base_url();?>pChart214/pieCanalizacionAbierto.png" width="98%"> 
                              </div>
                              <div class="panel-body">
                              
                              <div class="table-responsive">
                              <table class="table table-bordered table-striped table-responsive">
                                <thead>
                                  <th>Dependencia</th>
                                  <th>Total de Solicitudes</th>
                                </thead>
                                <tbody>
                                <?php foreach ($get_dependencias as $deps) { ?>
                                <?php foreach ($grafica_canalizados_abiertas as $item) { ?>
                                <?php if ($deps->id == $item->canalizado) { ?>
                                  <tr>
                                    <td><?php echo $deps->entidad;?></td>
                                    <td><?php echo $item->total;?></td>
                                  </tr>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>

                                </tbody>
                              </table>
                              </div>
                              </div>
                            </div>            
                     </div>
</div>row well -->

<div class="row" align="center">
                      <div class="col-lg-12">
                            <!-- GRAFICA STATUS
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title">
                                  <h2>Solicitudes <strong>LATENTES</strong></h2>
                                  <p>Estas solicitudes aún estan en bandeja de salida pero ya estan identificadas a que Dependencia se van.</p>
                                </h3>
                              </div>
                              <div class="panel-body">
                                <img src="<?php echo base_url();?>pChart214/pieCanalizacionLatente.png" width="98%"> 
                              </div>
                              <div class="panel-body">
      
                              <div class="table-responsive">
                              <table class="table table-bordered table-striped table-responsive">
                                <thead>
                                  <th>Dependencia</th>
                                  <th>Total de Solicitudes</th>
                                </thead>
                                <tbody>
                                <?php foreach ($get_dependencias as $deps) { ?>
                                <?php foreach ($grafica_canalizados_latente as $item) { ?>
                                <?php if ($deps->id == $item->canalizado) { ?>
                                  <tr>
                                    <td><?php echo $deps->entidad;?></td>
                                    <td><?php echo $item->total;?></td>
                                  </tr>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                                </tbody>
                              </table>
                              </div>
                              </div>
                            </div>            
                     </div>
</div> -->

<div class="row" align="center">
                      <div class="col-lg-12">
                            <!-- GRAFICA STATUS -->
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title">
                                  <h2>Solicitudes <strong>CANALIZADAS</strong></h2>
                                  <p>Estas solicitudes ya estan con las Dependencia y se estan Gestionando para su Atención</p>
                                </h3>
                              </div>
                              <div class="panel-body">
                               <img src="<?php echo base_url();?>pChart214/pieCanalizacion.png" width="98%"> 
                              </div>
                              <div class="panel-body">
                              <!-- Table -->
                              <div class="table-responsive">
                              <table class="table table-bordered table-striped table-responsive">
                                <thead>
                                  <th>Dependencia</th>
                                  <th>Total de Solicitudes</th>
                                </thead>
                                <tbody>
                                <?php foreach ($get_dependencias as $deps) { ?>
                                <?php foreach ($grafica_canalizados_canalizado as $item) { ?>
                                <?php if ($deps->id == $item->canalizado) { ?>
                                  <tr>
                                    <td><?php echo $deps->entidad;?></td>
                                    <td><?php echo $item->total;?></td>
                                  </tr>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                                </tbody>
                              </table>
                              </div>
                              </div>
                            </div>            
                     </div>
</div><!-- row well -->


<div class="row" align="center">
                      <div class="col-lg-12">
                            <!-- GRAFICA STATUS -->
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title">
                                  <h2>Solicitudes <strong>ATENDIDAS POSITIVAMENTE</strong></h2>
                                  <p>Estas solicitudes tuvieron una Gestión por favorable y entera satisfacción.</p>
                                </h3>
                              </div>
                              <div class="panel-body">
                               <img src="<?php echo base_url();?>pChart214/pieCanalizacionAtenPos.png" width="98%"> 
                              </div>
                              <div class="panel-body">
                              <!-- Table -->
                              <div class="table-responsive">
                              <table class="table table-bordered table-striped table-responsive">
                                <thead>
                                  <th>Dependencia</th>
                                  <th>Total de Solicitudes</th>
                                </thead>
                                <tbody>
                                <?php foreach ($get_dependencias as $deps) { ?>
                                <?php foreach ($grafica_canalizados_atendido_pos as $item) { ?>
                                <?php if ($deps->id == $item->canalizado) { ?>
                                  <tr>
                                    <td><?php echo $deps->entidad;?></td>
                                    <td><?php echo $item->total;?></td>
                                  </tr>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                                </tbody>
                              </table>
                              </div>
                              </div>
                            </div>            
                     </div>
</div><!-- row well -->

<div class="row" align="center">
                      <div class="col-lg-12">
                            <!-- GRAFICA STATUS -->
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title">
                                  <h2>Solicitudes <strong>ATENDIDAS NEGATIVAMENTE</strong></h2>
                                  <p>Estas solicitudes fueron atendidas, sin embargo por la naturaleza de la solicitud no es posible dar una respuesta favorable, sin embargo se hace la Gestión correpondiente y se le da atención al Ciudadano.</p>
                                </h3>
                              </div>
                              <div class="panel-body">
                               <img src="<?php echo base_url();?>pChart214/pieCanalizacionAtenNeg.png" width="98%"> 
                              </div>
                              <div class="panel-body">
                              <!-- Table -->
                              <div class="table-responsive">
                              <table class="table table-bordered table-striped table-responsive">
                                <thead>
                                  <th>Dependencia</th>
                                  <th>Total de Solicitudes</th>
                                </thead>
                                <tbody>
                                <?php foreach ($get_dependencias as $deps) { ?>
                                <?php foreach ($grafica_canalizados_atendido_neg as $item) { ?>
                                <?php if ($deps->id == $item->canalizado) { ?>
                                  <tr>
                                    <td><?php echo $deps->entidad;?></td>
                                    <td><?php echo $item->total;?></td>
                                  </tr>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                                </tbody>
                              </table>
                              </div>
                              </div>
                            </div>            
                     </div>
</div><!-- row well -->



                </div><!-- row -->
            </div>
        </div>
        <!-- /#page-content-wrapper -->


    </div>
    <!-- /#wrapper -->