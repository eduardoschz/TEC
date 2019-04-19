<?php
if (!isset($_POST['estado'])) {
  if (!isset($_GET['pais_id'])) {
    echo "<h1>Falta Pais id</h1>";
  }else{
    require_once 'models/paises_model.php';
    $pais_id = $_GET['pais_id'];
    $pais = get_pais_by_id($pais_id);
    require_once 'views/estado_form_view.php';
  }
}else{
  $estado['id_pais'] = $_GET['pais_id'];
  $estado['estado'] = $_POST['estado'];
  $estado['poblacion'] = $_POST['poblacion'];
  $estado['status'] = 1;
  $estado['created_at'] = date('Y-m-d H:i:s');
  $estado['updated_at'] = date('Y-m-d H:i:s');
  require_once 'models/estados_model.php';

  if (insert_estado($estado)) {
    echo '<br /> <h1>Insertado</h1>';
  }else{
    echo '<br /> <h1>No insertado</h1>';
  }
}
 ?>
