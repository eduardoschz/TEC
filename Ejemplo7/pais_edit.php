<?php
if (!isset($_POST['pais'])) {
  require_once 'views/pais_edit_form_view.php';
}else{
  require_once 'models/paises_model.php';
  print_r("->".$pais);
  if (update_pais($pais, $id)) {
    echo '<br /> <h1>Guardado</h1>';
  }else{
    echo '<br /> <h1>No guardado</h1>';
  }
}
 ?>
