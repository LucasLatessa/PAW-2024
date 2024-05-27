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
    <!--Codigo logout-->
    <?php if ($hayLogin): ?>
      <p>Usted esta logeado</p>
      <p><?= $hayLogin ?></p>
      <p><a href ="./login?sesion=cerrar">Cerrar sesion</a></p>
      
    
    <?php else: ?>
    <!--Codigo login-->
    <h1 class="login">Iniciar sesión</h1>

    <form method="POST" class="form-login" action="">
      <label for="inputCorreo¡">
        Correo Electronico
        <input type="email" id="inputCorreo" name="email" required />
      </label>
      <label for="inputPassword">
        Contraseña
        <input type="password" id="inputPassword" name="contraseña" required />
      </label>

      <!--Errores posibles a la hora de registrar -->
      <?php if (isset($errorMessage)): ?>
        <p class="error-message"><?= $errorMessage ?></p>
      <?php endif; ?>
      
      <input name ="login" type="submit" value="login" />

    </form>

    <a class="registrarse-enlace" href="./registrarse">Registrarse</a>

    <?php endif ; ?>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>