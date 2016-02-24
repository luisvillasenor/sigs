    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Version BETA (Etapa de Preubas)</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <?php foreach ($componentes as $value) {
            if ($value->permiso != TRUE) {
              echo "<li>";
              echo "$value->componente";
              echo "</li>";            
            } else {
              echo "<li>";
              echo "<a href='".base_url()."$value->componente$value->recurso'>$value->componente</a>";
              echo "</li>";
            }
        }?>
            <li><a href="http://getbootstrap.com/examples/dashboard/#">Dashboard</a></li>
            <li><a href="http://getbootstrap.com/examples/dashboard/#">Settings</a></li>
            <li><a href="http://getbootstrap.com/examples/dashboard/#">Profile</a></li>
            <li><a href="http://getbootstrap.com/examples/dashboard/#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
