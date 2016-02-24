<div class="container">
  <!-- Main component for a primary marketing message or call to action -->
  <div class="row well">	    
	    <div id="navbar" class="navbar-collapse collapse">
   	      <ul class="nav navbar-nav navbar-left">
	        <li>
       	  		<form method="POST" action="<?php echo base_url('ciudadanos/buscar');?>" class="form-inline">
		  		<div class="form-group">
					<label for="nombre">Nombre: </label>
		    		<input type="search" class="form-control" name="nombreCompleto" id="nombreCompleto" placeholder="Juan Perez Gomez">
					<button type="submit" class="btn btn-default">Buscar</button>
				</div>
				</form>
			</li>           
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li>	    
	        	<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalalta">
				  Agregar <?php echo COMPONENTE ?>
				</button>
				<!-- Modal -->
				<div class="modal fade" id="myModalalta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Agregar a un Nuevo Ciudadano</h4>
				      </div>
				 	  <form class="form-horizontal" method="POST" action="<?php echo base_url('ciudadanos/create');?>">
				      <div class="modal-body">
				      	  <div class="form-group">
						    <label for="nombreCompleto" class="col-sm-2 control-label">Nombre</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="nombreCompleto" id="nombreCompleto" placeholder="Nombre">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="calle" class="col-sm-2 control-label">Calle</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="calle" id="calle" placeholder="Calle">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="seccion" class="col-sm-2 control-label">Sección</label>
						    <div class="col-sm-10">
						      <select class="form-control" name="seccion">
						      	<?php foreach ($get_all_secciones as $campo) : ?>
								<option id="seccion" value="<?php echo $campo->id;?>"><?php echo $campo->seccion;?> - <?php echo $campo->colonia;?></option>  
								<?php endforeach; ?>
							</select>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="telefono" class="col-sm-2 control-label">Telefono</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="distrito" class="col-sm-2 control-label">Distrito Federal</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="distrito" id="distrito" value="<?php echo GEO;?>" placeholder="distrito">
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
	
		<table class="table table-bordered">
			<tr>
			<th>ID</th>	
			<th>nombreCompleto</th>
			<th>Calle</th>
			<th>Telefono</th>
			<th>Accion</th>
			</tr>
				<?php
				  foreach ($results as $value) {
				  	# code...
				  		echo "<tr>";		  	  	
					  	  	echo "<td>";
					  	  	echo "$value->id";		  	  	
					  		echo "</td>";
					  		echo "<td>";
					  	  	echo "<a href='".base_url('ciudadanos/editar')."/$value->id'>$value->nombreCompleto</a>";		  	  	
					  		echo "</td>";
					  		echo "<td>";
					  	  	echo "$value->calle";		  	  	
					  		echo "</td>";
					  		echo "<td>";
					  	  	echo "$value->telefono";		  	  	
					  		echo "</td>";
					  		echo "<td>";
					  	  	echo "<a href='".base_url('solicitudes/nuevo')."/$value->id'>Solicitudes</a>";		  	  	
					  		echo "</td>";
					  		echo "<td>";
				  		echo "</tr>";
				  }
				?>
		</table>
	<p><?php echo $links; ?></p>		
  </div>
</div> <!-- /container -->