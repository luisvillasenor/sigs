<div class="container">
  <!-- Main component for a primary marketing message or call to action -->
  <div class="row well">
    <h1>MÓDULO: <?php echo COMPONENTE ?></h1>
  </div>
  <div class="row well">
    <?php foreach ($get_one_user as $key) {?>
		ID: <?php echo $key->id;?><br>
		NOMBRE: <?php echo $key->nombreCompleto;?><br>
		ROL: <?php echo $key->rol;?><br>
		GEO: <?php echo $key->geo;?><br>
		EMAIL: <?php echo $key->email_address;?><br>
		PASSWORD: <?php echo sha1($key->password);?><br>
		FECHA CREACION: <?php echo $key->fecha_creacion;?><br>
		ULTIMO ACCESO: <?php echo $key->fecha_ult_acceso;?><br>
		STATUS: <?php echo $key->status;?><br>
	<?php }?>
  </div>
</div> <!-- /container -->        