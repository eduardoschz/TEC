<h1> <?php echo $pais['pais']; ?> </h1>
  <a href="./estado_add.php?pais_id=<?php echo $pais_id?>">Agregar Estado</a>
  <a href="./pais_edit.php?pais_id=<?php echo $pais_id ?>">Editar Pais</a>
<ul>
  <?php foreach ($pais['estados'] as $estado) { ?>
    <li>
    <?php echo $estado['estado']; ?>,
    poblaci&oacute;n:
    <?php echo $estado['poblacion']; ?>
    </li>
  <?php } ?>
  <br />
</ul>
  Poblacion total:
  <?php echo $pais['poblacion'] ?>

  <h2>Idiomas</h2>
  <ul>
  <?php foreach ($pais['idiomas'] as $idioma) {?>
    <li>
      <?php  echo $idioma['idioma'];  ?>
    </li>
  <?php  } ?>
</ul>
