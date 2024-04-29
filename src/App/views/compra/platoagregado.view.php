<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  require __DIR__ . '\../parts/head.view.php'; ?>
  <link rel="stylesheet" href="/assets/styles/compra.css" />
</head>
<body>
  <!--HEADER-->
  <?php require __DIR__ . '\../parts/header.view.php' ?>

  <!--CODIGO DE MENU-->
  <main>
    <header class="header-menu menu-background">
      <h1 class="menu-titulo">Menu</h1>
    </header>
    <h2 class="titulo-comida">¡PLATO AGREGADO!</h2>
    <section class="seccion-comida">

      <article class="article-comida">
        <h3><?= $plato->getNombre() ?></h3>
        <figure class="figura-hamburguesa">
          <img class="comida-imagen" src="/assets/platos/<?= $plato->getImagen()?>" alt="Imagen plato agregado" width="500" />
          <figcaption class="descripcion-comida"><?= $plato->getDescripcion() ?></figcaption>
        </figure>
        <p class="precio-comida">$<?= $plato->getPrecio() ?></p>
      </article>
    </section>

  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>