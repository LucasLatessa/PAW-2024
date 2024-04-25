<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Seleccionar direccion</title>
  <link rel="icon" href="../assets/Isotipo.svg" type="image/x-icon" />
  <link rel="stylesheet" href="../styles/header-footer.css">
  <link rel="stylesheet" href="../styles/global.css" />
  <link rel="stylesheet" href="../styles/direccion_local.css">
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