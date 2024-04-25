<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Menu - PAW Power</title>
  <link rel="icon" href="../assets/Isotipo.svg" type="image/x-icon" />
  <link rel="stylesheet" href="../styles/header-footer.css">
  <link rel="stylesheet" href="../styles/compra.css" />

<body>
  <!--HEADER-->
  <?php require __DIR__ . '\../parts/header.view.php' ?>

  <!--CODIGO DE MENU-->
  <main>
    <header class="header-menu menu-background">
      <h1 class="menu-titulo">Menu</h1>
    </header>
    <h2 class="titulo-comida">COMIDA DEL MES</h2>
    <section class="seccion-comida-mes">

      <article class="article-comida-mes">
        <h3>Hamburguesa clasica</h3>
        <figure class="figura-hamburguesa">
          <img class="comida-imagen" src="../assets/hamburguesa1.jpg" alt="Hamburguesa comida del mes" width="500" />
          <figcaption class="descripcion-comida">descripcion</figcaption>
        </figure>
        <p class="precio-comida">$$$$$$$$</p>
        <a class="pedir-comida" href="./pedirComida">PEDIR</a>
      </article>
    </section>

    <h2 class="titulo-comida">HAMBURGUESAS</h2>
    <section class="seccion-comida">


      <article class="article-comida">
        <h3>Hamburguesa con queso</h3>
        <figure class="figura-hamburguesa">
          <img class="comida-imagen" src="../assets/hamburguesa1.jpg" alt="Hamburguesa con queso" width="500" />
          <figcaption class="descripcion-comida">descripcion</figcaption>
        </figure>
        <p class="precio-comida">$$$$$$$$</p>
        <a class="pedir-comida" href="./pedirComida">PEDIR</a>
      </article>

      <article class="article-comida">
        <h3>Hamburguesa completa</h3>
        <figure class="figura-hamburguesa">
          <img class="comida-imagen" src="../assets/hamburguesa2.jpg" alt="Hamburguesa completa" width="500" />
          <figcaption class="descripcion-comida">descripcion</figcaption>
        </figure>
        <p class="precio-comida">$$$$$$$$</p>
        <a class="pedir-comida" href="./pedirComida">PEDIR</a>
      </article>

      <article class="article-comida">
        <h3>Hamburguesa Americana</h3>
        <figure class="figura-hamburguesa">
          <img class="comida-imagen" src="../assets/hamburguesa3.jpg" alt="Hamburguesa Americana" width="500" />
          <figcaption class="descripcion-comida">descripcion</figcaption>
        </figure>
        <p class="precio-comida">$$$$$$$$</p>
        <a class="pedir-comida" href="./pedirComida">PEDIR</a>
      </article>

      <article class="article-comida">
        <h3>Hamburguesa Americana</h3>
        <figure class="figura-hamburguesa">
          <img class="comida-imagen" src="../assets/hamburguesa3.jpg" alt="Hamburguesa Americana" width="500" />
          <figcaption class="descripcion-comida">descripcion</figcaption>
        </figure>
        <p class="precio-comida">$$$$$$$$</p>
        <a class="pedir-comida" href="./pedirComida">PEDIR</a>
      </article>

      <article class="article-comida">
        <h3>Hamburguesa Americana</h3>
        <figure class="figura-hamburguesa">
          <img class="comida-imagen" src="../assets/hamburguesa3.jpg" alt="Hamburguesa Americana" width="500" />
          <figcaption class="descripcion-comida">descripcion</figcaption>
        </figure>
        <p class="precio-comida">$$$$$$$$</p>
        <a class="pedir-comida" href="./pedirComida">PEDIR</a>
      </article>
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