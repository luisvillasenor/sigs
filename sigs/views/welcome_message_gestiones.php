<div class="container">
  <!-- Main component for a primary marketing message or call to action -->

<div class="row well">	    
	    <div id="navbar" class="navbar-collapse collapse">
   	      
	      <ul class="nav navbar-nav navbar-right">
	        <li>
	        	<p><a class="btn btn-default" href="#" role="button">Filtro &raquo;</a></p>
			</li>
			<li>
	        	<p><a class="btn btn-default" href="#" role="button">Filtro &raquo;</a></p>
			</li>
			<li>
	        	<p><a class="btn btn-default" href="#" role="button">Filtro &raquo;</a></p>
			</li>           
	      </ul>
	    </div><!--/.nav-collapse -->
  </div>

  	<div class="row well">
  	<h2>Historico de Acciones</h2>
	
		<table class="table table-condensed">
		<tr>
		<th>ID</th>		
		<th>Gestión</th>
		<th>Fecha</th>
		<th>Gestor</th>
		<th>Solicitud</th>
		</tr>
			<?php
			foreach ($get_all as $value) {
			  	# code...
			  		echo "<tr>";		  	  	
				  	  	echo "<td>";
				  	  	echo "$value->id";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->concepto";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->fecha";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->user";		  	  	
				  		echo "</td>";				  		
				  		echo "<td>";
				  	  	echo "$value->solicitud_id";		  	  	
				  		echo "</td>";
			  		echo "</tr>";
			  }
			?>
		
	</table>
  </div>
</div> <!-- /container -->
