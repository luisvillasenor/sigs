        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">SEG</a>
        </div>
                <div id="navbar" class="navbar-collapse collapse">
                  
                    <?php $attributes = array('class' => 'navbar-form navbar-right form-inline', 'role' => 'search');
                    echo form_open(base_url(), $attributes); ?>
                    <div class="form-group">
                    <?php  
                    echo form_input('email_address', set_value('email_address'), 'id="email_address" class="form-control" placeholder="Email"');
                    ?>
                    </div>
                    <div class="form-group">
                    <?php  
                    echo form_password('password', '', 'id="password" class="form-control" placeholder="Password"');
                    ?>
                    </div>
                    <button type="submit" class="btn btn-danger">Acceso</button>
                    <?php echo form_close(); ?>
                  
                </div><!--/.nav-collapse -->
            
            </div>
        </nav>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
          <div class="container">
            <h1>Sistema Estatal de Gestión</h1>
                <p class="lead bg-danger">El Sistema Estatal de Gestión Social es de uso exclusivo.</p>
            <blockquote>Si piensas que tienes problemas con las Matemáticas, deberías ver mis problemas.<small>Albert Einstein, <cite title="Source Title">Physicist</cite></small></blockquote>
            <p><a class="btn btn-default btn-lg" role="button">Ver Mapa &raquo;</a></p>
          </div>
        </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Distrito 01</h2>
          <p></p>
          <p><a class="btn btn-default" href="#" role="button">Ver Mapa &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Distrito 02</h2>
          <p></p>
          <p><a class="btn btn-default" href="#" role="button">Ver Mapa &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Distrito 03</h2>
          <p></p>
          <p><a class="btn btn-default" href="#" role="button">Ver Mapa &raquo;</a></p>
        </div>
      </div>