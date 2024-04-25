<!DOCTYPE html>
<html lang="en">

<head>
  <?php require __DIR__ . '\../parts/head.view.php'; ?>
  <link rel="stylesheet" href="/assets/styles/global.css" />
  <link rel="stylesheet" href="/assets/styles/formularios.css">
</head>

<body>
  <!--HEADER-->
  <?php require __DIR__ . '\../parts/header.view.php' ?>
  <main class="login-usuario">
    <!--Codigo login-->
    <h1 class="login">Crear plato</h1>

    <form method="POST" class="form-login" action="prueba"> <!--Redirecciona a prueba-->
      <label for="nombre">
        Nombre
        <input name="nombre" id="nombre" required />
      </label>
      <label for="descripcion">
        Descripcion
        <input name="descripcion" id="descripcion" required />
      </label>
      <label for="precio">
        Precio
        <input name="precio" id="precio" required />
      </label>

      <input name="submit" type="submit" value="Crear Plato" />
    </form>



  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>