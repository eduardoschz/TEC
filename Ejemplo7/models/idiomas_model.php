<?php
require_once './database/functions.php';

function get_idiomas(){
  $consulta = 'SELECT id, idioma FROM idiomas';
  return get_elements($consulta);
}
/**
 * [get_idiomas_by_id description]
 * @param  [num] $id [description]
 * @return [array]     [description]
 */
function get_idiomas_by_id($id){
  $consulta = 'SELECT idioma FROM idiomas WHERE id= '. $id .' AND status = 1';
  return get_elements($consulta);
}
 ?>
