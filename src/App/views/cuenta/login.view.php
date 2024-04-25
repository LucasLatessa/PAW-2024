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
    <h1 class="login">Iniciar sesión</h1>

    <form action="POST" class="form-login">
      <label for="inputCorreo¡">
        Correo Electronico
        <input type="email" id="inputCorreo" required />
      </label>
      <label for="inputPassword">
        Contraseña
        <input type="password" id="inputPassword" required />
      </label>

      <input type="submit" value="Login" />
    </form>

    <a class="registrarse-enlace" href="./registrarse">Registrarse</a>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>