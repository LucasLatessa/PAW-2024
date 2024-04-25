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

    <section id="direcciones">
      <h2>Direcciones</h2>
      <div class="direccion">
        <p>Pais: Argentina</p>
        <p>Provincia: Buenos Aires</p>
        <p>Ciudad/barrio: Chivilcoy</p>
        <p>CCPP: 6620</p>
        <p>Direccion: 123</p>
        <p>Aclaraciones: Nada</p>
        <a href="./agregarDireccion">Editar Direccion</a><!--simil al agregar, pero con los datos viejos (Update) -->
        <a href="./carrito">Seleccionar
          Direccion</a><!--esto va a tener que devolver la sucursal seleccionada, con js¿? -->
      </div>
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
      <a class="btn" href="../cuenta/agregarDireccion">Agregar Direccion</a>

      <a class="btn" href="./carrito">Volver al carrito</a>
    </section>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>