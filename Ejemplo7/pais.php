<?php
require_once './models/paises_model.php';
require_once './models/estados_model.php';
if (isset($_GET['id'])) {
  $pais_id = $_GET['id'];
  $pais = get_pais_by_id($pais_id);
  $pais['estados'] = get_estados_by_pais_id($pais_id);
  $pais['poblacion'] = 0;
  foreach ($pais['estados'] as $estado) {
    $pais['poblacion'] += $estado['poblacion'];
  }
  require_once './views/pais_view.php';
}else{
  echo "Falta id";
}
?>
