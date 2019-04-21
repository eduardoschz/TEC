<?php
if (!isset($_POST['pais'])) {
  require_once 'views/pais_edit_form_view.php';
}else{
  require_once 'models/paises_model.php';
  require_once 'models/paises_idiomas_model.php';

  $pais_ed['pais'] = $_POST['pais'];
  $pais_ed['fecha_independencia'] = $_POST['indep'];
  $pais_ed['updated_at'] = date('Y-m-d H:i:s');
  $id = $_GET['pais_id'];
  
  if (update_pais($pais_ed, $id)) {
    // actualizar lo que se quito [status] = -1
    $idiomas_paises_ed = $_POST['idiomas'];
    foreach ($idiomas_paises_ed as $id_checkeado => $value) { // 
      if(!get_id_paises_idiomas_by_idioma_id_and_pais_id($id_checkeado, $id)){
        $idioma_pais['pais_id'] = $id;
        $idioma_pais['idioma_id'] = $id_checkeado;
        $idioma_pais['status'] = 1;
        $idioma_pais['created_at'] = date('Y-m-d H:i:s');
        $idioma_pais['updated_at'] = date('Y-m-d H:i:s');
        insert_pais_idioma($idioma_pais);
      }
    }
    $idiomas_hablados = get_idiomas_by_pais_id($id);
    foreach ($idiomas_hablados as $row => $idioma_hablado) {
      $bandera = FALSE;
      foreach ($idiomas_paises_ed as $id_checkeado => $value) { // 
        if($idioma_hablado['id'] == $id_checkeado){
          $bandera = TRUE;
        }
      }
      if (!$bandera) {
        $idioma_pais_updated['status'] = -1;
        $idioma_pais_updated['updated_at'] = date('Y-m-d H:i:s');
        $id_idioma_pais = get_id_paises_idiomas_by_idioma_id_and_pais_id($idioma_hablado['id'], $id);
        updated_pais_idioma($idioma_pais_updated, $id_idioma_pais['id']);
      }
    }
    echo '<br><h1>Guardado</h1>';
  }else{
    echo '<br><h1>No guardado</h1>';
  }
}
?>
