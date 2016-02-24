<div class="container">
<!-- Main component for a primary marketing message or call to action -->
<div class="row well">	    
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-left">
<li>
<form method="POST" action="buscar" class="form-inline">
<div class="form-group">
<input type="search" class="form-control" name="folio" id="folio" placeholder="Buscar Folio">
<button type="submit" class="btn btn-default">BuscarFolio</button>
</div>
</form>

<form method="POST" action="buscar_id" class="form-inline">
<div class="form-group">
<input type="search" class="form-control" name="id" id="id" placeholder="Buscar ID">
<button type="submit" class="btn btn-default">BuscarID</button>
</div>
</form>
</li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li>
	
	<div class="dropdown">
	  <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
	    Filtros por: 
	    <span class="caret"></span>
	  </button>
	  
	  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
	<?php foreach ($get_all_status as $stat) : ?>
		<li role="presentation"><a role="menuitem" tabindex="-1" href='<?php echo base_url('solicitudes/filtropor');?>/<?php echo $stat->status_id;?>'><?php echo $stat->status;?></a></li>
  	<?php endforeach; ?>
	  </ul>

	</div>
	
</li>           
</ul>
</div><!--/.nav-collapse -->
</div>

<div class="row well">
Registros mostrados: <?php echo $total_rows; ?>
	<table class="table table-condensed">
		<tr>
		<th>ID</th>		
		<th>Folio</th>
		<th>Fecha</th>
		<th>Concepto</th>
		<th>Canalizado</th>
		<th>Distrito</th>
		<th>Staus</th>
		<th>Ciudadano</th>
		
		</tr>
			<?php
			foreach ($results as $value) {
			  	# code...
			  		echo "<tr>";		  	  	
				  	  	echo "<td>";
				  	  	echo "$value->id";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->folio";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo date('Y-m-d',strtotime($value->fecha));		  	  	
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
				  	  	echo "$value->geo";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	foreach ($get_all_status as $stat) : 
				  			if ($stat->status_id == $value->status) {
				  				echo $stat->status;	
				  			}
				  		endforeach;
				  		echo "</td>";
				  		echo "<td>";
				  	  	foreach ($get_all_ciudadanos as $ciud) : 
				  			if ($ciud->id == $value->ciudadano_id) {
				  				echo $ciud->nombreCompleto;	
				  			}
				  		endforeach;				  			  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "<a href='".base_url('gestiones/nuevo')."/$value->id'>Historico</a>";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "<a href='".base_url('solicitudes/editar')."/$value->id'>Ver Detalle</a>";		  	  	
				  		echo "</td>";
			  		echo "</tr>";
			  }
			?>
		
	</table>
<p><?php echo $links; ?></p>
</div>
</div> <!-- /container -->
