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
      <form method="POST" action ="" class="formPedidoComida">
          
          <h3>¿Quieres agregar alguna salsa?</h3>
          
          <label for="inputSalsaBBQ">
            BBQ
            <input type="checkbox" name="bbq" id="inputSalsaBBQ" value="BBQ" />
          </label>
     
          <label for="inputSalsaMostaza">
            MOSTAZA
            <input type="checkbox" name="mostaza" id="inputSalsaMostaza" value="Mostaza" />
          </label>
        
          <label for="inputSalsaMostaza">
            KETCHUP
            <input type="checkbox" name="ketchup" id="inputSalsaKetchup" value="Ketchup" />
          </label>

          <label for="inputSalsaMostaza">
            MAYONESA
            <input type="checkbox" name="mayonesa" id="inputSalsaMayonesa" value="Mayonesa" />
          </label>

          <p class="precio">$$$</p>

          <label for="inputTexto">
            Aclaraciones del Menú elegido:
            <input id="inputTexto" type="text" name="aclaracionesPedir" maxlength="500" minlength="5" size="30" />
          </label>
        
          <label class="cantidad-producto">Cantidad*
            <!--Con javascript sera un contador-->
            <input type="number" name="cantidadHamburguesa" min="1" required />
          </label>
        
          <p class="precio total" name=>$$$$$$$$$$</p>
          <button type="submit">Agregar al carrito</button>

          <?php if (isset($mensajePedido)): ?>
            <p class="mensaje-pedido"><?= $mensajePedido ?></p>
          <?php endif; ?>
          
     </form>
    </div>
  </main>

  <!--FOOTER-->
  <?php require __DIR__ . '\../parts/footer.view.php' ?>
</body>

</html>