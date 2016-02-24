<div id="container">
<div class="row well">
        <h1>MÓDULO: <?php echo COMPONENTE ?></h1>
	  </div>
	<div>
			<form method="POST" action="<?php echo base_url('users/create');?>">
				<label>Nombre Completo</label>
				<input type="text" name="nombreCompleto">
				<label>Rol</label>
				<input type="text" name="rol">
				<label>Distrito</label>
				<input type="text" name="geo">
				<label>E-Mail</label>
				<input type="text" name="email_address">
				<label>Password</label>
				<input type="text" name="password" value="test01">
				<button type="submit">Agregar</button>
			</form>
		</div>
		<table class="table table-condensed">
			<tr>
			<th>ID</th>
			<th>nombreCompleto</th>
			<th>Rol</th>
			<th>Distrito</th>
			<th>E-mail</th>
			<th>Fecha Alta</th>
			<th>Ult Acceso</th>
			<th>Status</th>
			<th>Accion</th>
			</tr>
			<?php
			  foreach ($get_all as $value) {
			  	# code...
			  		echo "<tr>";		  	  	
				  	  	echo "<td>";
				  	  	echo "$value->id";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->nombreCompleto";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->rol";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->geo";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->email_address";		  	  	
				  		echo "</td>";				  		
				  		echo "<td>";
				  	  	echo "$value->fecha_creacion";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->fecha_ult_acceso";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "$value->status";		  	  	
				  		echo "</td>";
				  		echo "<td>";
				  		if ($value->status != TRUE) {
				  			echo "<input type='checkbox' id='status'>"; # code...
				  			echo "<a href='".base_url('users/activar')."/$value->id'>Permitir</a>";
				  		} else { 
  				  			echo "<input type='checkbox' id='status' checked='checked'>";
				  			echo "<a href='".base_url('users/desactivar')."/$value->id'>Quitar</a>";
				  		}				  	  			  	  	
				  		echo "</td>";
				  		echo "<td>";
				  	  	echo "<a href='".base_url('users/delete')."/$value->id'>delete</a>";		  	  	
				  		echo "</td>";
			  		echo "</tr>";
			  }
			?>
			
		</table>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
