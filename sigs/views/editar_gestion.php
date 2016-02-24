<div class="container">
<!-- Main component for a primary marketing message or call to action -->
<div class="row well">	    
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-left">
</ul>
<ul class="nav navbar-nav navbar-right">
<li>	    
     	<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
				  Editar <?php echo COMPONENTE ?>
				</button>
				<!-- Modal -->
				<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Actualizar Ciudadano</h4>
				      </div>
					  <form class="form-horizontal" method="POST" action="<?php echo base_url('gestiones/actualizar');?>">
				      <div class="modal-body">
						<?php foreach ($get_one_gestion as $one) { ?>
							<div class="form-group">
							    <label for="id" class="col-sm-2 control-label">ID</label>
							    <div class="col-sm-10">
							      <input type="text" name="id" class="form-control" id="id" value="<?php echo $one->id;?>" readonly>
							    </div>
							</div>
							<div class="form-group">
							    <label for="fecha" class="col-sm-2 control-label">Fecha</label>
							    <div class="col-sm-10">
							      <input type="text" name="fecha" class="form-control" id="fecha" value="<?php echo $one->fecha;?>" readonly>
							    </div>
							</div>
							<div class="form-group">
							    <label for="user" class="col-sm-2 control-label">Gestor</label>
							    <div class="col-sm-10">
							      <input type="text" name="user" class="form-control" id="user" value="<?php echo USER;?>" readonly>
							    </div>
							</div>
							<div class="form-group">
							    <label for="concepto" class="col-sm-2 control-label">Concepto</label>
							    <div class="col-sm-10">
							      <input type="text" name="concepto" class="form-control" id="concepto" value="<?php echo $one->concepto;?>">
							    </div>
							</div>
							<div class="form-group">
							    <label for="distrito" class="col-sm-2 control-label">distrito</label>
							    <div class="col-sm-10">
							      <input type="text" name="distrito" class="form-control" id="distrito" value="<?php echo $one->distrito;?>" readonly>
							    </div>
							</div>
							<div class="form-group">
							    <label for="solicitud_id" class="col-sm-2 control-label">Solicitud</label>
							    <div class="col-sm-10">
							      <input type="text" name="solicitud_id" class="form-control" id="solicitud_id" value="<?php echo $one->solicitud_id;?>" readonly>
							    </div>
							</div>
						<?php } ?>	
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				        <button type="submit" class="btn btn-primary">Guardar</button>
				      </div>
				      </form>
				    </div>
				  </div>
				</div>
</li>           
</ul>
</div><!--/.nav-collapse -->
</div>

<div class="row well">
			<?php foreach ($get_one_gestion as $one) { ?>
			ID:<?php echo "$one->id";?>
			<br>
			Fecha: <?php echo "$one->fecha";?>
			<br>
			Gestor: <?php echo "$one->user";?>
			<br>
			Gestion: <?php echo "$one->concepto";?>

		<?php } ?>

</div>
</div> <!-- /container -->





