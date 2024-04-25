<!DOCTYPE html>
<html lang="es">

<head>
  <?php require __DIR__ . '\../parts/head.view.php'; ?>
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
    <section class="seccion-comida-mes">

      <article class="article-comida-mes">
        <h3><?= $plato->getNombre() ?></h3>
        <figure class="figura-hamburguesa">
          <img class="comida-imagen" src="<?= $plato->getFoto()?>.jpg" alt="Hamburguesa comida del mes" width="500" />
          <figcaption class="descripcion-comida"><?= $plato->getDescripcion() ?></figcaption>
        </figure>
        <p class="precio-comida"><?= $plato->getPrecio() ?></p>
      </article>
    </section>

  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>