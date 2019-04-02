
<div>
<a href="pais_add.php">Agregar</a>

  <?php if (count($paises_array)>0) { ?>
      <ul>
        <?php foreach ($paises_array as $pais){ ?>
          <li>
              <a href="pais.php?id=<?php echo $pais['id'] ?>">
              <?php echo $pais['pais'] ?>
              </a>
          </li>
        <?php } ?>
      </ul>
      <?php  }else{ ?>
        <div> No se encontraron datos </div>
      <?php } ?>

</div>
