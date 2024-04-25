<!DOCTYPE html>
<html lang="es">

<head>
  <?php require __DIR__ . '\../parts/head.view.php'; ?>
  <link rel="stylesheet" href="/assets/styles/institucional.css" />
</head>

<body>
  <!--HEADER-->
  <?php require __DIR__ . '\../parts/header.view.php' ?>

  <main>
    <!--CODIGO DE SERVICIO AL CLIENTE-->
    <header class="header-institucional serv-cliente">
      <h1>SERVICIO AL CLIENTE</h1>
    </header>

    <section class="faq">
      <h2>FAQ</h2>
      <article>
        <h3 class="preguntas">Q1</h3>
        <p class="p-institucional">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda
          quisquam natus iste dolores voluptate fugit laborum id! Officiis
          perferendis incidunt assumenda consectetur in error voluptatum,
          maiores accusantium, ab dignissimos animi.
        </p>
      </article>
      <article>
        <h3 class="preguntas">Q1</h3>
        <p class="p-institucional">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda
          quisquam natus iste dolores voluptate fugit laborum id! Officiis
          perferendis incidunt assumenda consectetur in error voluptatum,
          maiores accusantium, ab dignissimos animi.
        </p>
      </article>
    </section>

    <section class="informacionContacto">
      <h2 class="infoContactotitulo">Informacion de contacto</h2>
      <p class="correo">Correo</p>
      <p class="numero">Numero</p>
      <p class="ubi">Ubicacion</p>
    </section>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>