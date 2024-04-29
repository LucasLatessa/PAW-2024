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

    <a href="../menu/crearPlato"> Crear plato </á>

  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>