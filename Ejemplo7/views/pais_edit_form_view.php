<?php 
require_once './models/paises_model.php';
require_once './models/paises_idiomas_model.php';
require_once './models/idiomas_model.php';

$id = $_GET['pais_id'];
$pais_ed = get_pais_by_id($id);
$idiomas_pais_ed = get_idiomas_by_pais_id($id);
$idiomas = get_idiomas();

print_r($pais_ed);
echo "<br>";
print_r($idiomas_pais_ed);
echo "<br>";
print_r($idiomas);

?>
<br>
<h1>Editando a <?php echo $pais_ed['pais']; ?></h1>
<form method="post">
  <label for="pais">Nombre de pais: </label>
  <input name="pais" placeholder="Escribe aqui el pais" value=<?php echo $pais_ed['pais']; ?>>
  <label for="indep">Fecha de independencia: </label>
  <input type="date" name="indep" value="<?php echo $pais_ed['fecha_independencia'] ?>">
  <br>
  <?php foreach ($idiomas as $row => $idioma) { ?>
    <input type="checkbox" name="idiomas[<?php echo $idioma['id'] ?>]" 
    <?php foreach ($idiomas_pais_ed as $row => $idioma_hablado) { ?>
      <?php if ($idioma['id'] == $idioma_hablado['id']) { ?>
        checked
      <?php } ?>
    <?php } ?>
    > <?php echo $idioma['idioma'] ?> <br>
  <?php } ?>

  <button type="submit">Guardar</button>
</form>
