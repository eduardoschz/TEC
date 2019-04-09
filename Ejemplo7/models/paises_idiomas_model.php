<?php
require_once './database/functions.php';

function insert_pais_idioma($idioma_pais){
  return insert_element('paises_idiomas', $idioma_pais);
}


 ?>
