<h1> <?php echo $pais['pais']; ?> </h1>
<ul>
  <?php foreach ($pais['estados'] as $estado) { ?>
    <li>
    <?php echo $estado['estado']; ?>,
    poblaci&oacute;n:
    <?php echo $estado['poblacion']; ?>
    </li>
  <?php } ?>
  <br />
  Poblacion total:
  <?php echo $pais['poblacion'] ?>

</ul>
