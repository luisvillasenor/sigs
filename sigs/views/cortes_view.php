<div class="container">
  <!-- Main component for a primary marketing message or call to action -->
  <div class="row well">      
      <div id="navbar" class="navbar-collapse collapse"> 
        <ul class="nav navbar-nav navbar-left">
          <li>
            <form class="form-inline" method="post" action="<?php echo base_url();?>cortes/index">
              <div class="form-group">
                <label class="sr-only" for="from">from</label>
                <input type="text" class="form-control" name="from" id="from" placeholder="Fecha Inicial">
              </div>
              <div class="form-group">
                <label class="sr-only" for="to">to</label>
                <input type="text" class="form-control" name="to" id="to" placeholder="Fecha Final">
              </div>

              <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default">
                  <input type="radio" name="casa" id="casa1" value="01" autocomplete="off"> Distrito 01
                </label>
                <label class="btn btn-default">
                  <input type="radio" name="casa" id="casa2" value="02" autocomplete="off"> Distrito 02
                </label>
                <label class="btn btn-default">
                  <input type="radio" name="casa" id="casa3" value="03" autocomplete="off"> Distrito 03
                </label>
                <label class="btn btn-default">
                  <input type="radio" name="casa" id="casa4" value="AGS" autocomplete="off"> Los 3 (AGS)
                </label>
              </div>

              <button type="submit" class="btn btn-danger">Generar Corte</button>
            </form>
          </li>                 
        </ul>
        <ul class="nav navbar-nav navbar-rigth">
          <li>
            <div class="dropdown">
              <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                Filtros por: 
                <span class="caret"></span>
              </button>              
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
            <?php foreach ($get_all_status as $stat) : ?>
              <li role="presentation"><a role="menuitem" tabindex="-1" href='<?php echo base_url('cortes/filtropor');?>/<?php echo $stat->status_id;?>'><?php echo $stat->status;?></a></li>
              <?php endforeach; ?>
              </ul>
            </div>
            
          </li>                 
        </ul>
      </div><!--/.nav-collapse -->
  </div>
  <div class="row well">
  <h2><a href="<?php echo base_url('cortes/exportar_corte/');?>/<?php echo $from;?>/<?php echo $to;?>/<?php echo $casa;?>"><span class="glyphicon glyphicon-export"> Corte de Solicitudes</span></a></h2>
  Total del Corte: <span class="badge"><?php echo $total_cortes ?></span><br>
  Total de Solicitudes: <span class="badge"><?php echo $total_rows ?></span><p>
  <table class="table table-condensed">
    <tr>
    <th>ID</th>   
    <th>FECHA</th>
    <th>SOLICITUD</th>
    <th>CIUDADANO</th>
    <th>DOMICILIO</th>
    <TH>TELEFONO</TH>
    <th>CANALIZADO</th>
    <th>STATUS</th>
    <th>USER</th>
    <th>DISTRITO</th>
    </tr>
    <?php
      foreach ($cortes as $corte) { ?>
        <tr>
          <td><?php echo $corte->id; ?></td>
          <td><?php echo date('Y-m-d',strtotime($corte->fecha)); ?></td>
          <td><?php echo $corte->concepto; ?></td>
          <td><?php echo $corte->ciudadano; ?></td>
          <td>
            Calle: <?php echo $corte->calle; ?><br>
            <?php 
            foreach ($get_all_secciones as $secc) : 
                if ($corte->seccion == $secc->id) { 
                  echo "Col:";
                  echo $secc->colonia;
                  echo "<br>";
                  echo "Seccion:";
                  echo $secc->seccion;
                  echo "<br>";
                }
            endforeach;
            ?> 
          </td>
          <td><?php echo $corte->telefono; ?></td>
          <td>
              <?php foreach ($get_all_deps as $dep) : 
                if ($dep->id == $corte->canalizado) { 
                  echo $dep->entidad; 
                }
              endforeach;?>               
          </td>
          <td>
          <?php foreach ($get_all_status as $stat) : 
                if ($stat->status_id == $corte->status) {
                  echo $stat->status; 
                }
              endforeach;?>
          </td>
          <td><?php echo $corte->user; ?></td>
          <td><?php echo $corte->geo; ?></td>          
        </tr>
      <?php } ?>
  </table>
  </div>
</div> <!-- /container --> 