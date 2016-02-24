<div class="container">
  <!-- Main component for a primary marketing message or call to action -->
<div class="row well">	    
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-left">
<li>
<form method="POST" action="buscar" class="form-inline">
<div class="form-group">
<input type="search" class="form-control" name="colonia" id="colonia" placeholder="Buscar Colonia">
<button type="submit" class="btn btn-default">Buscar</button>
</div>
</form>
</li>           
</ul>
<ul class="nav navbar-nav navbar-right">
<li>	    
</li>           
</ul>
</div><!--/.nav-collapse -->
</div>

  <div class="row well">
	
		<table class="table table-bordered">
			<tr>
			<th>Seccion</th>
			<th>Colonia</th>
			<th>Dis. Federal</th>
			<th>Dis. Uninom</th>
			<th>Municipios</th>
			<?php foreach ($get_one as $item):?> 
			  	<tr>
			  		<td><?php echo $item->seccion; ?></td>
			  		<td><?php echo $item->colonia; ?></td>
			  		<td><?php echo $item->df; ?></td>
			  		<td><?php echo $item->distritoUni; ?></td>
			  		<td><?php echo $item->municipio; ?></td>
			  	</tr>
			<?php endforeach;?>
			
		</table>
  </div>
</div> <!-- /container -->
</div> <!-- /container -->