<div class="container">
  <!-- Main component for a primary marketing message or call to action -->
  <div class="row well">	    
	    <div id="navbar" class="navbar-collapse collapse">
   	      <ul class="nav navbar-nav navbar-left">
	        <li>
		<?php foreach ($get_one_solicitud as $one) { ?>
			ID:<?php echo "$one->id";?>
			<br>
			Solicitud: <?php echo "$one->concepto";?>
			<br>
			Canalizado A: <?php echo "$one->canalizado";?>
			<br>
			Status: <?php echo "$one->status";?>			
		<?php } ?>
			</li>           
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li>	    
	        	<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal4">
				  Agregar <?php echo COMPONENTE ?>
				</button>
				<!-- Modal -->
				<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Agregar Nueva Gestion</h4>
				      </div>
				 	  <form class="form-horizontal" method="POST" action="<?php echo base_url('gestiones/create');?>">
				      <div class="modal-body">
				      	  <div class="form-group">
						    <label for="concepto" class="col-sm-2 control-label">Gestion</label>
						    <div class="col-sm-10">
						      <textarea type="text" class="form-control" name="concepto" id="concepto" placeholder="Texto de Gestion"></textarea>
						    </div>
						  </div>
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <div class="radio">
						        <label>
						          <input type="radio" name="Cierre" value="normal" selected>Gestion Normal
						        </label>
						      </div>
						      <div class="radio">
						        <label>
						          <input type="radio" name="Cierre" value="positivo"> Cierre Positivo
						        </label>
						      </div>
						      <div class="radio">
						        <label>
						          <input type="radio" name="Cierre" value="negativo"> Cierre Negativo
						        </label>
						      </div>
						      <div class="radio">
						        <label>
						          <input type="radio" name="Cierre" value="frc"> Falta de Respuesta Ciudadano
						        </label>
						      </div>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="solicitud_id" class="col-sm-2 control-label">solicitud_id</label>
						    <div class="col-sm-10">
						    <?php foreach ($get_one_solicitud as $one) { ?>
						    	<input type="hidden" class="form-control" name="canalizado" id="canalizado" value="<?php echo "$one->canalizado";?>" placeholder="canalizado">
								<input type="text" class="form-control" name="solicitud_id" id="solicitud_id" value="<?php echo "$one->id";?>" placeholder="solicitud_id" readonly>
							<?php } ?>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="distrito" class="col-sm-2 control-label">distrito</label>
						    <div class="col-sm-10">
						    <?php foreach ($get_one_solicitud as $one) { ?>
								<input type="text" class="form-control" name="distrito" id="distrito" value="<?php echo "$one->geo";?>" placeholder="geo" readonly>
							<?php } ?>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="user" class="col-sm-2 control-label">Gestor</label>
						    <div class="col-sm-10">
								<input type="text" class="form-control" name="user" id="user" value="<?php echo USER;?>" placeholder="user" readonly>
						    </div>
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
	<h2>Historial de Gestiones</h2>	
	<table class="table table-condensed">
		<tr>
		<th>ID</th>		
		<th>Gestion</th>
		<th>Fecha</th>
		<th>Gestor</th>
		<th>Solicitud</th>
		</tr>
			<?php
			foreach ($get_all_gestiones as $value) {
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
				  		echo "<td>";
				  	  	echo "<a href='".base_url('gestiones/editar')."/$value->id'>Edit</a>";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "<a href='".base_url('gestiones/delete')."/$value->id/$value->solicitud_id'>Borrar</a>";		  	  	
				  		echo "</td>";
			  		echo "</tr>";
			  }
			?>
		
	</table>
  </div>
</div> <!-- /container -->