<?php
require_once './database/functions.php';

function insert_pais_idioma($idioma_pais){
  return insert_element('paises_idiomas', $idioma_pais);
}
/*
* OK
*/
function get_idiomas_id_by_pais_id($id){
  $consulta = 'SELECT idioma_id FROM paises_idiomas WHERE pais_id = '. $id;
  $consulta .= ' AND status = 1';
  return get_elements($consulta);
}
 /*
  * Para pintar los nombres de los paises en pais.php
  *
  */
function get_idiomas_by_pais_id($pais_id){
  $consulta  = 'SELECT idiomas.id, idiomas.idioma FROM paises_idiomas ';
  $consulta .= 'INNER JOIN idiomas ON idioma_id = idiomas.id ';
  $consulta .= 'WHERE pais_id ='. $pais_id;
  $consulta .= ' AND paises_idiomas.status = 1';

  return get_elements($consulta);
}


function get_pais_idioma_id_by_idioma_id_and_pais_id($id_idioma, $id_pais){
  $consulta = "SELECT id FROM paises_idiomas WHERE pais_id = " . $id_pais . " AND idioma_id = " . $id_idioma . " AND status = 1";
//  echo $consulta;
  echo "<br />";
  return get_element($consulta);
}


function update_pais_idioma($idioma_pais, $id){
  return update_element('paises_idiomas', $idioma_pais, $id);
}
 ?>
