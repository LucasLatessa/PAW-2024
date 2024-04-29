<!DOCTYPE html>
<html lang="es">

<head>
  <?php require __DIR__ . '\../parts/head.view.php'; ?>
  <link rel="stylesheet" href="/assets/styles/global.css" />
  <link rel="stylesheet" href="/assets/styles/formularios.css">
</head>

<body>
  <!--HEADER-->
  <?php require __DIR__ . '\../parts/header.view.php' ?>

  <main>
    <h1>Agregar direccion</h1>
    <form method="POST" action="/cuenta/agregarDireccion">
      <label for="pais">País*
        <input type="text" id="pais" name="pais" required />
      </label>

      <label for="provincia">Provincia*
        <input type="text" id="provincia" name="provincia" required />
      </label>

      <label for="ciudad">Ciudad/Barrio*
        <input type="text" id="ciudad" name="ciudad" required />
      </label>

      <label for="ccpp">Código Postal*
        <input type="text" id="ccpp" name="ccpp" required />
      </label>

      <label for="direccion">Dirección*
        <input type="text" id="direccion" name="direccion" required />
      </label>

      <label for="aclaraciones">Aclaraciones
        <input type="text" id="aclaraciones" name="aclaraciones" />
      </label>
      <p id="required">*requerido</p>
      <input type="submit" value="Agregar Dirección" />
    </form>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>