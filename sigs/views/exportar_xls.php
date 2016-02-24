<?PHP 
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=exportar_corte.xls")
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
    <th>DOMICILIO</th>
    <TH>TELEFONO</TH>
    <th>CANALIZADO</th>
    <th>STATUS</th>
    </tr>
    <?php
      foreach ($cortes as $corte) { ?>
        <tr>
          <td><?php echo $corte->id; ?></td>
          <td><?php echo $corte->fecha; ?></td>
          <td><?php echo $corte->concepto; ?></td>
          <td><?php echo $corte->ciudadano; ?></td>
          <td>
            Calle: <?php echo $corte->calle; ?><br>
            Col: <br>
            Seccion: <?php echo $corte->seccion; ?><br>
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

        </tr>
      <?php } ?>
    
  </table>
  </div>
</html>