<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>PAW Power</title>
  <link rel="icon" href="./assets/Isotipo.svg" type="image/x-icon" />
  <link rel="stylesheet" href="../styles/header-footer.css" />
  <link rel="stylesheet" href="../styles/global.css" />
</head>

<body>
  <!--HEADER-->
  <header>
    <h1><?= $titulo ?></h1>
  </header>

  <?php require 'parts/header.view.php'; ?>

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

  <?php require 'parts/footer.view.php'; ?>

</body>

</html>