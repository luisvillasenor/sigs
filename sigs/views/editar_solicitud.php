<div class="container">
<!-- Main component for a primary marketing message or call to action -->
<div class="row well">	    
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-left">
<li>
	<?php foreach ($get_one_solicitud as $one) { ?>
		<a href="<?php echo base_url('solicitudes/nuevo')."/$one->ciudadano_id";?>">Ciudadano: <?php echo "$one->ciudadano_id";?></a>
	<?php } ?>
</li>
<li> 
	<a class="btn btn-default btn-sm" href="<?php echo base_url('solicitudes/index');?>" role="button">Todos</a>
</li>           
</ul>
<ul class="nav navbar-nav navbar-right">
<li>	    
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
Editar <?php echo COMPONENTE ?>
</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Actualizar Solicitud</h4>
</div>

<form class="form-horizontal" method="POST" action="<?php echo base_url('solicitudes/actualizar');?>">
<div class="modal-body">
<?php foreach ($get_one_solicitud as $solicitud) {?>
<input type="hidden" name="fecha" class="form-control" id="fecha" value="<?php echo $solicitud->fecha;?>">
<div class="form-group">
<label for="id" class="col-sm-2 control-label">ID</label>
<div class="col-sm-10">
<input type="text" name="id" class="form-control" id="id" value="<?php echo $solicitud->id;?>" readonly>
</div>
</div>
<div class="form-group">
<label for="folio" class="col-sm-2 control-label">folio</label>
<div class="col-sm-10">
<input type="text" name="folio" class="form-control" id="folio" value="<?php echo $solicitud->folio;?>">
</div>
</div>
<div class="form-group">
<label for="concepto" class="col-sm-2 control-label">concepto</label>
<div class="col-sm-10">
<textarea type="text" name="concepto" class="form-control" rows="5" id="concepto"><?php echo $solicitud->concepto;?></textarea>
</div>
</div>
<div class="form-group">
    <label for="clasificado" class="col-sm-2 control-label">Clasificado</label>
    <div class="col-sm-10">
      <select class="form-control" name="clasificado">
      <?php if ($solicitud->clasificado == "Producto") { ?>
      	<option value="Producto" selected="selected">Producto</option>
      	<option value="Servicio">Servicio</option> 
      <?php } ?>
      <?php if ($solicitud->clasificado == "Servicio") { ?>
      	<option value="Producto">Producto</option>
		    <option value="Servicio" selected="selected">Servicio</option>  
      <?php } ?> 

	</select>
    </div>
  </div>
<div class="form-group">
<label for="canalizado" class="col-sm-2 control-label">canalizado</label>
<div class="col-sm-10">
<select class="form-control" name="canalizado">
<?php
foreach ($get_all_deps as $dep) : 
  if ($dep->id == $solicitud->canalizado) { ?>
    <option value="<?php echo $dep->id;?>" selected="selected"><?php echo $dep->entidad;?></option>
  <?php } ?>
        <option value="<?php echo $dep->id;?>"><?php echo $dep->entidad;?></option>
<?php endforeach; ?>
</select>
</div>
</div>
<div class="form-group">
<label for="user" class="col-sm-2 control-label">user</label>
<div class="col-sm-10">
<input type="text" name="user" class="form-control" id="user" value="<?php echo USER ?>" readonly>
</div>
</div>
<div class="form-group">
<label for="status" class="col-sm-2 control-label">status</label>
<div class="col-sm-10">
<?php
foreach ($get_all_status as $stat) : 
  if ($stat->status_id == $solicitud->status) { ?>
    <input type="hidden" name="status" class="form-control" id="status" value="<?php echo $stat->status_id;?>">
    <input type="text" class="form-control" value="<?php echo $stat->status;?>" readonly>
  <?php }
endforeach;               
?>
</div>
</div>
<div class="form-group">
<label for="ciudadano_id" class="col-sm-2 control-label">Ciudadano</label>
<div class="col-sm-10">
<input type="text" name="ciudadano_id" class="form-control" id="ciudadano_id" value="<?php echo $solicitud->ciudadano_id;?>" readonly>
</div>
</div>
<div class="form-group">
<label for="geo" class="col-sm-2 control-label">Distrito</label>
<div class="col-sm-10">
<input type="text" name="geo" class="form-control" id="geo" value="<?php echo $solicitud->geo;?>" readonly>
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
<?php foreach ($get_one_solicitud as $solicitud) {?>
<div class="form-group">
<label for="id" class="col-sm-2 control-label">ID</label>
<div class="col-sm-10">
<input type="text" name="id" class="form-control" id="id" placeholder="id" value="<?php echo $solicitud->id;?>" readonly>
</div>
</div>
<div class="form-group">
<label for="folio" class="col-sm-2 control-label">folio</label>
<div class="col-sm-10">
<input type="text" name="folio" class="form-control" id="folio" placeholder="folio" value="<?php echo $solicitud->folio;?>" readonly>
</div>
</div>
<div class="form-group">
<label for="concepto" class="col-sm-2 control-label">concepto</label>
<div class="col-sm-10">
<input type="text" name="concepto" class="form-control" id="concepto" placeholder="concepto" value="<?php echo $solicitud->concepto;?>" readonly>
</div>
</div>
<div class="form-group">
<label for="clasificado" class="col-sm-2 control-label">clasificado</label>
<div class="col-sm-10">
<input type="text" name="clasificado" class="form-control" id="clasificado" placeholder="clasificado" value="<?php echo $solicitud->clasificado;?>" readonly>
</div>
</div>
<div class="form-group">
<label for="canalizado" class="col-sm-2 control-label">canalizado</label>
<div class="col-sm-10">
<?php
foreach ($get_all_deps as $dep) : 
  if ($dep->id == $solicitud->canalizado) { ?>
    <input type="text" name="canalizado" class="form-control" id="canalizado" value="<?php echo $dep->entidad;?>" readonly>
  <?php }
endforeach;               
?>
</div>
</div>
<div class="form-group">
<label for="user" class="col-sm-2 control-label">user</label>
<div class="col-sm-10">
<input type="text" name="user" class="form-control" id="user" value="<?php echo $solicitud->user;?>" readonly>
</div>
</div>
<div class="form-group">
<label for="status" class="col-sm-2 control-label">status</label>
<div class="col-sm-10">
<?php
foreach ($get_all_status as $stat) : 
  if ($stat->status_id == $solicitud->status) { ?>
    <input type="text" name="status" class="form-control" id="status" value="<?php echo $stat->status;?>" readonly>
  <?php }
endforeach;               
?>
</div>
</div>
<div class="form-group">
<label for="ciudadano_id" class="col-sm-2 control-label">Ciudadano</label>
<div class="col-sm-10">
<input type="text" name="ciudadano_id" class="form-control" id="ciudadano_id" value="<?php echo $solicitud->ciudadano_id;?>" readonly>
</div>
</div>
<div class="form-group">
<label for="geo" class="col-sm-2 control-label">Distrito</label>
<div class="col-sm-10">
<input type="text" name="geo" class="form-control" id="geo" value="<?php echo $solicitud->geo;?>" readonly>
</div>
</div>
<?php } ?>
</div>
</div> <!-- /container -->