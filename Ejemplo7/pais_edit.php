<?php
if (!isset($_POST['pais'])) {
  require_once 'views/pais_edit_form_view.php';
}else{
  require_once 'models/paises_model.php';
  $pais_ed['pais'] = $_POST['pais'];
  $pais_ed['fecha_independencia'] = $_POST['indep'];
  $pais_ed['updated_at'] = date('Y-m-d H:i:s');
  $id = $_GET['pais_id'];
  
  if (update_pais($pais_ed, $id)) {
    echo '<br /> <h1>Guardado</h1>';
  }else{
    echo '<br /> <h1>No guardado</h1>';
  }
}
?>
