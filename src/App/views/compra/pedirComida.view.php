<!DOCTYPE html>
<html lang="es">

<head>
<?php require __DIR__ . '\../parts/head.view.php'; ?>
  <link rel="stylesheet" href="/assets/styles/compra.css" />
</head>

<body>
  <!--HEADER-->
  <?php require __DIR__ . '\../parts/header.view.php' ?>

  <main>
    <!--Codigo comida-->
    <header class="header-menu menu-background">
      <h1 class="menu-titulo">Menu</h1>
    </header>

    <section>
      <h2 class="comida-seleccionada">Nombre comida seleccionada</h2>
      <figure class="figura-comida-seleccionada">
        <img class="img-comida-seleccionada" src="../assets/Hamburguesa.jpg" alt="Comida seleccionada para pedir"
          width="500" />
        <figcaption>descripcion</figcaption>
      </figure>
    </section>

    <div class="formularioPedidoComida">
      <form method="POST">
        <h3>Quieres agregar alguna salsa?</h3>
        <label for="inputSalsaBBQ">
          BBQ
          <input type="checkbox" name="bbq" id="inputSalsaBBQ" value="BBQ" />
        </label>
        <p class="precio">$$$</p>
        <label for="inputSalsaMostaza">
          MOSTAZA
          <input type="checkbox" name="mostaza" id="inputSalsaMostaza" value="Mostaza" />
        </label>
        <p class="precio">$$$</p>
        <label for="inputTexto">
          Aclaraciones
          <input id="inputTexto" type="text" name="inputTexto" maxlength="500" minlength="5" size="30" />
        </label>
        <label class="cantidad-producto">Cantidad*
          <!--Con javascript sera un contador-->
          <input type="number" min="1" required />
        </label>
        <p class="precio total">$$$$$$$$$$</p>
      </form>
      <button type="submit">Pedir</button>
    </div>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>