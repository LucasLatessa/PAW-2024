<!DOCTYPE html>
<html lang="es">

<head>
  <?php require __DIR__ . '\../parts/head.view.php'; ?>
  <link rel="stylesheet" href="/assets/styles/global.css" />
  <link rel="stylesheet" href="/assets/styles/direccion_local.css">
</head>

<body>
  <!--HEADER-->
  <?php require __DIR__ . '\../parts/header.view.php' ?>

  <main>
    <h1>Seleccionar direccion</h1>
    <?php if (isset($creada)): ?>
        <h2><?= $creada ?></h2>
      <?php endif; ?>
    <section id="direcciones">
      <h2>Direcciones</h2>
      <?php if (isset($pais)): ?>
      <div class="direccion">
        
          <p>Pais: <?php echo $pais; ?></p>
        <?php if (isset($provincia)): ?>
          <p>Provincia: <?php echo $provincia; ?></p>
        <?php endif; ?>
        <?php if (isset($ciudad)): ?>
          <p>Ciudad/barrio: <?php echo $ciudad; ?></p>
        <?php endif; ?>
        <?php if (isset($ccpp)): ?>
          <p>CCPP: <?php echo $ccpp; ?></p>
        <?php endif; ?>
        <?php if (isset($direc)): ?>
          <p>Direccion: <?php echo $direc; ?></p>
          <?php endif; ?>
        <a href="./agregarDireccion">Editar Direccion</a><!--simil al agregar, pero con los datos viejos (Update) -->
        <a href="./carrito">Seleccionar Direccion</a><!--esto va a tener que devolver la sucursal seleccionada, con js¿? -->
        
        <!-- <p>Aclaraciones: <?php if (isset($aclaraciones)): ?><?php echo $aclaraciones; ?><?php endif; ?></p> -->
        </div>
        
        <?php endif; ?>
      <div class="direccion">
        <p>Pais: Argentina</p>
        <p>Provincia: Buenos Aires</p>
        <p>Ciudad/barrio: Lujan</p>
        <p>CCPP: 6700</p>
        <p>Direccion: 123</p>
        <p>Aclaraciones: Nada</p>
        <a href="./agregarDireccion">Editar Direccion</a><!--simil al agregar, pero con los datos viejos (Update) -->
        <a href="./carrito">Seleccionar
          Direccion</a><!--esto va a tener que devolver la sucursal seleccionada, con js¿? -->
      </div>
      <?php
        if (session_status() == PHP_SESSION_NONE) {
          session_start();
        }
        $_SESSION['origen'] = 'compra/selecDirec'; // Guardar la página de origen en una variable de sesión
      ?>
      <a class="btn" href="../cuenta/agregarDireccion">Agregar Direccion</a>

      <a class="btn" href="./carrito">Volver al carrito</a>
    </section>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>