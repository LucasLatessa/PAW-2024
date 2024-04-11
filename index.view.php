<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>PAW Power</title>
  <link rel="icon" href="./assets/Isotipo.svg" type="image/x-icon" />
  <link rel="stylesheet" href="./styles/header-footer.css" />
  <link rel="stylesheet" href="./styles/global.css" />
</head>

<body>
  <!--HEADER-->
  <header>
    <h1><?= $titulo ?></h1>
  </header>


  <header class="header-principal">
    <nav class="menu">
      <img src="./assets/MenuBurger.png" class="icono-menu" />
      <ul class="lista-desplegable">
        <?php foreach ($header_izq as $item): ?>

          <li><a href="<?= $item["href"] ?>"> <?= $item["name"] ?></a></li>

        <?php endforeach; ?>

      </ul>
    </nav>
    <h1>
      <a href="index.html">
        <img src="./assets/Imagotipo.svg" alt="Paw Power" class="logo" />
      </a>
    </h1>
    <a href="./compra/carrito.html"><img src="./assets/carrito.png" alt="Carrito" class="icono-carrito" /></a>
    <a href="./cuenta/login.html"><img src="./assets/user.png" alt="Usuario" class="icono-usuario" /></a>
  </header>

  <main>
    <section class="carrusel">
      <h2 class="titulo-promociones">Promociones</h2>
      <!-- Agrego lista para carrusel -->
      <ul>
        <li>
          <a href="./compra/menu.html">
            <img src="./assets/promo1.jpeg" alt="Promoción 1 - Descubre nuestras ofertas especiales" />
          </a>
        </li>
        <li>
          <a href="./compra/menu.html">
            <img src="./assets/Hamburguesa.jpg" alt="Promoción 2 - Prueba nuestras hamburguesas" />
          </a>
        </li>
        <li>
          <a href="./compra/menu.html">
            <img src="./assets/promo1.jpeg" alt="Promoción 3 - Descubre nuestras ofertas especiales" />
          </a>
        </li>
        <li>
          <a href="./compra/menu.html">
            <img src="./assets/promo1.jpeg" alt="Promoción 4 - Descubre nuestras ofertas especiales" />
          </a>
        </li>
      </ul>
    </section>

    <section class="pedirMain">
      <h3>Pide a domicilio y disfruta de tu comida</h3>
      <img src="./assets/Delivery.png" alt="Delivery - Rapida Gula" />
      <a href="./compra/menu.html">Pedir ahora</a>
    </section>

    <section class="reservarMesaMain">
      <h3>Pide con aticipacion en nuestro locales</h3>
      <img src="./assets/ReservarMesa.png" alt="Reservar Mesa - Rapida Gula" width="300" />
      <a href="./compra/reserva.html">Reservar ahora</a>
    </section>

    <h4 class="titulo-novedades">Novedades</h4>
    <section class="novedades">
      <article>
        <h5>¿Ya nos sigues en nuestras redes?</h5>
        <figure>
          <a href="#">
            <img src="./assets/captura-redes.png" alt="Novedad 1 - ¿Ya nos sigues en nuestras redes?" width="500" />
          </a>
          <figcaption>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. In ullam,
            adipisci laudantium nihil veritatis laboriosam incidunt magnam
            eligendi! Inventore ad tempora libero temporibus necessitatibus
            ipsum repellendus vitae laboriosam et non!
          </figcaption>
        </figure>
      </article>
      <article>
        <h5>Lleva PAW Power en tu cabeza</h5>
        <figure>
          <a href="#">
            <img src="./assets/gorra.png" alt="Novedad 2 - Lleva PAW Power en tu cabeza" width="500" />
          </a>
          <figcaption>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. In ullam,
            adipisci laudantium nihil veritatis laboriosam incidunt magnam
            eligendi! Inventore ad tempora libero temporibus necessitatibus
            ipsum repellendus vitae laboriosam et non!
          </figcaption>
        </figure>
      </article>
      <article>
        <h5>Todo el sabor en una caja</h5>
        <figure>
          <a href="#">
            <img src="./assets/pawPower3.jpg" alt="Novedad 3 - Todo el sabor en una caja" width="500" />
          </a>
          <figcaption>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. In ullam,
            adipisci laudantium nihil veritatis laboriosam incidunt magnam
            eligendi! Inventore ad tempora libero temporibus necessitatibus
            ipsum repellendus vitae laboriosam et non!
          </figcaption>
        </figure>
      </article>
    </section>
  </main>

  <!--FOOTER-->
  <footer>
    <nav class="contenedor-links">
      <ul class="links">
        <li id="locales">
          <a href="./institucional/locales.html">Locales</a>
        </li>
        <li id="Servicio-al-cliente">
          <a href="./institucional/servCliente.html">Servicio al cliente</a>
        </li>
        <li id="Sobre-nosotros">
          <a href="./institucional/nosotros.html">Sobre nosotros</a>
        </li>
        <li id="Consumos"><!-- agregado para ver estilo, luego nose si va(validar si es rol administrador) -->
          <a href="./cuenta/consumos.html">Consumos</a>
        </li>
      </ul>
    </nav>

    <nav>
      <ul class="redes">
        <li id="youtube">
          <a href="#" rel="external" target="_blank"><img src="./assets/youtube.png" alt="Youtube"
              width="50" /></a><!-- icono pone css  borrar -->
        </li>
        <li id="facebook">
          <a href="#" rel="external" target="_blank"><img src="./assets/facebook.png" alt="Facebook" id="facebook"
              width="50" /></a><!-- icono pone css  borrar -->
        </li>
        <li id="x">
          <a href="#" rel="external" target="_blank"><img src="./assets/x.png" alt="X" width="50" /></a>
        </li>
        <li id="instagram">
          <a href="#" rel="external" target="_blank"><img src="./assets/instagram.png" alt="Instagram"
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