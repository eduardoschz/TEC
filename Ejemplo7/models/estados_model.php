<?php
require_once './config/functions.php';

function get_estados_by_pais_id($pais_id){
  $consulta = "SELECT estado, poblacion FROM estados";
  $consulta .= " WHERE pais_id = ".$pais_id.";";
  return get_elements($consulta);
}

function insert_estado($estado){
    return insert_element('estados', $estado);
}

 ?>
