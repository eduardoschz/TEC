<?php
if (!isset($_POST['pais'])) {
  require_once './models/idiomas_model.php';
  $idiomas_array = get_idiomas();
  require_once 'views/pais_form_view.php';
}else{
  print_r($_POST);
  $pais['pais'] = $_POST['pais'];
  $pais['fecha_indep'] = $_POST['indep'];
  $pais['status'] = 1;
  $pais['created_at'] = date('Y-m-d H:i:s');
  $pais['updated_at'] = date('Y-m-d H:i:s');
  require_once 'models/paises_model.php';

  $pais_id = insert_pais($pais);


  if ($pais_id) {
    require_once './models/paises_idiomas_model.php';
    if ($_POST['idiomas']>0) {
      foreach ($_POST['idiomas'] as $idioma_id => $valor) {
        $idioma_pais['idioma_id'] = $idioma_id;
        $idioma_pais['pais_id'] = $pais_id;
        $idioma_pais['status'] = 1;
        $idioma_pais['created_at'] = date('Y-m-d H:i:s');
        $idioma_pais['updated_at'] = date('Y-m-d H:i:s');
        //print_r("idioma pais: ". $idioma_pais);
        insert_pais_idioma($idioma_pais);
      }

    }
    echo '<br /> <h1>Insertado</h1>';
  }else{
    echo '<br /> <h1>No insertado</h1>';
  }
}
 ?>
