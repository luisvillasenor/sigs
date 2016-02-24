<div class="container">
<!-- Main component for a primary marketing message or call to action -->
<div class="row well">	    
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-left">
<li>
		<?php foreach ($get_one_ciudadano as $one) { ?>
			<h1><?php echo "$one->nombreCompleto";?></h1>
			<small>ID:<?php echo "$one->id";?></small>
			<small>DF:<?php echo "$one->distrito";?></small>
		<?php } ?>
</li>           
</ul>
<ul class="nav navbar-nav navbar-right">
<li>	    
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
Agregar Nueva <?php echo COMPONENTE ?>
</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Agregar Nueva Solicitud</h4>
</div>

<form class="form-horizontal" method="POST" action="<?php echo base_url('solicitudes/create');?>">
<div class="modal-body">
<div class="form-group">
<label for="folio" class="col-sm-2 control-label">folio</label>
<div class="col-sm-10">
<input type="text" name="folio" class="form-control" id="folio" placeholder="folio">
</div>
</div>
<div class="form-group">
<label for="concepto" class="col-sm-2 control-label">concepto</label>
<div class="col-sm-10">
<textarea type="text" name="concepto" class="form-control" rows="5" id="concepto" placeholder="Escriba aqui la descripción de la solicitud"></textarea>
</div>
</div>

  <div class="form-group">
    <label for="clasificado" class="col-sm-2 control-label">Clasificado</label>
    <div class="col-sm-10">
      <select class="form-control" name="clasificado">
		<option id="clasificado" value="Producto">Producto</option>  
		<option id="clasificado" value="Servicio">Servicio</option>  
	</select>
    </div>
  </div>

  <div class="form-group">
    <label for="canalizado" class="col-sm-2 control-label">Canalizado</label>
    <div class="col-sm-10">
      <select class="form-control" name="canalizado">
      	<option id="canalizado" value="45">Pendiente</option>
      	<?php foreach ($get_all_deps as $dep) : ?>
		<option id="canalizado" value="<?php echo $dep->id;?>"><?php echo $dep->entidad;?></option>  
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
<input type="text" name="status" class="form-control" id="status" value="5" placeholder="status" readonly>
</div>
</div>
<div class="form-group">
<label for="ciudadano_id" class="col-sm-2 control-label">Ciudadano</label>
<div class="col-sm-10">
<input type="text" name="ciudadano_id" class="form-control" id="ciudadano_id" value="<?php echo $ciudadano_id ;?>" readonly>
</div>
</div>
<div class="form-group">
<label for="geo" class="col-sm-2 control-label">Distrito</label>
<div class="col-sm-10">
<?php foreach ($get_one_ciudadano as $one) { ?>
	<input type="text" name="geo" class="form-control" id="geo" value="<?php echo $one->distrito;?>" readonly>
<?php } ?>


</div>
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
<h3>Historial de Solicitudes:</h3>
	<table class="table table-condensed">
		<tr>
		<th>ID</th>
		<th>Fecha</th>
		<th>Folio</th>		
		<th>Concepto</th>
		<th>Canalizado</th>
		<th>Status</th>
		<th>Distrito</th>
		<th>Acción</th>
		</tr>
			<?php
			foreach ($get_mis_solicitudes as $value) {
			  	# code...
			  		echo "<tr>";		  	  	
				  	  	echo "<td>";
				  	  	echo "$value->id";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo date('Y-m-d',strtotime($value->fecha));		  	  	
				  		echo "</td>";				  		
				  		echo "<td>";
				  	  	echo "$value->folio";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->concepto";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  		foreach ($get_all_deps as $dep) : 
				  			if ($dep->id == $value->canalizado) {
				  				echo $dep->entidad;	
				  			}
				  		endforeach; 		  	  	
				  		echo "</td>";
				  		echo "<td>";
						foreach ($get_all_status as $stat) : 
						  	if ($stat->status_id == $value->status) { 
						  		echo "$stat->status";
						  	}
						endforeach;               
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->geo";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "<a href='".base_url('solicitudes/editar')."/$value->id'>Ver</a>";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "<a href='".base_url('gestiones/nuevo')."/$value->id'>Gestiones</a>";
				  		echo "</td>";
			  		echo "</tr>";
			  }
			?>
		
	</table>

</div>
</div> <!-- /container -->


