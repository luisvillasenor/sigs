<?PHP 
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=exportar_corte_filtrado.xls")
?>

<html>

<div class="row well">
  <h2>Corte de Solicitudes</h2> 
  <table class="table table-condensed">
    <tr>
    <th>ID</th>   
    <th>FECHA</th>
    <th>SOLICITUD</th>
    <th>CIUDADANO</th>
    <th>CALLE</th>
    <TH>COLONIA</TH>
    <TH>SECCION</TH>
    <TH>TELEFONO</TH>
    <th>CANALIZADO</th>
    <th>STATUS</th>
    <th>USER</th>
    <th>DISTRITO</th>  
    </tr>
    <?php
      foreach ($cortes as $corte) { ?>
        <tr>
          <td><?php echo $corte->id; ?></td>
          <td><?php echo $corte->fecha; ?></td>
          <td><?php echo $corte->concepto; ?></td>
          <td><?php echo $corte->ciudadano; ?></td>
          <td><?php echo $corte->calle; ?></td>
          <td>
            <?php 
            foreach ($get_all_secciones as $secc) : 
                if ($corte->seccion == $secc->id) { 
                  echo $secc->colonia;
                }
            endforeach;
            ?> 
          </td>
          <td>
            <?php 
            foreach ($get_all_secciones as $secc) : 
                if ($corte->seccion == $secc->id) { 
                  echo $secc->seccion;
                }
            endforeach;
            ?> 
          </td>
          <td><?php echo $corte->telefono; ?></td>
          <td>
                     <?php foreach ($get_all_deps as $dep) : 
                if ($dep->id == $corte->canalizado) { 
                  echo $dep->entidad; 
                }
              endforeach;?>               

          </td>
          <td>
                           <?php foreach ($get_all_status as $stat) : 
                if ($stat->status_id == $corte->status) {
                  echo $stat->status; 
                }
              endforeach;?>

          </td>
          <td><?php echo $corte->user; ?></td>
          <td><?php echo $corte->geo; ?></td>
        </tr>
      <?php } ?>
    
  </table>
</div>
</html>