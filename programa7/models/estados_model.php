<?php
require_once './config/functions.php';

function get_estados_by_pais_id($pais_id){
  $consulta = "SELECT estado, poblacion FROM estados";
  $consulta .= " WHERE paises_id = ".$pais_id.";";
  //echo $consulta2. '<br />';
  return get_elements($consulta);
}


 ?>
