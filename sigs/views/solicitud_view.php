<div class="container"> 
<!-- Main component for a primary marketing message or call to action -->
<div class="row well">	    
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-left">
<li>
<a class="btn btn-default btn-sm" href="<?php echo base_url('solicitudes/index');?>" role="button">Todos</a>
</li>           
</ul>
<ul class="nav navbar-nav navbar-right">
<li>	    
</li>           
</ul>
</div><!--/.nav-collapse -->
</div>

<div class="row well">
<hr>
	<table class="table table-condensed">
		<tr>
		<th>ID</th>
		<th>Fecha</th>
		<th>Folio</th>
		<th>Concepto</th>
		<th>Canalizado</th>
		<th>Distrito</th>
		<th>Staus</th>
		<th>Ciudadano</th>
		</tr>
			<?php
			foreach ($get_one as $value) {
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
				  	  	echo "$value->geo";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	foreach ($get_all_status as $status) : 
				  			if ($status->status_id == $value->status) {
				  				echo $status->status;	
				  			}
				  		endforeach;
				  		echo "</td>";
				  		echo "<td>";
				  	  	foreach ($get_all_ciudadanos as $ciu) : 
				  			if ($ciu->id == $value->ciudadano_id) {
				  				echo $ciu->nombreCompleto;	
				  			}
				  		endforeach;	  	  	
				  		echo "</td>";				  		
				  		echo "<td>";
				  	  	echo "<a href='".base_url('gestiones/nuevo')."/$value->id'>+Gestion</a>";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "<a href='".base_url('solicitudes/editar')."/$value->id'>Ver</a>";		  	  	
				  		echo "</td>";
			  		echo "</tr>";
			  }
			?>
		
	</table>


</div>
</div> <!-- /container -->

