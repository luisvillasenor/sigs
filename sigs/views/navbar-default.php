<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand"></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <?php foreach ($componentes as $value) {
            if ($value->permiso != TRUE) {
              echo "<li>";
              echo "strtoupper($value->componente)";
              echo "</li>";            
            } else {
              echo "<li>";
              echo "<a href='".base_url()."$value->componente$value->recurso'>".strtoupper($value->componente)."</a>";
              echo "</li>";
            }
        }?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('admin/logout');?>">(<?php echo USER ?>) <span class="glyphicon glyphicon-off"> Salir</span></a></li>           
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>