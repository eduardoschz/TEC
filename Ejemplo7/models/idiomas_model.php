<?php
require_once './database/functions.php';

/**
 * Ejecuta SELECT id, idioma FROM idiomas.
 * 
 * Ejecuta un SELECT en la tabla idiomas, 
 * devolviendo solo los ID's y nombres.
 * 
 * @return Array  Lista con los ID's y nombres de llos idiomas
 */
function get_idiomas(){
  $consulta = 'SELECT id, idioma FROM idiomas';
  return get_elements($consulta);
}

 ?>
