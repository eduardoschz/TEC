<?php
require_once './models/paises_model.php';
require_once './models/idiomas_model.php';
require_once './models/paises_idiomas_model.php';

if (!isset($_POST['pais'])) {
  $pais_id = $_GET['pais_id'];
  $pais = get_pais_by_id($pais_id);
  $idiomas_array = get_idiomas();
  //Estos son los idiomas actuales en el servidor ↓
  $idiomas_paises = get_idiomas_id_by_pais_id($pais_id);

  foreach ($idiomas_paises as $idioma_pais) {
    foreach ($idiomas_array as &$idioma) {
      if ($idioma['id'] == $idioma_pais['idioma_id']) {
        $idioma['marcado'] = TRUE;
      }

      unset($idioma);

    }
  }
  require_once 'views/pais_edit_form_view.php';
}else{
  require_once 'models/paises_model.php';
  require_once 'models/paises_idiomas_model.php';
/*
  $idiomas_paises_actual = get_idiomas_id_by_pais_id($_GET['pais_id']);
  echo "IDIOMAS NUEVOS ↓ <br />";

  foreach ($_POST['idiomas_ed'] as $key => $value) {
    echo $key;
  }
  echo "<br />";
  echo "IDIOMAS ACTUALES ↓ <br />";
  foreach( $idiomas_paises_actual as $arr => $idiomaid) {
    print_r($idiomaid['idioma_id']);
  }
*/
  $pais_ed['pais'] = $_POST['pais'];
  $pais_ed['fecha_indep'] = $_POST['indep'];
  $pais_ed['updated_at'] = date('Y-m-d H:i:s');
  $id = $_GET['pais_id'];


  if (update_pais($pais_ed, $id)) {
    $paises_idiomas_ed = $_POST['idiomas_ed'];
      foreach ($paises_idiomas_ed as $id_checkeado => $value) {

        if (!get_pais_idioma_id_by_idioma_id_and_pais_id($id_checkeado,$id)) {
          $pais_idioma['pais_id'] = $id;
          $pais_idioma['idioma_id'] = $id_checkeado;
          $pais_idioma['status'] = 1;
          $pais_idioma['created_at'] = date('Y-m-d H:i:s');
          $pais_idioma['updated_at'] = date('Y-m-d H:i:s');
          insert_pais_idioma($pais_idioma);
        }
      }
      $idiomas_hablados = get_idiomas_id_by_pais_id($id);
      foreach ($idiomas_hablados as $row => $idioma_hablado) {
        $bandera = FALSE;
        foreach ($paises_idiomas_ed as $id_checkeado => $value) {
          if($idioma_hablado['idioma_id'] == $id_checkeado){
          //  echo $idioma_hablado['id'] . " == ". $id_checkeado . "<br />" ;
            $bandera = TRUE;
          }
        }

        if (!$bandera) {
          echo !$bandera;
          $pais_idioma_updated['status'] = -1;
          $pais_idioma_updated['updated_at'] = date('Y-m-d H:i:s');
          $pais_idioma_id = get_pais_idioma_id_by_idioma_id_and_pais_id($idioma_hablado['idioma_id'],$id);
          update_pais_idioma($pais_idioma_updated,$pais_idioma_id['id']);
        }
      }
    echo '<br /> <h1>Guardado</h1>';
  }else{
    echo '<br /> <h1>No guardado</h1>';
  }

}
 ?>
