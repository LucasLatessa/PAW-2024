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

  <main>
    <h1 class="registrarse">Registrarse</h1>
    <form class="form-registro">
      <label for="email">Correo Electrónico
        <input type="email" id="email" name="email" required />
      </label>

      <label for="nombre">Nombre
        <input type="text" id="nombre" name="nombre" required />
      </label>

      <label for="apellido">Apellido
        <input type="text" id="apellido" name="apellido" required />
      </label>

      <label for="contraseña">Contraseña
        <input type="password" id="contraseña" name="contraseña" required />
      </label>

      <label for="validarContraseña">Validar contraseña
        <input type="password" id="validarContraseña" name="validarContraseña" required />
      </label>
      <input class="registrarse" type="submit" value="Registrarse" />
    </form>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>