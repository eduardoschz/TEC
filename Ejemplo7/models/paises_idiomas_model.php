<?php
require_once './database/functions.php';

function insert_pais_idioma($idioma_pais){
  return insert_element('idiomas_paises', $idioma_pais);
}

/**
 * Ejecuta una consulta que devuelve los idiomas que habla el pais
 *
 * @param [int] $pais_id ID del pais a consultar
 * @return void
 */
function get_idiomas_by_pais_id($pais_id)
{
  $consulta = "SELECT idiomas.id, idioma FROM idiomas ";                    
  $consulta .= "INNER JOIN idiomas_paises ";
  $consulta .= "ON idiomas.id = idiomas_paises.idioma_id "; 
  $consulta .= "WHERE idiomas_paises.pais_id = " . $pais_id;
  // echo $consulta;
  return get_elements($consulta);
}

 ?>
