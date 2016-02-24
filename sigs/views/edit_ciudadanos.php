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
					  <form class="form-horizontal" method="POST" action="<?php echo base_url('ciudadanos/actualizar');?>">
				      <div class="modal-body">
						<?php foreach ($get_one_ciudadano as $ciudadano) { ?>
							<input type="hidden" name="user_creacion" id="user_creacion" value="<?php echo $ciudadano->user_creacion;?>">
							<div class="form-group">
							    <label for="id" class="col-sm-2 control-label">ID</label>
							    <div class="col-sm-10">
							      <input type="text" name="id" class="form-control" id="id" value="<?php echo $ciudadano->id;?>">
							    </div>
							</div>
							<div class="form-group">
							    <label for="fecha_creacion" class="col-sm-2 control-label">Fecha</label>
							    <div class="col-sm-10">
							      <input type="text" name="fecha_creacion" class="form-control" id="fecha_creacion" value="<?php echo $ciudadano->fecha_creacion;?>">
							    </div>
							</div>
							<div class="form-group">
							    <label for="nombreCompleto" class="col-sm-2 control-label">Ciudadano</label>
							    <div class="col-sm-10">
							      <input type="text" name="nombreCompleto" class="form-control" id="nombreCompleto" value="<?php echo $ciudadano->nombreCompleto;?>">
							    </div>
							</div>
							<div class="form-group">
							    <label for="calle" class="col-sm-2 control-label">Calle</label>
							    <div class="col-sm-10">
							      <input type="text" name="calle" class="form-control" id="calle" value="<?php echo $ciudadano->calle;?>">
							    </div>
							</div>
							<div class="form-group">
						    <label for="seccion" class="col-sm-2 control-label">Sección</label>
						    <div class="col-sm-10">
						    <select class="form-control" name="seccion">
								<?php foreach ($get_all_secciones as $seccion):
						    	if ($seccion->id == $ciudadano->seccion) { ?>
						      		<option id="seccion" value="<?php echo $seccion->id;?>" selected='selected'><?php echo $seccion->seccion;?> - <?php echo $seccion->colonia;?></option>
						    	<?php } ?>
						    	<option id="seccion" value="<?php echo $seccion->id;?>"><?php echo $seccion->seccion;?> - <?php echo $seccion->colonia;?></option>			  	
								<?php endforeach;?>
							</select>
						    </div>
						  	</div>

							<div class="form-group">
							    <label for="telefono" class="col-sm-2 control-label">Telefono</label>
							    <div class="col-sm-10">
							      <input type="text" name="telefono" class="form-control" id="telefono" value="<?php echo $ciudadano->telefono;?>">
							    </div>
							</div>

							<div class="form-group">
							    <label for="distrito" class="col-sm-2 control-label">Distrito</label>
							    <div class="col-sm-10">
							    <?php foreach ($get_all_secciones as $seccion):
						    	if ($seccion->id == $ciudadano->seccion) { ?>
						      		<input type="text" name="distrito" class="form-control" id="distrito" value="<?php echo $seccion->df;?>">
						    	<?php } ?>
								<?php endforeach;?>
							      
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
	<?php foreach ($get_one_ciudadano as $ciudadano) { ?>
		<div class="form-group">
		    <label for="id" class="col-sm-2 control-label">ID</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="id" value="<?php echo $ciudadano->id;?>" readonly placeholder="ID">
		    </div>
		</div>
		<div class="form-group">
		    <label for="fecha_creacion" class="col-sm-2 control-label">Fecha</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="fecha_creacion" value="<?php echo $ciudadano->fecha_creacion;?>" readonly placeholder="fecha_creacion">
		    </div>
		</div>
		<div class="form-group">
		    <label for="nombreCompleto" class="col-sm-2 control-label">Ciudadano</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="nombreCompleto" value="<?php echo $ciudadano->nombreCompleto;?>" readonly placeholder="Nombre">
		    </div>
		</div>
		<div class="form-group">
		    <label for="calle" class="col-sm-2 control-label">Calle y Colonia</label>
		    <div class="col-sm-10">
		    <?php foreach ($get_all_secciones as $seccion):
		    	if ($seccion->id == $ciudadano->seccion) { ?>
		      <input type="text" class="form-control" id="calle" value="<?php echo $ciudadano->calle;?> Col. <?php echo $seccion->colonia;?>" readonly placeholder="Calle">
		    	<?php } ?>			  	
			<?php endforeach;?>
		    </div>
		</div>
		<div class="form-group">
		    <label for="seccion" class="col-sm-2 control-label">Sección</label>
		    <div class="col-sm-10">
		    <?php foreach ($get_all_secciones as $seccion):
		    	if ($seccion->id == $ciudadano->seccion) { ?>
		      		<input type="text" class="form-control" id="seccion" value="<?php echo $seccion->seccion;?>" readonly placeholder="Sección">
		    	<?php } ?>			  	
			<?php endforeach;?>
		    </div>
		</div>
		<div class="form-group">
		    <label for="telefono" class="col-sm-2 control-label">Telefono</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="telefono" value="<?php echo $ciudadano->telefono;?>" readonly placeholder="Telefono">
		    </div>
		</div>
		<div class="form-group">
		    <label for="distrito" class="col-sm-2 control-label">Distrito</label>
		    <div class="col-sm-10">
		    		    <?php foreach ($get_all_secciones as $seccion):
		    	if ($seccion->id == $ciudadano->seccion) { ?>
		      <input type="text" class="form-control" id="distrito" value="<?php echo $seccion->df;?>" readonly placeholder="Distrito">

		    	<?php } ?>			  	
			<?php endforeach;?>

		    </div>
		</div>
	<?php } ?>
</div>
</div> <!-- /container -->