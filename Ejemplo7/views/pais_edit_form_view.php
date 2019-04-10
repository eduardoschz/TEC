<?php require_once './models/paises_model.php';
$id = $_GET['pais_id'];
$pais_ed = get_pais_by_id($id);
?>
<h1>Editando a <?php echo $pais_ed['pais']; ?></h1>
<form method="post">
  <label for="pais">Nombre de pais: </label>
  <input name="pais" placeholder="Escribe aqui el pais" value=<?php echo $pais_ed['pais']; ?>>
  <label for="indep">Fecha de independencia: </label>
  <input type="date" name="indep" value="<?php echo $pais_ed['fecha_indep'] ?>">
  <button type="submit">Guardar</button>
</form>
