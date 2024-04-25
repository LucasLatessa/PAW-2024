<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../assets/Isotipo.svg" type="image/x-icon" />
  <title>Registrarse - PAW Power</title>
  <link rel="stylesheet" href="../styles/header-footer.css">
  <link rel="stylesheet" href="../styles/global.css" />
  <link rel="stylesheet" href="../styles/formularios.css">
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