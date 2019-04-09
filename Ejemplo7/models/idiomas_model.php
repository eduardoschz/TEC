<?php
require_once './database/functions.php';
function get_idiomas(){
  $consulta = 'SELECT id, idioma FROM idiomas';
  return get_elements($consulta);
}

 ?>
