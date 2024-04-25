<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - PAW Power</title>
  <link rel="icon" href="../assets/Isotipo.svg" type="image/x-icon" />
  <link rel="stylesheet" href="../styles/header-footer.css">
  <link rel="stylesheet" href="../styles/global.css" />
  <link rel="stylesheet" href="../styles/formularios.css">
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
  <footer style="background-color: aliceblue">
    <nav class="contenedor-links">
      <ul class="links">
        <li id="locales"><a href="../institucional/locales">Locales</a></li>
        <li id="Servicio-al-cliente"><a href="../institucional/servCliente">Servicio al cliente</a></li>
        <li id="Sobre-nosotros"><a href="../institucional/nosotros">Sobre nosotros</a></li>
      </ul>
    </nav>

    <nav>
      <ul class="redes">
        <li id="youtube">
          <a href="#" rel="external" target="_blank"><img src="../assets/youtube.png" alt="Youtube"
              width="50" /></a><!-- icono pone css  borrar -->
        </li>
        <li id="facebook">
          <a href="#" rel="external" target="_blank"><img src="../assets/facebook.png" alt="Facebook" id="facebook"
              width="50" /></a><!-- icono pone css  borrar -->
        </li>
        <li id="x">
          <a href="#" rel="external" target="_blank"><img src="../assets/x.png" alt="X" width="50" /></a>
        </li>
        <li id="instagram">
          <a href="#" rel="external" target="_blank"><img src="../assets/instagram.png" alt="Instagram"
              width="50" /></a><!-- icono pone css  borrar -->
        </li>
      </ul>
    </nav>


    <small id="copyright">
      <em>Copyright PAW Power @2024. Todos los derechos reservados.</em>
    </small>
  </footer>
</body>

</html>