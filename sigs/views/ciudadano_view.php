<div class="container">
  <!-- Main component for a primary marketing message or call to action -->
  <div class="row well">	    
	    <div id="navbar" class="navbar-collapse collapse">
   	      <ul class="nav navbar-nav navbar-left">
<li>
<a class="btn btn-default btn-sm" href="<?php echo base_url('ciudadanos/index');?>" role="button">Todos</a>
</li>           
</ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li>	    
	        	<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				  Agregar <?php echo COMPONENTE ?>
				</button>
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
						      <input type="nombreCompleto" class="form-control" id="nombreCompleto" placeholder="Nombre">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="calle" class="col-sm-2 control-label">Calle</label>
						    <div class="col-sm-10">
						      <input type="calle" class="form-control" id="calle" placeholder="Calle">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="seccion" class="col-sm-2 control-label">Sección</label>
						    <div class="col-sm-10">
						      <select class="form-control" name="seccion">
						      	<?php foreach ($get_for_select as $campo) : ?>
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
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				        <button type="button" class="btn btn-primary">Guardar</button>
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
	<hr>
	<table class="table table-condensed">
		<tr>
			<th>ID</th>	
			<th>nombreCompleto</th>
			<th>Calle</th>
			<th>Sección</th>
			<th>Accion</th>
		</tr>
			<?php
			  foreach ($get_one as $one) {
			  	# code...
			  		echo "<tr>";		  	  	
				  	  	echo "<td>";
				  	  	echo "$one->id";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "<a href='editar/$one->id'>$one->nombreCompleto</a>";		  	  	
				  		echo "</td>";
				  		echo "<td>";?>
			            Calle: <?php echo $one->calle; ?><br>
			            <?php 
			            foreach ($get_all_secciones as $secc) : 
			                if ($one->seccion == $secc->id) { 
			                  echo "Col:";
			                  echo $secc->colonia;
			                  echo "<br>";
			                  echo "Seccion:";
			                  echo $secc->seccion;
			                  echo "<br>";
			                }
			            endforeach;
          				echo "</td>";
				  		echo "<td>";
				  	  	echo "<a href='".base_url('solicitudes/nuevo')."/$one->id'>Solicitudes</a>";		  	  	
				  		echo "</td>";
			  		echo "</tr>";
			  }
			?>
		
	</table>

  </div>
</div> <!-- /container -->