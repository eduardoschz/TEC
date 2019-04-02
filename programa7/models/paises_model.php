<?php
require_once './config/functions.php';

function get_paises(){
  $consulta = "SELECT id, pais FROM paises;";
  return get_elements($consulta);
}

function get_pais_by_id($id){
  $consulta1 = "SELECT id, pais FROM paises";
  $consulta1 .= " WHERE id = ".$id;
  $consulta1 .= " LIMIT 1;" ;
  return get_element($consulta1);
}

function insert_pais($pais){
  $campos = [];
  $valores = [];

    foreach ($pais as $key => $value) {
      $campos[]= $key;
      $valores[] = $value;
    }

  $insertar = 'INSERT INTO paises(';
    $insertar .= implode(',', $campos);
    $insertar .= ') VALUES (';
    $insertar .= '"'. implode('","',$valores) .'"';
    $insertar .= ')';
    return insert_element($insertar);
}


 ?>
