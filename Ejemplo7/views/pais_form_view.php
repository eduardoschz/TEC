<h1>Agregar Pais</h1>
<form method="post">
  <label for="pais">Nombre de pais: </label>
  <input name="pais" placeholder="Escribe aqui el pais">
  <br>
  <label for="indep">Fecha de independencia: </label>
  <input type="date" name="indep">
  <?php
    foreach ($idiomas_array as $idioma) {
      ?>
      <br /><input type="checkbox" name="idiomas[<?php echo $idioma['id'] ?>]" > <?php echo $idioma['idioma'] ?>
      <?php
    }
   ?>
<br/>
  <button type="submit">Agregar</button>
</form>
