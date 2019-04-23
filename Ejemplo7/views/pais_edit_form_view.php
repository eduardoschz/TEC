<?php

$id = $_GET['pais_id'];
$pais_ed = get_pais_by_id($id);
?>
<h1>Editando a <?php echo $pais_ed['pais']; ?></h1>
<form method="post">
  <label for="pais">Nombre de pais: </label>
  <input name="pais" placeholder="Escribe aqui el pais" value=<?php echo $pais_ed['pais']; ?>>
  <br>
  <label for="indep">Fecha de independencia: </label>
  <input type="date" name="indep" value="<?php echo $pais_ed['fecha_indep'] ?>">
  <br>

  <?php foreach ($idiomas_array as $idioma) { ?>
    <input type="checkbox" name="idiomas_ed[<?php echo $idioma['id'] ?>]"
    <?php if(isset($idioma['marcado'])){ ?>
      <?php if($idioma['marcado'] == TRUE){ ?>
        <?php echo 'checked';   ?>
      <?php } ?>
    <?php  } ?>>
    <?php echo $idioma['idioma']."<br />" ?>
  <?php  } ?>

  <button type="submit">Guardar</button>
</form>
