<div class="container">
  <!-- Main component for a primary marketing message or call to action -->
  <div class="row well" align="center">
    <h1></h1>
  </div>
<?php
/* Include all the classes */ 
include("pChart214/class/pDraw.class.php"); 
include("pChart214/class/pImage.class.php"); 
include("pChart214/class/pData.class.php");
include("pChart214/class/pPie.class.php");
?>

<?php
/* Create your dataset object GRAFICA STATUS */ 
$myData4 = new pData(); 
$myData4->setAxisName(0,"Número de Soicitudes"); 
  switch (GEO) {
    case '01':
      $myData4->setSerieDescription("Labels","Distritos"); 
      $myData4->addPoints(array("Distrito 01"),"Labels");
      $myData4->setAbscissa("Labels");     
      break;
    case '02':
      $myData4->setSerieDescription("Labels","Distritos"); 
      $myData4->addPoints(array("Distrito 02"),"Labels");
      $myData4->setAbscissa("Labels");     
      break;    
    case '03':
      $myData4->setSerieDescription("Labels","Distritos"); 
      $myData4->addPoints(array("Distrito 03"),"Labels");
      $myData4->setAbscissa("Labels");     
      break;
    default:
      $myData4->setSerieDescription("Labels","Distritos"); 
      $myData4->addPoints(array("Distrito 01"),"Labels");
      $myData4->addPoints(array("Distrito 02"),"Labels");
      $myData4->addPoints(array("Distrito 03"),"Labels");
      $myData4->setAbscissa("Labels");     
      break;
  }
foreach($get_all_status as $itemStatus):
  foreach($grafica_status as $item):
    if ($itemStatus->status_id == $item->status) {
      /* Add data in your dataset */ 
      $myData4->addPoints(array(($item->total)),$itemStatus->status); 
    }
  endforeach;
endforeach;
/* Create a pChart object and associate your dataset */ 
$myPicture4 = new pImage(800,330,$myData4);
/* Turn of Antialiasing */ 
$myPicture4->Antialias = FALSE; 
/* Draw the background */ 
$Settings = array("R"=>141, "G"=>198, "B"=>63, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107); 
$myPicture4->drawFilledRectangle(0,0,800,330,$Settings); 
/* Overlay with a gradient */ 
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50); 
$myPicture4->drawGradientArea(0,0,800,330,DIRECTION_VERTICAL,$Settings); 
/* Add a border to the picture */ 
$myPicture4->drawRectangle(0,0,799,329,array("R"=>0,"G"=>0,"B"=>0)); 
/* Choose a nice font */
$myPicture4->setFontProperties(array("FontName"=>"pChart214/fonts/MankSans.ttf","FontSize"=>11));

/* Write some text */ 
$TextSettings = array("R"=>0,"G"=>0,"B"=>0,"Angle"=>0,"FontSize"=>15,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE);
$myPicture4->drawText(250,25,"Gráfica por Status",$TextSettings);

/* Define the boundaries of the graph area */
$myPicture4->setGraphArea(60,50,780,290);
/* Draw the scale */ 
$scaleSettings = array("GridR"=>100,"GridG"=>100,"GridB"=>100,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE); 
$myPicture4->drawScale($scaleSettings); 

/* Draw a JPG object */ 
 $myPicture4->drawFromPNG(5,2,"logoGS_result.png");



/* Write the chart legend */ 
$myPicture4->drawLegend(380,12,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL)); 
/* Turn on shadow computing */  
$myPicture4->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 
/* Draw the chart */ 
$Settings = array("DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>TRUE,"Rounded"=>FALSE,"Surrounding"=>30); 
$myPicture4->drawBarChart($Settings); 
/* Build the PNG file and send it to the web browser */ 
$myPicture4->Render("pChart214/grafica_status.png");
?>


<div class="row well">
<!-- GRAFICA STATUS -->
<img src="<?php echo base_url();?>pChart214/grafica_status.png" width="100%">
</div>



</div> <!-- /container -->    