<?php
if (!isset($_POST['pais'])) {
  require_once 'views/pais_form_view.php';
}else{
  $pais['pais'] = $_POST['pais'];
  $pais['fecha_idep'] = date('Y-m-d H:i:s');
  $pais['status'] = 1;
  $pais['created_at'] = date('Y-m-d H:i:s');
  $pais['updated_at'] = date('Y-m-d H:i:s');
  require_once 'models/paises_model.php';

  if (insert_pais($pais)) {
    echo 'Insertado';
  }else{
    echo '<br /> <h1>No insertado</h1>';
  }
}
 ?>
