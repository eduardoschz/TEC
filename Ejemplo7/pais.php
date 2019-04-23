<?php
require_once './models/paises_idiomas_model.php';
require_once './models/idiomas_model.php';
require_once './models/paises_model.php';
require_once './models/estados_model.php';
if (isset($_GET['id'])) {
  $pais_id = $_GET['id'];
  $pais = get_pais_by_id($pais_id);

  $pais['estados'] = get_estados_by_pais_id($pais_id);
  $pais['idiomas'] = get_idiomas_by_pais_id($pais_id);
  $pais['poblacion'] = 0;

  //$idiomas_id_array = get_idiomas_id_by_pais_id($pais_id); //Se obtienen los id de los idiomas que habla un pais
  //foreach ($idiomas_id_array[0] as $idioma_id => $id) {

  //}

  foreach ($pais['estados'] as $estado) {
    $pais['poblacion'] += $estado['poblacion'];
  }


  require_once './views/pais_view.php';
}else{
  echo "Falta id";
}
?>
